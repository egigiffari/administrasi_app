<?php

namespace App\Http\Controllers;

use App\Product;
use App\RequestCategory;
use App\RequestItems;
use App\RequestReport;
use App\RequestReportItem;
use App\User;
use Illuminate\Http\Request;

class RequestReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RequestCategory $category)
    {
        $reports = RequestReport::where('category_id', $category->id)->paginate(10);
        $category = $category;
        return view('request.report.index', compact('reports', 'category'));
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
        // dd($report_id);
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
            
            $item_id = Product::findOrFail($items[$i]);
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

        // INSERT DATA REQUEST ITEM TO REQUEST ITEMS TABLE
        RequestReportItem::insert($data_items);

        return redirect()->back()->withSuccess("Pengajuan Has Been Created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
