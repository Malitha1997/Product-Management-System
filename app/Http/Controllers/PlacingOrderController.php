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
        $placingOrders=PlacingOrder::all();
        return view('PlacingOrder.index',compact('placingOrders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function generateCode($length = 10) {
        $prefix = "ORDER-";
        // $dateComponent = date('Ym'); // YYYYMM format
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
            'product_id'=>'required|string',
            'quantity'=>'required|string',
            'free'=>'required|string',
            'amount'=>'required|string',
            'net_amount'=>'required|string'
        ]);

        $placingOrder = new PlacingOrder;

        $placingOrder->customer_id=$request->customer_id;
        $placingOrder->order_number=$request->order_number;
        $placingOrder->product_id=$request->product_id;
        $placingOrder->quantity=$request->quantity;
        $placingOrder->free=$request->free;
        $placingOrder->amount=$request->amount;
        $placingOrder->net_amount=$request->net_amount;

        $placingOrder->save();

        return redirect()->route('placingOrders.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $placingOrder=PlacingOrder::find($id);
        return view('PlacingOrder.show',compact('placingOrder'));
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
