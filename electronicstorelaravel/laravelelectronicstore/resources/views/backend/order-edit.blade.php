@extends('backend.layouts.app')

@section('title', 'Edit Order')

@section('content')

    <div class="container">
        <h1>Edit Order</h1>
        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="customer_name">Customer Name</label>
                <input type="text" name="customer_name" class="form-control" value="{{ $order->customer_name }}" required>
            </div>
            <div class="form-group">
                <label for="customer_email">Customer Email</label>
                <input type="email" name="customer_email" class="form-control" value="{{ $order->customer_email }}"
                    required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" value="{{ $order->address }}" required>
            </div>
            <div class="form-group">
                <label for="total_amount">Total Amount</label>
                <input type="number" name="total_amount" class="form-control" value="{{ $order->total_amount }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Order</button>
        </form>
    </div>
@endsection
