<?php

namespace App\Http\Controllers;

use App\Product;
use App\RequestApprove;
use App\RequestCategory;
use App\RequestItems;
use App\RequestResponsible;
// use App\Request;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RequestByCategoryController extends Controller
{
    function numberToRomanRepresentation($number) {
        $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $returnValue = '';
        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if($number >= $int) {
                    $number -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }
        return $returnValue;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RequestCategory $id)
    {
        $requests = \App\Request::where('category_id', 'like' ,$id->id)->orderBy('updated_at', 'desc')->paginate(10);
        if (Auth::user()->level->capacity == 10) {
            $requests = \App\Request::where('applicant_id', Auth::id())->where('category_id', 'like' ,$id->id)->orderBy('updated_at', 'desc')->paginate(10);
        }
        // dd($requests[0]);
        $category = $id;
        return view('request.request_category.index', compact('requests', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(RequestCategory $id)
    {
        $category = $id;
        $users = User::all();
        $items = Product::all();
        $code = \App\Request::where('code', 'like', "%" . $id->code . "%")->orderBy('id', 'desc')->first();
        if ($code) {
            $code = explode('/', $code->code);
            $number = str_replace('Rev-', '', $code[0]);
            if (!$number || $number == '') {
                $number = '001';
            }else{
                $number = sprintf("%'03d", ($number + 1));
            }
            $bulan = $this->numberToRomanRepresentation(date('m'));
            $thn = date('Y');
            $code = $number . $category->code . $bulan . '/' . $thn;
        }else {
            $code = '001' . $category->code . $this->numberToRomanRepresentation(date('m')) . '/' . date('Y');
        }
        return view('request.request_category.create', compact('code', 'users','category', 'items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'category_id' => 'required',
           'creator_id' => 'required',
           'code' => 'required',
           'applicant_id' => 'required',
           'perihal' => 'required',
           'date' => 'required',
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
        
        
        $date = explode(' - ', $request->date);
        $start_date = explode('/', $date[0]);
        $start_date = implode('-',[$start_date[2], $start_date[0], $start_date[1]]);
        $start_date = $start_date . ' ' . date('H:i:s');
        $expire_date = explode('/', $date[1]);
        $expire_date = implode('-',[$expire_date[2], $expire_date[0], $expire_date[1]]);
        $expire_date = $expire_date . ' ' . date('H:i:s');
        

        $data = [
            'category_id' => $request->category_id,
            'creator_id' => $request->creator_id,
            'applicant_id' => $request->applicant_id,
            'code' => $request->code,
            'perihal' => $request->perihal,
            'start_date' => $start_date,
            'expire_date' => $expire_date,
            'total' => $request->total,
            'amount' => $request->amount,
        ];

        // INSERT DATA TO REQUESTS TABLE
        \App\Request::create($data);
        // GET DATA REQUEST FROM LAST INPUT
        $request_code = \App\Request::where('code', $request->code)->first();
        // SEARCH DATA RESPONSIBLE REQUEST FROM CATEGORY ID
        $responsibles = RequestResponsible::where('category_id', $request->category_id)->get();
        // INSERT DATA RESPONSIBLE IN 1 ARRAY
        $approvers = [];
        foreach ($responsibles as $responsible) {
            $temp = [
                'request_id' => $request_code->id,
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
                'request_id' => $request_code->id,
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

        // INSERT DATA RESPONSIBLE TO APPROVAL REQUEST
        RequestApprove::insert($approvers);

        // INSERT DATA REQUEST ITEM TO REQUEST ITEMS TABLE
        RequestItems::insert($data_items);



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
        $request = \App\Request::findOrFail($id);
        $category = RequestCategory::findOrFail($request->category_id);
        $items = RequestItems::where('request_id', $request->id)->get();
        $responsibles = RequestApprove::where('request_id', $request->id)->get();
        // dd($responsible);
        return view('request.request_category.detail', compact('request', 'items', 'category', 'responsibles'));
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
        $request = Request::findOrFail($id);
        $request_name = $request->categories->name;

        RequestItems::where('request_id', $id)->delete();
        RequestApprove::where('request_id', $id)->delete();
        $request->delete();
        

        return redirect()->back()->withSuccess("$request_name, Has Been Deleted");
    }
}
