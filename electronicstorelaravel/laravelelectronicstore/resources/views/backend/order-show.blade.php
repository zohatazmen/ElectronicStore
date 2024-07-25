@extends('backend.layouts.app')

@section('title', 'View Order')

@section('content')

<div class="container">
    <h1>Order Details</h1>
    <h2>Customer Information</h2>
    <p><strong>Name:</strong> {{ $order->customer_name }}</p>
    <p><strong>Email:</strong> {{ $order->customer_email }}</p>
    <p><strong>Address:</strong> {{ $order->address }}</p>
    <p><strong>Total Amount:</strong> {{ $order->total_amount }}</p>

    <h2>Order Items</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orderItems as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->product_name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

