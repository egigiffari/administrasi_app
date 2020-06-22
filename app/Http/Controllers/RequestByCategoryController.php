<?php

namespace App\Http\Controllers;

use App\RequestApprove;
use App\RequestCategory;
use App\RequestResponsible;
// use App\Request;
use App\User;

use Illuminate\Http\Request;
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
        return view('request.request_category.create', compact('code', 'users','category'));
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
           'amount' => 'required'
        ]);

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

        // dd($data);
        \App\Request::create($data);
        $request_code = \App\Request::where('code', $request->code)->first();
        $responsibles = RequestResponsible::where('category_id', $request->category_id)->get();
        
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

        RequestApprove::insert($approvers);

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
