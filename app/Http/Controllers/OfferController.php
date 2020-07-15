<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('penawaran.index');
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($method)
    {
        if($method == 'boq')
        {
            $users = User::all();
            return view('penawaran.create', compact('users'));

        }
        elseif($method == 'no_boq')
        {
            $users = User::all();
            return view('penawaran.create', compact('users'));

        }
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

        dd($request->all());
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
