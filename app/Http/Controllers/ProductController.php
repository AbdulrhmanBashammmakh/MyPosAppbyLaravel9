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
        $products =Product::with('category')->orderBy('id','desc')->paginate(4);
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
    public function show($id)
    {
        return view('pro.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::whereId($id)->first();
        if( $product){
            $cateq=Category::all();
            $unt=Unit::all();
            return view('pro.edit')->with('product',$product)->with('cateq', $cateq)->with('unt', $unt);;
        }
        return redirect()->route('pro.index')->with([
            'message' => 'you can not access or not found',
            'alert-type' => 'danger'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
            $product=Product::whereId($id)->first();
            if($product){
                $data['name']=$request->name;
                $data['code']=$request->code;
                $data['barcode']=$request->barcode;
                $data['details']=$request->details;
                $data['cata_id']=$request->cata;
                $data['unit_id']=$request->unit;


                   $product->update($data);
                    return redirect()->route('pro.index')->with([
                        'message' => 'update PRODUCT successfully',
                        'alert-type' => 'success'
                    ]);
            }
            return redirect()->route('pro.index')->with([
                'message' => 'you have not premission for that',
                'alert-type' => 'danger'
            ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::whereId($id)->first();
        if($product){
          //  $product->delete();
          $product->Delete();
            return redirect()->route('pro.index')->with([
                'message' => 'deleting is successfully',
                'alert-type' => 'success'
            ]);
        }

        return redirect()->route('pro.index')->with([
            'message' => 'you have not premission for that',
            'alert-type' => 'danger'
        ]);

    }
}
