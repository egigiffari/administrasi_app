<?php

namespace App\Http\Controllers;

use App\Notification;
use App\Product;
use App\ReportSetting;
use App\RequestCategory;
use App\RequestItems;
use App\RequestReport;
use App\RequestReportApprove;
use App\RequestReportItem;
use App\RequestResponsible;
use App\User;

use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RequestCategory $id)
    {
        $reports = RequestReport::where('category_id', $id->id)->orderBy('updated_at', 'desc')->paginate(10);
        // $reports = RequestReport::where('category_id', 0)->paginate(10);
        // dd($reports);
        $category = $id;
        return view('request.report.index2', compact('reports', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $request = \App\Request::findOrFail($id);

        if (RequestReport::where('request_id', $id)->first()) {
            return redirect()->back()->withWarning("Laporan Pengajuan Has Been Created");
        }
        if ($request->status != 'approve') {
            return redirect()->back()->withWarning("Pengajuan Not Have Approved");
        }

        $category = RequestCategory::findOrFail($request->category_id);
        $items_req = RequestItems::where('request_id', $id)->get();
        $users = User::all();
        $items = Product::all();
        return view('request.report.create', compact('request', 'category', 'items_req', 'users', 'items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request_data = $this->validate($request, [
            'category_id' => 'required',
            'request_id' => 'required',
            'applicant_id' => 'required',
            'perihal' => 'required',
            'total' => 'required',
            'amount' => 'required',
        ]);

        // CHECK REQUEST / PENGAJUAN HAS BEEN APPROVE OR NOT
        $requestPengajuan = \App\Request::findOrFail($request->request_id);
        if ($requestPengajuan->status != 'approve') {
            return redirect()->back()->withWarning("Pengajuan Not Have Approved");
        }


        $category_request = RequestCategory::findOrFail($request->category_id);

        if (preg_match('/pembelian/', $category_request->types->name)) {
            
            $this->validate($request, [
                'item' => 'required',
                'unit' => 'required',
                'qty' => 'required',
                'price' => 'required',
                'sub' => 'required',
                'desc' => 'required',
            ]);

        }elseif(preg_match('/biaya/', $category_request->types->name)){

            $this->validate($request, [
                'item' => 'required',
                'name' => 'required',
                'merk' => 'required',
                'spec' => 'required',
                'unit' => 'required',
                'qty' => 'required',
                'price' => 'required',
                'sub' => 'required',
                'desc' => 'required',
            ]);

        }

        RequestReport::create($request_data);
        $report_id = RequestReport::where('request_id', $request->request_id)->first();
        
        // SEARCH DATA RESPONSIBLE REQUEST FROM CATEGORY ID
        $responsibles = RequestResponsible::where('category_id', $request->category_id)->get();
        // INSERT DATA RESPONSIBLE IN 1 ARRAY
        $approvers = [];
        foreach ($responsibles as $responsible) {
            if ($request->applicant_id == $responsible->user_id) {
                continue;
            }
            $temp = [
                'report_id' => $report_id->id,
                'user_id' => $responsible->user_id,
                'position' => $responsible->as,
                'subject' => $responsible->subject,
                'priority' => $responsible->priority,
                'created_at' => now(),
                'updated_at' => now()
            ];
            array_push($approvers, $temp);
        }
        
        // PREPARE REQUEST ITEMS
        $data_items = [];

        $items = $request->item;
        $names = $request->name;
        $merks = $request->merk;
        $specs = $request->spec;
        $units = $request->unit;
        $qtys = $request->qty;
        $prices = $request->price;
        $subs = $request->sub;
        $descs = $request->desc;

        for ($i=0; $i < count($items); $i++) {
            
            $item_id = Product::whereId($items[$i])->first();
            if ($item_id) {
                $name = $item_id->name;
                $merk = $item_id->brand->name;
                $spec = $item_id->spec;
            }else{
                $name = $names[$i];
                $merk = $merks[$i];
                $spec = $specs[$i];
            }
            
            $temp = [
                'report_id' => $report_id->id,
                'items' => $items[$i],
                'name' => $name,
                'merk' => $merk,
                'spec' => $spec,
                'unit' => $units[$i],
                'qty' => $qtys[$i],
                'price' => $prices[$i],
                'sub' => $subs[$i],
                'desc' => $descs[$i],
                'created_at' => now(),
                'updated_at' => now(),
            ];

            array_push($data_items, $temp);
        }

        // SEARCH DATA USER WHERE LEVEL 'COMMON ADMIN = 3', 'MANAGER = 2', 'ADMIN = 1'
        $users =  $users = User::where('level_id', 1)->orWhere('level_id', 2)->orWhere('level_id', 3)->get();
        $notification = [];
        // INSERT USER TO NOTIFICATION ARRAY
        for ($i=0; $i < count($users); $i++) { 
            $temp = [
                'user_id' => $users[$i]['id'],
                'request_id' => 0,
                'request_report_id' => $report_id->id,
                'is_read' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ];
            array_push($notification, $temp);
        }

        // INSERT DATA RESPONSIBLE TO APPROVAL REQUEST
        RequestReportApprove::insert($approvers);

        // INSERT DATA NOTIFICATION TO NOTIFICATION REQUEST
        Notification::insert($notification);

        // INSERT DATA REQUEST ITEM TO REQUEST ITEMS TABLE
        RequestReportItem::insert($data_items);

        return redirect()->route('request.report.index', $request->category_id)->withSuccess("Pengajuan Has Been Created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notification = Notification::where('request_report_id', $id)->where('is_read', 0)->get();
        foreach ($notification as $notif)
        {
            if($notif->user_id == Auth::id())
            {
                // dd($notif->id);
                $update = Notification::find($notif->id);
                $update->is_read = 1;
                $update->save();
            }
        }

        $report = RequestReport::findOrFail($id);
        $items = $report->items;
        $responsibles = $report->responsibles;
        $category = RequestCategory::findOrFail($report->category_id);

        return view('request.report.detail', compact('report', 'items', 'responsibles', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $report = RequestReport::findOrFail($id);
        $category = RequestCategory::findOrFail($report->category_id);
        $items_req = RequestReportItem::where('report_id', $id)->get();
        $users = User::all();
        $items = Product::all();
        return view('request.report.edit', compact('report', 'category', 'items_req', 'users', 'items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $notification = Notification::where('request_report_id', $id)->get();
        foreach ($notification as $notif)
        {
            $update = Notification::find($notif->id);
            $update->is_read = 0;
            $update->save();
        }


        $request_update = RequestReport::whereId($id);

        $data = $this->validate($request, [
            'category_id' => 'required',
            'applicant_id' => 're quired',
            'perihal' => 'required',
            'total' => 'required',
            'amount' => 'required',
         ]);
 
         $category_request = RequestCategory::findOrFail($request->category_id);
 
         if (preg_match('/pembelian/', $category_request->types->name)) {
             
             $this->validate($request, [
                 'item' => 'required',
                 'unit' => 'required',
                 'qty' => 'required',
                 'price' => 'required',
                 'sub' => 'required',
                 'desc' => 'required',
             ]);
 
         }elseif(preg_match('/biaya/', $category_request->types->name)){
 
             $this->validate($request, [
                 'item' => 'required',
                 'name' => 'required',
                 'merk' => 'required',
                 'spec' => 'required',
                 'unit' => 'required',
                 'qty' => 'required',
                 'price' => 'required',
                 'sub' => 'required',
                 'desc' => 'required',
             ]);
 
         }


        // INSERT DATA TO REQUESTS TABLE
        RequestReport::whereId($id)->update($data);
        // SEARCH DATA APPROVE REQUEST FROM REQUEST APPROVE
        $responsibles = RequestReportApprove::where('report_id', $id)->get();
        // INSERT DATA CHANGE ALL STATUS APPROVE TO WAITING
        $approvers = [];
        for ($i=0; $i < count($responsibles); $i++) { 
            $data = ['status' => 'waiting'];
            RequestReportApprove::whereId($responsibles[$i]['id'])->update($data);
        }

        // REUPLOAD STATUS NOTIFICATION
        $notifications = Notification::where('request_report_id', $id)->get();
        foreach($notifications as $notification){
            $notif = Notification::find($notification->id);
            $notif->is_read = 0;
            $notif->save();
        }

        // GET ALL ITEMS AND DELETE ALL
        RequestReportItem::where('report_id', $id)->delete();
        // INSERT NEW ITEMS
        $data_items = [];

        $items = $request->item;
        $names = $request->name;
        $merks = $request->merk;
        $specs = $request->spec;
        $units = $request->unit;
        $qtys = $request->qty;
        $prices = $request->price;
        $subs = $request->sub;
        $descs = $request->desc;

        for ($i=0; $i < count($items); $i++) {
            
            $item_id = Product::whereId($items[$i])->first();
            if ($item_id) {
                $name = $item_id->name;
                $merk = $item_id->brand->name;
                $spec = $item_id->spec;
            }else{
                $name = $names[$i];
                $merk = $merks[$i];
                $spec = $specs[$i];
            }
            
            $temp = [
                'report_id' => $id,
                'items' => $items[$i],
                'name' => $name,
                'merk' => $merk,
                'spec' => $spec,
                'unit' => $units[$i],
                'qty' => $qtys[$i],
                'price' => $prices[$i],
                'sub' => $subs[$i],
                'desc' => $descs[$i],
                'created_at' => now(),
                'updated_at' => now(),
            ];

            array_push($data_items, $temp);
        }

        // INSERT DATA REQUEST ITEM TO REQUEST ITEMS TABLE
        RequestReportItem::insert($data_items);

        return redirect()->route('request.report.show', $id)->withSuccess("Laporan Pengajuan Has Been Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = RequestReport::whereId($id)->first();
        RequestReportItem::where('report_id', $report->id)->delete();
        Notification::where('request_report_id', $id)->delete();
        $report->delete();

        return redirect()->route('request.report.index', $id)->withSuccess("Laporan Has Been Deleted");
    }

    public function approve(Request $request)
    {

        $this->validate($request, ['status' => 'required']);

        if (preg_match('/all-/',$request->status))
        {
            $approve = RequestReportApprove::where('report_id', $request->report_id)->get();
            $status = $request->status;
            if ($status == 'all-reset')
            {
                for ($i=0; $i < count($approve) ; $i++) { 
                    RequestReportApprove::whereId($approve[$i]['id'])->update(['status' => 'waiting']);
                    RequestReport::whereId($request->report_id)->update(['status' => 'on proses', 'catatan' => '']);
                }
            } elseif ($status == 'all-acc')
            {
                for ($i=0; $i < count($approve) ; $i++) { 
                    RequestReportApprove::whereId($approve[$i]['id'])->update(['status' => 'acc']);
                    RequestReport::whereId($request->report_id)->update(['status' => 'approve', 'catatan' => '']);
                }
            } elseif ($status == 'all-revision')
            {
                for ($i=0; $i < count($approve) ; $i++) { 
                    RequestReportApprove::whereId($approve[$i]['id'])->update(['status' => 'revision']);
                    RequestReport::whereId($request->report_id)->update(['status' => 'revision', 'catatan' => '']);
                }
            }

            // REUPLOAD STATUS NOTIFICATION
            $notifications = Notification::where('request_report_id', $request->report_id)->get();
            foreach($notifications as $notification){
                $notif = Notification::find($notification->id);
                $notif->is_read = 0;
                $notif->save();
            }

            return redirect()->back()->withSuccess("Pengajuan Hass Been $status");
            
        }

        $status = $request->status;
        $approve = RequestReportApprove::where('report_id', $request->report_id)->where('user_id', Auth::id())->first();
        // dd($approve);

        

        if ($status != 'perbaikan' && $status != 'hold')
        {
            RequestReportApprove::whereId($approve->id)->update(['status' => $status]);
        }
        else
        {
            $this->validate($request, ['catatan' => 'required']);
            // dd($approve->id);
            RequestReportApprove::whereId($approve->id)->update(['status' => $status]);
            RequestReport::whereId($request->report_id)->update(['status' => 'perbaikan', 'catatan' => $request->catatan]);
        }
        

        // GET ALL STATUS APPROVER
        $approver = RequestReportApprove::where('report_id', $request->report_id)->get();
        // dd($approver);

        // LOOP ALL STATUS
        for ($i=0; $i < count($approver); $i++) {

            // CHECK ALL STATUS AND UPDATE REQUEST STATUS LIKE APPROVE STATUS
            if ($approver[$i]['status'] == 'cancel')
            {
                RequestReport::whereId($request->report_id)->update(['status' => 'cancel']);
                break; 
            }
            elseif($approver[$i]['status'] == 'hold')
            {
                RequestReport::whereId($request->report_id)->update(['status' => 'hold']);
                break;
            }
            elseif ($approver[$i]['status'] == 'revision')
            {
                RequestReport::whereId($request->report_id)->update(['status' => 'revision']);
                break;
            }
            elseif ($approver[$i]['status'] == 'waiting')
            {
                RequestReport::whereId($request->report_id)->update(['status' => 'on proses']);
                break;
            }
            elseif ($approver[count($approver) - 1]['status'] == 'acc')
            {
                RequestReport::whereId($request->report_id)->update(['status' => 'approve']);
                break;
            }
        }

        // REUPLOAD STATUS NOTIFICATION
        $notifications = Notification::where('request_report_id', $request->report_id)->get();
        foreach($notifications as $notification){
            $notif = Notification::find($notification->id);
            $notif->is_read = 0;
            $notif->save();
        }

        return redirect()->back()->withSuccess("Pengajuan Hass Been $status");
        
    }

    public function pdf($id)
    {
        $report = RequestReport::findOrFail($id);
        $items = $report->items;
        $approvers = RequestReportApprove::where('report_id', $id)->get();
        $setting = ReportSetting::first();

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true,'isRemoteEnabled' => true]);
        $pdf->loadView('request.report.pdf', compact('report', 'items', 'approvers', 'setting'));
        return $pdf->stream('Laporan-' . $report->request->code . '-' . $report->request->categories->name . '.pdf');
    }
}
