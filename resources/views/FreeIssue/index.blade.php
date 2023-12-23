@extends('Layouts.navbar')

@section('content')
<div class="container" style="font-family:poppins">
    <div class="row">
        <div class="col-12">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('main')}}"><h10>Home</h10></a></li>
                    <li class="breadcrumb-item"><a href="{{route('freeIssues.create')}}"><h10>Create Free Issues</h10></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><h10>Free issues</h10></li>
                </ol>
            </nav>
        </div>
    </div> 
    <div class="row">
        <h2 style="color:#1028D1;text-align:center;font-weight:bold">Free issues</h2>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">Free Issue Label</th>
            <th scope="col">Type</th>
            <th scope="col">Purchase Product</th>
            <th scope="col">Free Product</th>
            <th scope="col">Purchase Quantity</th>
            <th scope="col">Free Quantity</th>
            <th scope="col">Lower Limit</th>
            <th scope="col">Upper Limit</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($freeIssues)
            @foreach($freeIssues as $freeIssue)
            <tr>
            <td>{{$freeIssue->label}}</td>
            <td>{{$freeIssue->type}}</td>
            <td>{{$freeIssue->product->name}}</td>
            <td>{{$freeIssue->free_product}}</td>
            <td>{{$freeIssue->purchase_quantity}}</td>
            <td>{{$freeIssue->free_quantity}}</td>
            <td>{{$freeIssue->lower_limit}}</td>
            <td>{{$freeIssue->upper_limit}}</td>
            <td><a type="button" class="btn btn-primary" href="{{route('freeIssues.edit',$freeIssue->id)}}">Edit</a></td>
            </tr>
            @endforeach
            @else
            <tr></tr>
            @endif
        </tbody>
    </table>
</div>
@endsection