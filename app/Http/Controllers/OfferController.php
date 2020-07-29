<?php

namespace App\Http\Controllers;

use App\Offer;
use App\OfferApprove;
use App\OfferItems;
use App\OfferResponsible;
use App\Position;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class OfferController extends Controller
{

    public function index()
    {
        $offers = Offer::orderBy('updated_at', 'desc')->get();
        return view('penawaran.index', compact('offers'));
    }
     

    public function create()
    {
        // if($method == 'boq')
        // {
        //     $users = User::all();
        //     return view('penawaran.create_with_boq', compact('users'));
        // }
        // elseif($method == 'no_boq')
        // {
        //     $users = User::all();
        //     return view('penawaran.create', compact('users'));
        // }

        $user_data = User::all();
        $users = [];
        foreach ($user_data as $data) {
            foreach ($data->positions as $position) {
                if ($position->name === 'Business Relation') {
                    array_push($users, $data);
                }
            }
        }
        return view('penawaran.create_with_boq', compact('users'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [

            'user_id' => 'required',
            'customer' => 'required',
            'perihal' => 'required',
            'date' => 'required',
            'syarat' => 'required',
            'total' => 'required',
            'amount' => 'required',
            'item' => 'required',
            'price' => 'required',

        ]);


        $date = explode(' - ', $request->date);
        $start_date = explode('/', $date[0]);
        $start_date = implode('-',[$start_date[2], $start_date[0], $start_date[1]]);
        $start_date = $start_date . ' ' . date('H:i:s');
        $expire_date = explode('/', $date[1]);
        $expire_date = implode('-',[$expire_date[2], $expire_date[0], $expire_date[1]]);
        $expire_date = $expire_date . ' ' . date('H:i:s');
        
        $items = $request->item;
        $prices = $request->price;
        for ($i=0; $i < count($items); $i++) { 
            if ($items[$i] == '' || $items[$i] == null)
            {
                $errors = ['Pekerjaan is required'];
                return redirect()->back()->withErrors($errors);
            }
            elseif($prices[$i] == '0' || $prices[$i] == null){
                $errors = ['Price is required'];
                return redirect()->back()->withErrors($errors);
            }
        }

        $data = [
            'user_id'       => $request->user_id,
            'customer'      => $request->customer,
            'perihal'       => $request->perihal,
            'start_date'    => $start_date,
            'due_date'      => $expire_date,
            'total'         => $request->total,
            'amount'        => $request->amount,
            'ppn'           => $request->ppn,
            'syarat'        => $request->syarat
        ];

        $penawaran = Offer::create($data);

        $items = $request->item;
        $prices = $request->price;

        $data_items = [];
        for ($i=0; $i < count($items); $i++) { 
            $temp = [
                'offer_id' => $penawaran->id,
                'item'      => $items[$i],
                'price'     => $prices[$i],
            ];

            array_push($data_items, $temp);
        }
        
        OfferItems::insert($data_items);

        $responsibles = OfferResponsible::all();
        $data_responsible = [];
        for ($i=0; $i < count($responsibles); $i++) { 
            $temp = [
                'offer_id'  => $penawaran->id,
                'user_id'   => $responsibles[$i]['user_id'],
                'subject'   => $responsibles[$i]['subject'],
                'as'        => $responsibles[$i]['as'],
                'priority'  => $responsibles[$i]['priority'],
            ];

            array_push($data_responsible, $temp);
        }


        OfferApprove::insert($data_responsible);

        return redirect()->route('penawaran.index')->withSuccess('Penawaran Has Been Created');
    }

    public function show($id)
    {
        $offer = Offer::whereId($id)->first();
        
        $responsibles = OfferApprove::where('offer_id', $offer->id)->get();
        $items = OfferItems::where('offer_id', $offer->id)->get();
        return view('penawaran.detail', compact('offer', 'responsibles', 'items'));
    }

    public function edit($id)
    {
        $offer = Offer::whereId($id)->first();
        $users = User::all();
        return view('penawaran.edit', compact('offer', 'users'));
    }

    public function update(Request $request, $id)
    {
        $offer = Offer::whereId($id)->first();
        $this->validate($request, [

            'user_id' => 'required',
            'customer' => 'required',
            'perihal' => 'required',
            'date' => 'required',
            'syarat' => 'required',
            'total' => 'required',
            'amount' => 'required',
            'item' => 'required',
            'price' => 'required',

        ]);


        $date = explode(' - ', $request->date);
        $start_date = explode('/', $date[0]);
        $start_date = implode('-',[$start_date[2], $start_date[0], $start_date[1]]);
        $start_date = $start_date . ' ' . date('H:i:s');
        $expire_date = explode('/', $date[1]);
        $expire_date = implode('-',[$expire_date[2], $expire_date[0], $expire_date[1]]);
        $expire_date = $expire_date . ' ' . date('H:i:s');
        
        $items = $request->item;
        $prices = $request->price;
        for ($i=0; $i < count($items); $i++) { 
            if ($items[$i] == '' || $items[$i] == null)
            {
                $errors = ['Pekerjaan is required'];
                return redirect()->back()->withErrors($errors);
            }
            elseif($prices[$i] == '0' || $prices[$i] == null){
                $errors = ['Price is required'];
                return redirect()->back()->withErrors($errors);
            }
        }

        $data = [
            'user_id'       => $request->user_id,
            'customer'      => $request->customer,
            'perihal'       => $request->perihal,
            'start_date'    => $start_date,
            'due_date'      => $expire_date,
            'total'         => $request->total,
            'amount'        => $request->amount,
            'ppn'           => $request->ppn,
            'syarat'        => $request->syarat
        ];

        $offer->update($data);
        OfferItems::where('offer_id', $offer->id)->delete();

        $items = $request->item;
        $prices = $request->price;

        $data_items = [];
        for ($i=0; $i < count($items); $i++) { 
            $temp = [
                'offer_id' => $offer->id,
                'item'      => $items[$i],
                'price'     => $prices[$i],
            ];

            array_push($data_items, $temp);
        }
        
        OfferItems::insert($data_items);


        $approve = OfferApprove::where('offer_id', $offer->id)->get();
        for ($i=0; $i < count($approve); $i++) { 
            $temp = [
                'status'    => 'proses',
            ];

            OfferApprove::whereId($approve[$i]['id'])->update($temp);
        }


        return redirect()->route('penawaran.index')->withSuccess('Penawaran Has Been Created');
    }

    public function destroy($id)
    {
        $offer = Offer::whereId($id);
        $offer->delete();
        
        return redirect()->back()->withSuccess('Penawaran Has Been Deleted');
    }

    public function responsible()
    {
        $users = User::all();
        $positions = Position::all();
        $responsibles = OfferResponsible::orderBy('priority', 'desc')->paginate(10);
        return view('penawaran.responsible', compact('users', 'positions', 'responsibles'));
    }

    public function add_responsible(Request $request)
    {
        $data = $this->validate($request, [
            'user_id' => 'required',
            'subject' => 'required',
            'as' => 'required',
            'priority' => 'required|min:1|unique:offer_responsibles',
            
        ]);

        OfferResponsible::create($data);

        return redirect()->back()->withSuccess('Responsible Has Been Created');
    }

    public function destroy_responsible($id)
    {
        $responsible = OfferResponsible::whereId($id);
        $responsible->delete();

        return redirect()->back()->withSuccess('Responsible Has Been Deleted');
    }

    public function pdf($id)
    {
        # code...
    }

    public function approve(Request $request)
    {
        $this->validate($request, ['status' => 'required']);

        if (preg_match('/all-/',$request->status))
        {
            $approve = OfferApprove::where('offer_id', $request->offer_id)->get();
            $status = $request->status;
            if ($status == 'all-reset')
            {
                for ($i=0; $i < count($approve) ; $i++) { 
                    OfferApprove::whereId($approve[$i]['id'])->update(['status' => 'waiting']);
                    Offer::whereId($request->offer_id)->update(['status' => 'on proses', 'catatan' => '']);
                }
            } elseif ($status == 'all-acc')
            {
                for ($i=0; $i < count($approve) ; $i++) { 
                    OfferApprove::whereId($approve[$i]['id'])->update(['status' => 'acc']);
                    Offer::whereId($request->offer_id)->update(['status' => 'approve', 'catatan' => '']);
                }
            } elseif ($status == 'all-revision')
            {
                for ($i=0; $i < count($approve) ; $i++) { 
                    OfferApprove::whereId($approve[$i]['id'])->update(['status' => 'revision']);
                    Offer::whereId($request->offer_id)->update(['status' => 'revision', 'catatan' => '']);
                }
            }

            // REUPLOAD STATUS NOTIFICATION
            // $notifications = Notification::where('request_id', $request->request_id)->get();
            // foreach($notifications as $notification){
            //     $notif = Notification::find($notification->id);
            //     $notif->is_read = 0;
            //     $notif->save();
            // }

            return redirect()->back()->withSuccess("Pengajuan Hass Been $status");
            
        }

        $status = $request->status;
        $approve = OfferApprove::where('offer_id', $request->offer_id)->where('user_id', Auth::id())->first();

        if ($status != 'perbaikan' && $status != 'hold')
        {
            OfferApprove::whereId($approve->id)->update(['status' => $status]);
        }
        else
        {
            $this->validate($request, ['catatan' => 'required']);
            OfferApprove::whereId($approve->id)->update(['status' => $status]);
            Offer::whereId($request->request_id)->update(['status' => 'perbaikan', 'catatan' => $request->catatan]);
        }
        

        // GET ALL STATUS APPROVER
        $approver = OfferApprove::where('offer_id', $request->offer_id)->get();

        // LOOP ALL STATUS
        for ($i=0; $i < count($approver); $i++) {

            // CHECK ALL STATUS AND UPDATE OFFER STATUS LIKE APPROVE STATUS
            if ($approver[$i]['status'] == 'cancel')
            {
                Offer::whereId($request->offer_id)->update(['status' => 'cancel']);
                break; 
            }
            elseif($approver[$i]['status'] == 'hold')
            {
                Offer::whereId($request->offer_id)->update(['status' => 'hold']);
                break;
            }
            elseif ($approver[$i]['status'] == 'revision')
            {
                Offer::whereId($request->offer_id)->update(['status' => 'revision']);
                break;
            }
            elseif ($approver[$i]['status'] == 'waiting')
            {
                Offer::whereId($request->offer_id)->update(['status' => 'on proses']);
                break;
            }
            elseif ($approver[count($approver) - 1]['status'] == 'acc')
            {
                Offer::whereId($request->offer_id)->update(['status' => 'approve']);
                break;
            }
        }

        // REUPLOAD STATUS NOTIFICATION
        // $notifications = Notification::where('request_id', $request->request_id)->get();
        // foreach($notifications as $notification){
        //     $notif = Notification::find($notification->id);
        //     $notif->is_read = 0;
        //     $notif->save();
        // }

        return redirect()->back()->withSuccess("Pengajuan Hass Been $status");
    }
}
