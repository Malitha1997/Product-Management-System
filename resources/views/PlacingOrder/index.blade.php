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
        @forelse($placingOrders as $orderNumber => $orders)
            @php
                $firstOrder = $orders->first();
            @endphp
            <tr>
                <td>{{ $orderNumber }}</td>
                <td>{{ $firstOrder->customer->name }}</td>
                <td>{{ $firstOrder->created_at->format('Y-m-d H:i') }}</td>
                <td>Rs.{{ $firstOrder->net_amount }}</td>
                <td><a type="button" class="btn btn-success" href="{{ route('placingOrders.show', $firstOrder->id) }}">View</a></td>
            </tr>
        @empty
            <tr><td colspan="5">No orders found</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection