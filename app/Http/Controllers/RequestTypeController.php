<?php

namespace App\Http\Controllers;

use App\RequestType;
use Illuminate\Http\Request;

class RequestTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = RequestType::orderBy('id', 'desc')->paginate(10);
        return view('request.type.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('request.type.create');
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

        RequestType::create($data);

        return redirect()->back()->withSuccess("Type : $request->name, Has Been Created");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = RequestType::findOrFail($id);
        return view('request.type.edit', compact('type'));
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

        RequestType::whereId($id)->update($data);

        return redirect()->route('request.type.index')->withSuccess("'Type, $request->name Has Been Update'");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = RequestType::findOrFail($id);
        $type_name = $type->name;
        $type->delete();

        return redirect()->back()->withSuccess("Type $type_name, Has Been Deleted");
    }
}
