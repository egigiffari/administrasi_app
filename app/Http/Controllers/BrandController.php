<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('id', 'desc')->paginate(10);
        return view('product.brands', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.brand.create');
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
            'name' => 'required|min:3'
        ]);

        $merk = Brand::create([
            'name' => $request->name,
            'code' => Str::upper(Str::substr($request->name,0, 3))
        ]);

        return redirect()->back()->with('success', "Brand $request->name, Has Been Create");
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
        // $this->validate($request, ['name' => 'required|min:3']);
        $brand = Brand::findOrFail($id);
        return view('product.brand.edit', compact('brand'));
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
        $this->validate($request, ['name' => 'required|min:3']);
        $code = Str::upper(Str::substr($request->name,0, 3));
        $code = Brand::where('code', 'like', $code)->first();
        if ($code) {
            $code = Str::upper(Str::substr($request->name,0, 3) . Str::random(2));
        }else{
            $code = Str::upper(Str::substr($request->name,0, 3));
        }
        $data = [
            'name' => $request->name,
            'code' => $code
        ];
        $brand = Brand::whereId($id)->update($data);

        return redirect()->route('brand.index')->with('success', "Brand : $request->name, Has Been Editted");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand_name = $brand->name;
        $brand->delete();

        return redirect()->back()->with('success', "Brand : $brand_name, Has Been Delete");
    }
}
