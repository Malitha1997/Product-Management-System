@extends('Layouts.navbar')

@section('content')
<div class="container" style="font-family:poppins">
    <div class="row">
        <div class="col-12">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('main')}}"><h10>Home</h10></a></li>
                    <li class="breadcrumb-item"><a href="{{route('freeIssues.create')}}"><h10>Create Free Issues</h10></a></li>
                    <li class="breadcrumb-item"><a href="{{route('freeIssues.index')}}"><h10>Free Issues</h10></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><h10>Edit Free issues</h10></li>
                </ol>
            </nav>
        </div>
    </div> 
    <div class="row">
        <h2 style="color:#1028D1;text-align:center;font-weight:bold">Edit Free Issues</h2>
    </div>
    <form method="POST" action="{{route('freeIssues.update',$freeIssue->id)}}">
        {{csrf_field()}}
        @method('PUT')
        <div class="row" style="margin-top:5%">
            <div class="col-6" style="text-align:right">
                <h4>FREE ISSUE LABEL</h4>
            </div>
            <div class="col-6">
                <input class="form-control-md" name="label" id="label" placeholder="Enter the free issue label" style="width:50%" value="{{$freeIssue->label}}">
            </div>
        </div>
        <div class="row">
            <div class="col-6" style="text-align:right">
                <h4>TYPE</h4>
            </div>
            <div class="col-6">
                <select class="form-select" name="type" id="type" style="width:50%">
                    <option selected>Select the type</option>
                    <option value="Flat" {{ $freeIssue->type == 'Flat' ? 'selected' : '' }}>Flat</option>
                    <option value="Multiple" {{ $freeIssue->type == 'Multiple' ? 'selected' : '' }}>Multiple</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-6" style="text-align:right">
                <h4>PURCHASE PRODUCT</h4>
            </div>
            <div class="col-6">
                <select class="form-select" name="product_id" id="productSelect" style="width:50%">
                    <option selected>Select the product</option>
                    @foreach($products as $product)
                    <option value="{{$product->id}}" {{ $freeIssue->product_id == $product->id ? 'selected' : '' }}>{{$product->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-6" style="text-align:right">
                <h4>FREE PRODUCT</h4>
            </div>
            <div class="col-6">
                <input type="text" class="form-control-md" name="free_product" id="free_product"  style="width:50%" value="{{$freeIssue->free_product}}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-6" style="text-align:right">
                <h4>PURCHASE QUANTITY</h4>
            </div>
            <div class="col-6">
                <input type="text" class="form-control-md" name="purchase_quantity" id="purchase_quantity" style="width:50%" value="{{$freeIssue->purchase_quantity}}" placeholder="Enter the purchase quantity">
            </div>
        </div>
        <div class="row">
            <div class="col-6" style="text-align:right">
                <h4>FREE QUANTITY</h4>
            </div>
            <div class="col-6">
                <input type="text" class="form-control-md" name="free_quantity" id="free_quantity"  style="width:50%" value="{{$freeIssue->free_quantity}}"  placeholder="Enter the free quantity">
            </div>
        </div>
        <div class="row">
            <div class="col-6" style="text-align:right">
                <h4>LOWER LIMIT</h4>
            </div>
            <div class="col-6">
                <input type="text" class="form-control-md" name="lower_limit" id="lower_limit" style="width:50%" value="{{$freeIssue->lower_limit}}" placeholder="Enter the lower limit">
            </div>
        </div>
        <div class="row">
            <div class="col-6" style="text-align:right">
                <h4>UPPER LIMIT</h4>
            </div>
            <div class="col-6">
                <input type="text" class="form-control-md" name="upper_limit" id="upper_limit" style="width:50%" value="{{$freeIssue->upper_limit}}" placeholder="Enter the upper limit">
            </div>
        </div>
        <div class="row">
            <div class="col-12" style="text-align:center">
                <button data-bs-toggle="modal" data-bs-target="#save" class="btn btn-primary" type="button" style="margin-top:2%;">UPDATE</button>
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
<script>
    document.getElementById('productSelect').addEventListener('change', function () {
        var freeProduct = this.options[this.selectedIndex].text;
        document.getElementById('free_product').value = freeProduct;
    });
</script>
@endsection