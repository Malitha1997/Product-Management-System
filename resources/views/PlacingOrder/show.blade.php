@extends('Layouts.navbar')

@section('content')
<div class="container" style="font-family:poppins">
    <div class="row">
        <div class="col-12">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('main')}}"><h10>Home</h10></a></li>
                    <li class="breadcrumb-item"><a href="{{route('placingOrders.create')}}"><h10>Placing Order</h10></a></li>
                    <li class="breadcrumb-item"><a href="{{route('placingOrders.index')}}"><h10>Orders</h10></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><h10>Detailed View</h10></li>
                </ol>
            </nav>
        </div>
    </div> 
    <div class="row">
        <h2 style="color:#1028D1;text-align:center;font-weight:bold">Detailed View</h2>
    </div>
    <div class="row" style="margin-top:5%">
        <div class="col-6" style="text-align:right">
            <h4>ORDER NUMBER :</h4>
        </div>
        <div class="col-6">
            <h4>{{$placingOrder->order_number}}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-6" style="text-align:right">
            <h4>CUSTOMER NAME :</h4>
        </div>
        <div class="col-6">
            <h4>{{$placingOrder->customer->name}}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-6" style="text-align:right">
            <h4>CUSTOMER CONTACT NO :</h4>
        </div>
        <div class="col-6">
            <h4>{{$placingOrder->customer->contact}}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-6" style="text-align:right">
            <h4>CUSTOMER ADDRESS :</h4>
        </div>
        <div class="col-6">
            <h4>{{$placingOrder->customer->address}}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-6" style="text-align:right">
            <h4>PRODUCT NAME :</h4>
        </div>
        <div class="col-6">
            <h4>{{$placingOrder->product->name}}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-6" style="text-align:right">
            <h4>PRODUCT CODE :</h4>
        </div>
        <div class="col-6">
            <h4>{{$placingOrder->product->code}}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-6" style="text-align:right">
            <h4>PRICE :</h4>
        </div>
        <div class="col-6">
            <h4>{{$placingOrder->product->price}}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-6" style="text-align:right">
            <h4>QUANTITY :</h4>
        </div>
        <div class="col-6">
            <h4>{{$placingOrder->quantity}}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-6" style="text-align:right">
            <h4>FREE :</h4>
        </div>
        <div class="col-6">
            <h4>{{$placingOrder->free}}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-6" style="text-align:right">
            <h4>AMOUNT :</h4>
        </div>
        <div class="col-6">
            <h4>Rs.{{$placingOrder->amount}}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-6" style="text-align:right">
            <h4>NET AMOUNT :</h4>
        </div>
        <div class="col-6">
            <h4>Rs.{{$placingOrder->net_amount}}</h4>
        </div>
    </div>
</div>
@endsection