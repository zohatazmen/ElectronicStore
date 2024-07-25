@extends('backend.layouts.app')

@section('title', 'Orders')

@section('content')

    <div class="container">
        <h1>Orders</h1>
        <a href="{{ route('admin.orders.create') }}" class="btn btn-primary">Add New Order</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Customer Email</th>
                    <th>Address</th>
                    <th>Total Amount</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->customer_email }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->total_amount }}</td>
                        <td>
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
