@extends('Layouts.navbar')

@section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
        <div class="row" style="margin-top:1%">
            <div class="col-6" style="text-align:right">
                <h5>CUSTOMER NAME</h5>
            </div>
            <div class="col-6">
                <h5>{{$placingOrder->customer->name}}</h5>
            </div>
        </div>
        <div class="row" style="margin-top:1%">
            <div class="col-6" style="text-align:right">
                <h5>CUSTOMER ADDRESS</h5>
            </div>
            <div class="col-6">
                <h5>{{$placingOrder->customer->address}}</h5>
            </div>
        </div>
        <div class="row" style="margin-top:1%">
            <div class="col-6" style="text-align:right">
                <h5>CUSTOMER CONTACT</h5>
            </div>
            <div class="col-6">
                <h5>{{$placingOrder->customer->contact}}</h5>
            </div>
        </div>
        <div class="row" style="margin-top:1%">
            <div class="col-6" style="text-align:right">
                <h5>ORDER NUMBER</h5>
            </div>
            <div class="col-6">
                <h5>{{$placingOrder->order_number}}</h5>
            </div>
        </div>
        <center>
            <button class="btn btn-primary hidden-print" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
        </center>
    <table class="table table-striped" id="myTable">
        <thead>
            <tr>
            <th scope="col">Product Name</th>
            <th scope="col">Type</th>
            <th scope="col">Product Code</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Free</th>
            <th scope="col">Amount</th>
            </tr>
        </thead>
        <tbody>
        @foreach($placingOrders as $placingOrder)
        <tr> 
            <td>{{$placingOrder->product->name}}</td>
            <td>{{$placingOrder->product->freeIssue->type}}</td>
            <td>{{$placingOrder->product->code}}</td>
            <td>{{$placingOrder->product->price}}</td>
            <td>{{$placingOrder->quantity}}</td>
            <td>{{$placingOrder->free}}</td>
            <td>{{$placingOrder->amount}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col" style="text-align:right">
            Net Amount : Rs.{{$placingOrder->net_amount}}
        </div>
    </div>
</div>
<script>
function myFunction() {
    window.print();
}
</script>
@endsection