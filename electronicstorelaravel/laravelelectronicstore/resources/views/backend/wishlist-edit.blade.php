@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Wishlist Item</h1>

        <form action="{{ route('admin.wishlists.update', $wishlist->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="user_id">User</label>
                <select name="user_id" id="user_id" class="form-control">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $wishlist->user_id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="shop_id">Shop</label>
                <select name="shop_id" id="shop_id" class="form-control">
                    @foreach ($shops as $shop)
                        <option value="{{ $shop->id }}" {{ $shop->id == $wishlist->shop_id ? 'selected' : '' }}>
                            {{ $shop->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
