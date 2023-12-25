<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Customer;
use App\Models\FreeIssue;
use App\Models\PlacingOrder;
use Illuminate\Http\Request;

class PlacingOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = PlacingOrder::with('customer')->get(); 
        $placingOrders = $orders->groupBy('order_number');
        return view('PlacingOrder.index',compact('placingOrders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function generateCode($length = 10) {
        $prefix = "ORDER-";
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $maxNumberLength = $length - strlen($prefix);
        $randomString = '';
    
        for ($i = 0; $i < $maxNumberLength; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
    
        return $prefix . $randomString;
    }

    public function create(Request $request)
    {
        $products=Product::all();
        $customers=Customer::all();
        $freeIssue=FreeIssue::all();
        $placingOrder=PlacingOrder::all();

        $count = $request->session()->get('counter', 0);
        $count++;
        $request->session()->put('counter', $count);
        $orderNumber = str_pad($count, 3, '0', STR_PAD_LEFT);

        return view('PlacingOrder.create',compact('products','customers','orderNumber','freeIssue'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'customer_id'=>'required|string',
            'order_number'=>'required|string',
            'product_id'=>'required|array',
            'quantity'=>'required|array',
            'free'=>'required|array',
            'amount'=>'required|array',
            'net_amount'=>'required|string'
        ]);

        foreach ($request->product_id as $key => $value) {
            $placingOrder = new PlacingOrder; 
            $placingOrder->product_id = $value;
            $placingOrder->quantity = $request->quantity[$key];
            $placingOrder->free = $request->free[$key];
            $placingOrder->amount = $request->amount[$key];
            $placingOrder->order_number = $request->order_number;
            $placingOrder->customer_id = $request->customer_id;
            $placingOrder->net_amount=$request->net_amount;

            $placingOrder->save();
        }
        return redirect()->route('placingOrders.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $placingOrder = PlacingOrder::with('product')->find($id);
        $placingOrders = PlacingOrder::where('order_number', $placingOrder->order_number)->get();
        $orders=PlacingOrder::get();
        return view('PlacingOrder.show',compact('placingOrder','placingOrders','orders'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
