<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Symfony\Component\VarDumper\VarDumper;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    protected $url_file_upload = 'uploads/products/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('updated_at', 'desc')->paginate(10);
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $product_types = ProductType::all();
        return view('product.product.create', compact('brands', 'product_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $this->validate($request, [
            'merk' => 'required|min:3',
            'name' => 'required',
            'type' => 'required',
            'spec' => 'required',
            'unit' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Check Brand Product
        $merk = Brand::where('name', $request->merk)->orWhere('name', 'like', $request->merk)->first();
        // If Not Found, Make New One
        if (!$merk) {
            $merk = Brand::create([
                'name' => $request->merk,
                'code' => Str::upper(Str::substr($request->merk,0, 3))
            ]);
        }

        // Initalization Code Product
        $code = $merk->code . "_" . Str::upper(Str::substr($request->name, 0,3));
        $product = Product::where("code", "like", $code)->orWhere("code", "like", "%" . $code . "%")->first();
        if ($product)
        {
           $code = explode('_', $product->code);
           $code_number = ($code[2] + 1);
           $code = [$code[0], $code[1], $code_number];
           $code = implode('_', $code);
        }
        else
        {
            $code = $code . '_' . 1;
        }
        // Check File Image
        $gambar = $request->image;
        $new_gambar = time().$gambar->getClientOriginalName();

        // Prepare Product Data
        $product_data = [
            'code' => $code,
            'merk' => $merk->id,
            'name' => $request->name,
            'type' => $request->type,
            'spec' => $request->spec,
            'unit' => Str::lower($request->unit),
            'image' => $this->url_file_upload . $new_gambar,
            'last_price' => 0
        ];

        // dd($product_data);

        // Upload Product And File Image
        $product = Product::create($product_data);
        $gambar->move($this->url_file_upload, $new_gambar);

        // Add To Table Multiple Category 
        $product->productType()->attach($request->category);

        // Redirect To Page Create Product
        return redirect()->back()->with('success', "Product : $request->name, Has Been Created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.product.detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brands = Brand::all();
        $product_types = ProductType::all();
        $product = Product::findorfail($id);
        return view('product.product.edit', compact('product','brands', 'product_types'));
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
        // Validation
        $this->validate($request, [
            'merk' => 'required|min:3',
            'name' => 'required',
            'type' => 'required',
            'spec' => 'required',
            'unit' => 'required',
            'category' => 'required',
        ]);

        // Check Brand Product
        $merk = Brand::where('name', $request->merk)->orWhere('name', 'like', $request->merk)->first();
        // If Not Found, Make New One
        if (!$merk) {
            $merk = Brand::create([
                'name' => $request->merk,
                'code' => Str::upper(Str::substr($request->merk,0, 3))
            ]);
        }
        // Initalization Code Product
        $code = $merk->code . "_" . Str::upper(Str::substr($request->name, 0,3));
        $product = Product::where("code", "like", $code)->orwhere("code", "like", "%" . $code . "%")->first();
        if ($product)
        {
           $code = explode('_', $product->code);
           $code_number = ($code[2] + 1);
           $code = [$code[0], $code[1], $code_number];
           $code = implode('_', $code);
        }
        else
        {
            $code = $code . '_' . 1;
        }
        
        // Prepare Product Data
        $product_data = [
            'code' => $code,
            'merk' => $merk->id,
            'name' => $request->name,
            'type' => $request->type,
            'spec' => $request->spec,
            'unit' => Str::lower($request->unit),
        ];

        // dd($product_data);

        // Upload Product And File Image
        $product = Product::findorfail($id);
        $product->update($product_data);

        // Add To Table Multiple Category 
        $product->productType()->sync($request->category);

        // Redirect To Page Create Product
        return redirect()->route('product.show', $id)->with('success', "Product : $request->name, Has Been Created");
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product_name = $product->name;
        $product->delete();

        return redirect()->back()->with('success', "Product : $product_name, Has Been Delete");
    }

    public function update_image(Request $request,$id)
    {
        $this->validate($request, ['image'=>'required|image|mimes:jpeg,png,jpg|max:2048']);

        // Check File Image
        $gambar = $request->image;
        $new_gambar = time().$gambar->getClientOriginalName();

        $data = ['image' => $this->url_file_upload . $new_gambar];
        $product = Product::findorfail($id);
        if ($product->image != $this->url_file_upload . 'default.jpg') {
            File::delete($product->image);
        }
        $product->update($data);
        $gambar->move($this->url_file_upload, $new_gambar);

        
        // Redirect To Page Create Product
        return redirect()->back()->with('success', "Product Image: $new_gambar , Has Been Updated");
    } 

    public function getAllProduct(Request $request)
    {
        if ($request->ajax()) {
            return Response::json(Product::whereId($request->id));
        }
    }
}
