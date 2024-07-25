@extends('backend.layouts.app')

@section('title', 'Create Order')

@section('content')

<div class="container">
    <h1>Create Order</h1>
    <form action="{{ route('admin.orders.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="customer_name">Customer Name</label>
            <input type="text" name="customer_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="customer_email">Customer Email</label>
            <input type="email" name="customer_email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="total_amount">Total Amount</label>
            <input type="number" name="total_amount" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Order</button>
    </form>
</div>
@endsection
