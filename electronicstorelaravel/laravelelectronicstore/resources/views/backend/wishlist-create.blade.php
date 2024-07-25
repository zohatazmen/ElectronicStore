@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h2>Create New Wishlist</h2>
        <form action="{{ route('admin.wishlists.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="user_id">User</label>
                <select name="user_id" id="user_id" class="form-control">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="shop_id">Shop</label>
                <select name="shop_id" id="shop_id" class="form-control">
                    @foreach ($shops as $shop)
                        <option value="{{ $shop->id }}">{{ $shop->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Add Wishlist Item</button>
        </form>
    </div>
@endsection
