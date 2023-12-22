@extends('Layouts.navbar')

@section('content')
<div class="container" style="font-family:poppins">
    <div class="row">
        <div class="col-12">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('main')}}"><h10>Home</h10></a></li>
                    <li class="breadcrumb-item"><a href="{{route('customers.create')}}"><h10>Customer Registration</h10></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><h10>Customers</h10></li>
                </ol>
            </nav>
        </div>
    </div> 
    <div class="row">
        <h2 style="color:#1028D1;text-align:center;font-weight:bold">Customers</h2>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">Code</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Contact Number</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($customers)
            @foreach($customers as $customer)
            <tr>
            <td>{{$customer->code}}</td>
            <td>{{$customer->name}}</td>
            <td>{{$customer->address}}</td>
            <td>{{$customer->contact}}</td>
            <td><a type="button" class="btn btn-primary" href="{{route('customers.edit',$customer->id)}}">Edit</a></td>
            </tr>
            @endforeach
            @else
            <tr></tr>
            @endif
        </tbody>
    </table>
</div>
@endsection