<?php

namespace App\Http\Controllers;

use App\Product;
use App\RequestCategory;
use App\RequestItems;
use App\RequestReport;
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
        // dd($request->all());
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
