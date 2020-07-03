<?php

namespace App\Http\Controllers;

use App\Division;
use App\RequestCategory;
use App\RequestType;
use Illuminate\Http\Request;

class RequestCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = RequestCategory::orderBy('id', 'desc')->paginate(10);
        return view('request.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = RequestType::all();
        $divisions = Division::all();
        return view('request.category.create', compact('types', 'divisions'));
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
            'name' => 'required',
            'code' => 'required',
            'type' => 'required',
            'division_id' => 'required',
        ]);

        RequestCategory::create($data);

        return redirect()->back()->withSuccess("Category $request->name, Has Been Created");
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = RequestType::all();
        $divisions = Division::all();
        $category = RequestCategory::findOrFail($id);
        return view('request.category.edit', compact('category', 'divisions', 'types'));
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
            'code' => 'required',
            'type' => 'required',
            'division_id' => 'required',
            'syarat' => ''
        ]);

        // dd($request->all());
        RequestCategory::whereId($id)->update($data);
        return redirect()->route('request.category.index')->withSuccess("Category $request->name, Has Been Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = RequestCategory::findOrFail($id);
        $category_name = $category->name;
        $category->delete();
        
        return redirect()->back()->withSuccess("Category $category_name, Has Been Deleted");
    }
}
