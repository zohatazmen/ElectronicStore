@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Wishlist Management</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Shop</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wishlists as $wishlist)
                    <tr>
                        <td>{{ $wishlist->id }}</td>
                        <td>{{ $wishlist->user->name }}</td>
                        <td>{{ $wishlist->shop->name }}</td>
                        <td>
                            <a href="{{ route('admin.wishlists.show', $wishlist->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('admin.wishlists.edit', $wishlist->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.wishlists.destroy', $wishlist->id) }}" method="POST"
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
    </div>
@endsection
