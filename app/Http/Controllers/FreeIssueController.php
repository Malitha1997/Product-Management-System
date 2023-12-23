<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\FreeIssue;
use Illuminate\Http\Request;

class FreeIssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $freeIssues=FreeIssue::all();
        return view('FreeIssue.index',compact('freeIssues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products=Product::all();
        return view('FreeIssue.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'label'=>'required|string',
            'type'=>'required|string',
            'product_id'=>'required|string',
            'free_product'=>'required|string',
            'purchase_quantity'=>'required|string',
            'free_quantity'=>'required|string',
            'lower_limit'=>'required|string',
            'upper_limit'=>'required|string',
        ]);

        $freeIsuue = new FreeIssue;

        $freeIsuue->label=$request->label;
        $freeIsuue->type=$request->type;
        $freeIsuue->product_id=$request->product_id;
        $freeIsuue->free_product=$request->free_product;
        $freeIsuue->purchase_quantity=$request->purchase_quantity;
        $freeIsuue->free_quantity=$request->free_quantity;
        $freeIsuue->lower_limit=$request->lower_limit;
        $freeIsuue->upper_limit=$request->upper_limit;

        $freeIsuue->save();

        return redirect()->route('freeIssues.index');
        
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
        $freeIssue=FreeIssue::find($id);
        $products=Product::all();
        return view('FreeIssue.edit',compact('freeIssue','products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        request()->validate([
            'label'=>'required|string',
            'type'=>'required|string',
            'product_id'=>'required|string',
            'free_product'=>'required|string',
            'purchase_quantity'=>'required|string',
            'free_quantity'=>'required|string',
            'lower_limit'=>'required|string',
            'upper_limit'=>'required|string',
        ]);

        $freeIsuue = FreeIssue::find($id);

        $freeIsuue->label=$request->label;
        $freeIsuue->type=$request->type;
        $freeIsuue->product_id=$request->product_id;
        $freeIsuue->free_product=$request->free_product;
        $freeIsuue->purchase_quantity=$request->purchase_quantity;
        $freeIsuue->free_quantity=$request->free_quantity;
        $freeIsuue->lower_limit=$request->lower_limit;
        $freeIsuue->upper_limit=$request->upper_limit;

        $freeIsuue->update();

        return redirect()->route('freeIssues.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
