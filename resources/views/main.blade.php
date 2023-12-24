@extends('Layouts.navbar')

@section('content')
<div class="container" style="font-family:poppins">
    <div class="row">
        <a class="btn btn-primary" type="button" href="{{route('products.create')}}" style="width:20%;margin-top:5%;margin-left:40%">Product Registration</a>
    </div>
    <div class="row">
        <a class="btn btn-success" type="button" href="{{route('customers.create')}}" style="width:20%;margin-top:5%;margin-left:40%">Customer Registration</a>
    </div>
    <div class="row">
        <a class="btn btn-warning" type="button" href="{{route('freeIssues.create')}}" style="width:20%;margin-top:5%;margin-left:40%">Define Free Issues</a>
    </div>
    <div class="row">
        <a class="btn btn-danger" type="button" href="{{route('placingOrders.create')}}" style="width:20%;margin-top:5%;margin-left:40%">Placing Order</a>
    </div>
</div>
@endsection