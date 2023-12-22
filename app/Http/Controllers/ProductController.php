<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::all();

        return view('Product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('Product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'name'=>'required|string',
            'code'=>'required|string',
            'price'=>'required|string',
            'expiry_date'=>'required|string'
        ]);

        $product = new Product;

        $product->name=$request->name;
        $product->code=$request->code;
        $product->price=$request->price;
        $product->expiry_date=$request->expiry_date;

        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product=Product::find($id);
        return view('Product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        request()->validate([
            'name'=>'required|string',
            'code'=>'required|string',
            'price'=>'required|string',
            'expiry_date'=>'required|string'
        ]);

        $product = Product::find($id);

        $product->name=$request->name;
        $product->code=$request->code;
        $product->price=$request->price;
        $product->expiry_date=$request->expiry_date;

        $product->update();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function main(){
        return view('main');
    }
}
