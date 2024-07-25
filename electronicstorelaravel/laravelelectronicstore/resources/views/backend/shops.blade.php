@extends('backend.layouts.app')

@section('title', 'Shop Management')

@section('content')
    <div class="page-content">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
<br>
            <div class="mb-3">
                <a href="{{ route('admin.shops.create') }}" class="btn btn-dark">Add New Shop Product</a>
            </div>
<br>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($shops as $shop)
                        <tr>
                            <td>{{ $shop->name }}</td>
                            <td>{{ $shop->description }}</td>
                            <td>{{ $shop->category }}</td>
                            <td>${{ $shop->price }}</td>
                            <td>
                                @if ($shop->image)
                                    <img src="{{ asset('storage/' . $shop->image) }}" alt="Image" width="100">
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.shops.edit', $shop->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('admin.shops.destroy', $shop->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


            {{ $shops->links() }}
        </div>
    </div>
@endsection
