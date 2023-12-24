@extends('Layouts.navbar')

@section('content')
<div class="container" style="font-family:poppins">
    <div class="row">
        <div class="col-12">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('main')}}"><h10>Home</h10></a></li>
                    <li class="breadcrumb-item"><a href="{{route('placingOrders.create')}}"><h10>Placing Order</h10></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><h10>Orders</h10></li>
                </ol>
            </nav>
        </div>
    </div> 
    <div class="row">
        <h2 style="color:#1028D1;text-align:center;font-weight:bold">Orders</h2>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">Order Number</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Order Date & Time</th>
            <th scope="col">Net Amount</th>
            <th scope="col">Detailed View</th>
            </tr>
        </thead>
        <tbody>
            @if($placingOrders)
            @foreach($placingOrders as $placingOrder)
            <tr>
            <td>{{$placingOrder->order_number}}</td>
            <td>{{$placingOrder->customer->name}}</td>
            <td>{{$placingOrder->created_at}}</td>
            <td>Rs.{{$placingOrder->net_amount}}</td>
            <td><a type="button" class="btn btn-success" href="{{route('placingOrders.show',$placingOrder->id)}}">View</a></td>
            </tr>
            @endforeach
            @else
            <tr></tr>
            @endif
        </tbody>
    </table>
</div>
@endsection