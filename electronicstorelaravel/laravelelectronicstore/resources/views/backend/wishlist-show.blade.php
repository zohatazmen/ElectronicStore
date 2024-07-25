@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Wishlist Details</h1>

        <div class="card">
            <div class="card-header">Wishlist Item</div>
            <div class="card-body">
                <p><strong>ID:</strong> {{ $wishlist->id }}</p>
                <p><strong>User:</strong> {{ $wishlist->user->name }}</p>
                <p><strong>Shop:</strong> {{ $wishlist->shop->name }}</p>
            </div>
        </div>
    </div>
@endsection
