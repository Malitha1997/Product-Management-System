@extends('Layouts.navbar')

@section('content')
<div class="container" style="font-family:poppins">
    <div class="row">
        <div class="col-12">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('main')}}"><h10>Home</h10></a></li>
                    <li class="breadcrumb-item"><a href="{{route('customers.create')}}"><h10>Customer Registration</h10></a></li>
                    <li class="breadcrumb-item"><a href="{{route('customers.index')}}"><h10>Customers</h10></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><h10>Customer Edit</h10></li>
                </ol>
            </nav>
        </div>
    </div> 
    <div class="row">
        <h2 style="color:#1028D1;text-align:center;font-weight:bold">Customer Edit</h2>
    </div>
    <form method="POST" action="{{route('customers.update',$customer->id)}}">
        {{csrf_field()}}
        @method('PUT')
        <div class="row" style="margin-top:5%">
            <div class="col-6" style="text-align:right">
                <h4>CUSTOMER NAME</h4>
            </div>
            <div class="col-6">
                <input class="form-control-md" name="name" id="name" value="{{$customer->name}}" placeholder="Enter the name">
            </div>
        </div>
        <div class="row">
            <div class="col-6" style="text-align:right">
                <h4>CUSTOMER CODE</h4>
            </div>
            <div class="col-6">
                <input class="form-control-md" name="code" id="code" value="{{$customer->code}}" placeholder="Enter the code">
            </div>
        </div>
        <div class="row">
            <div class="col-6" style="text-align:right">
                <h4>CUSTOMER ADDRESS</h4>
            </div>
            <div class="col-6">
                <input class="form-control-md" name="address" id="address" value="{{$customer->address}}" placeholder="Enter the address">
            </div>
        </div>
        <div class="row">
            <div class="col-6" style="text-align:right">
                <h4>CUSTOMER CONTACT</h4>
            </div>
            <div class="col-6">
                <input type="text" class="form-control-md" name="contact" id="contact" value="{{$customer->contact}}" placeholder="Enter the contact no.">
            </div>
        </div>
        <div class="row">
            <div class="col-12" style="text-align:center">
                <button data-bs-toggle="modal" data-bs-target="#save" class="btn btn-primary" type="button" style="margin-top:5%;">UPDATE</button>
            </div> 
        </div>


        <div class="modal fade" style="font-family:poppins" id="save" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h5 id="h4" class="modal-title" id="exampleModalLabel">Warning</h5> -->
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5 style="color:#000000">Are you sure to update?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">No</button>
                        <button class="btn btn-danger" type="submit" style="font-family: Poppins;border-width:0px;">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection