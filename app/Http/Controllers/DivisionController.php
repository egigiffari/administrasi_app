<?php

namespace App\Http\Controllers;

use App\Division;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = Division::orderBy('id', 'desc')->paginate(10);
        return view('division.index', compact('divisions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('division.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required'
        ]);

        Division::create($data);
        
        return redirect()->back()->withSuccess("'Division : $request->name, Has Been Created'");
    }

    public function edit($id)
    {
        $division = Division::findOrFail($id);
        return view('division.edit', compact('division'));
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
        $data = $this->validate($request, [
            'name' => 'required'
        ]);

        Division::whereId($id)->update($data);

        return redirect()->route('division.index')->withSuccess("Division, $request->name Has Been Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $division = Division::findOrFail($id);
        $division_name = $division->name;
        $division->delete();

        return redirect()->back()->withSuccess("Division $division_name, Has Been Deleted");
    }
}
