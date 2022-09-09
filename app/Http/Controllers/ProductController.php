<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

     */

public function __construct()
{
$this->middleware('auth');
}
     public function index()
    {
        //
        $products =Product::with('category')->orderBy('id','desc')->paginate(15);
        return view('pro.index')->with('products', $products);

       // return View('pro.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cateq=Category::all();
        $unt=Unit::all();
        return view('pro.create')->with('cateq', $cateq)->with('unt', $unt);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
$request->all(),
[
    'name' =>'required',
    'cata' =>'required',
    'unit' =>'required',
]
        );
if($validator->fails()){
    return redirect()->back()->withErrors($validator)->withInput();
}

$data['name']=$request->name;
$data['code']=$request->code;
$data['barcode']=$request->barcode;
$data['details']=$request->details;
$data['cata_id']=$request->cata;
$data['unit_id']=$request->unit;
//$data['user_id']=auth()->id;

    Product::create($data);
    return redirect()->route('pro.index')->with([
        'message' => 'created PRODUCT successfully',
        'alert-type' => 'success'
    ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return view('pro.edit')->with('product');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
