<?php

namespace App\Http\Controllers;

use App\Division;
use App\Position;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Position::orderBy('id', 'desc')->paginate(10);
        return view('position.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = Division::all();
        return view('position.create', compact('divisions'));
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
        $this->validate($request, [
            'name' => 'required',
            'division_id' => 'required'
        ]);
        
        Position::create($request->all());

        return redirect()->back()->withSuccess("Position : $request->name, Has Been Created");
    }

    public function edit($id)
    {
        $divisions = Division::all();
        $position = Position::findOrFail($id);
        return view('position.edit', compact('position', 'divisions'));
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
            'name' => 'required',
            'division_id' => 'required'
        ]);
        
        Position::whereId($id)->update($data);

        return redirect()->route('position.index')->withSuccess("Position : $request->name, Has Been Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $position = Position::findOrFail($id);
        $position_name = $position->name;
        $position->delete();

        return redirect()->back()->withSuccess("Position : $position_name, Has Deleted");
    }
}
