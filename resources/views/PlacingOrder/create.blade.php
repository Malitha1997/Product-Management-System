@extends('Layouts.navbar')

@section('content')
<div class="container" style="font-family:poppins">
    <div class="row">
        <div class="col-12">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('main')}}"><h10>Home</h10></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><h10>Placing Order</h10></li>
                </ol>
            </nav>
        </div>
    </div> 
    <div class="row">
        <h2 style="color:#1028D1;text-align:center;font-weight:bold">Placing Order</h2>
    </div>
    <form method="POST" action="{{route('placingOrders.store')}}">
    {{csrf_field()}}
        <div class="row" style="margin-top:5%">
            <div class="col-6" style="text-align:right">
                <h4>CUSTOMER NAME</h4>
            </div>
            <div class="col-6">
                <select class="form-select-md" name="customer_id" id="customerSelect" style="width:50%">
                    <option selected>Select the Customer</option>
                    @foreach($customers as $customer)
                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row" style="margin-top:1%">
            <div class="col-6" style="text-align:right">
                <h4>ORDER NUMBER</h4>
            </div>
            <div class="col-6">
                <input class="form-control-md" name="order_number" id="order_number" style="width:50%" value="{{$orderNumber}}" readonly>
            </div>
        </div>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">Product Name</th>
            <th scope="col">Product Code</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Free</th>
            <th scope="col">Amount</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td>
                <select class="form-select-md" name="product_id" id="productSelect" style="">
                    <option selected>Select the product</option>
                    @foreach($products as $product)
                    <option value="{{$product->id}}" code="{{$product->code}}" price="{{$product->price}}" free="{{$product->freeIssue->free_quantity}}" purchase_quantity="{{$product->freeIssue->purchase_quantity}}" type="{{$product->freeIssue->type}}">{{$product->name}}</option>
                    @endforeach
                </select>
            </td>
            <td><input type="text" class="form-control-md" name="product_code" id="product_code"   readonly></td>
            <td><input type="text" class="form-control-md" name="price" id="price"  readonly></td>
            <td><input type="text" class="form-control-md" name="quantity" id="quantity"  placeholder="Enter quantity"></td>
            <td><input type="text" class="form-control-md" name="free" id="free"  readonly></td>
            <td><input type="text" class="form-control-md" name="amount" id="amount"  readonly></td>
            <td><a type="button" class="btn btn-primary" href="">Edit</a></td>
            </tr> 
            <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align:right">Net Amount :</td>
            <td><input type="text" class="form-control-md" name="net_amount" id="net_amount"  readonly></td>
            <td></td>
            </tr>  
        </tbody>
    </table>
    <input type="hidden" class="form-control-md" name="free_quantity" id="free_quantity" style="width:50%" readonly>
    <input type="hidden" class="form-control-md" name="purchase" id="purchase" style="width:50%" readonly>
    <input type="hidden" class="form-control-md" name="type" id="type" style="width:50%" readonly>
    <div class="row">
        <div class="col-12" style="text-align:center">
            <button data-bs-toggle="modal" data-bs-target="#save" class="btn btn-primary" type="button" style="margin-top:5%;">SAVE</button>
        </div>
    </div>
    <div class="row">
            <div class="col-12" style="text-align:center">
                <a class="btn btn-success" type="button" href="{{route('placingOrders.index')}}" style="margin-top:2%;">ORDERS</a>
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
                        <h5 style="color:#000000">Are you sure to save?</h5>
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
        var selectedOption = this.options[this.selectedIndex];
        var code = selectedOption.getAttribute('code');
        var price = selectedOption.getAttribute('price');
        var free = selectedOption.getAttribute('free');
        var purchase = selectedOption.getAttribute('purchase_quantity');
        var type = selectedOption.getAttribute('type');
        
        document.getElementById('product_code').value = code;
        document.getElementById('price').value = price;
        document.getElementById('free_quantity').value = free;
        document.getElementById('purchase').value = purchase;
        document.getElementById('type').value = type;
    });
</script>
<script>
    document.getElementById('quantity').addEventListener('input', function() {
    var quantity = parseFloat(this.value);
    var purchase = parseFloat(document.getElementById('purchase').value);
    var freeQuantity = parseFloat(document.getElementById('free_quantity').value);
    var price = parseFloat(document.getElementById('price').value);
    var net_amount = parseFloat(document.getElementById('net_amount').value);
    var type = document.getElementById('type').value;

    if(type==='Multiple'){
        if (!isNaN(quantity) && !isNaN(purchase) && !isNaN(freeQuantity)) {
            var free = (quantity / purchase) * freeQuantity;
            document.getElementById('free').value = free.toFixed(0);
        } else {
            document.getElementById('free').value = '';
        }
    }   
    else if(type==='Flat'){
        document.getElementById('free').value = freeQuantity;
    }

    var amount=price*quantity;
    document.getElementById('amount').value = amount;
    document.getElementById('net_amount').value = amount;
    
});
</script>
@endsection