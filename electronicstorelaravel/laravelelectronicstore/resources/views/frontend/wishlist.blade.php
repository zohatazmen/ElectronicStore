@extends('frontend.layouts.main')
@section('title', 'Wishlist')
@section('main-container')
    <div class="breadcrumbs-section plr-200 mb-80 section">
        <div class="breadcrumbs overlay-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumbs-inner">
                            <h1 class="breadcrumbs-title">Wishlist</h1>
                            <ul class="breadcrumb-list">
                                <li><a href="{{ route('dashboard') }}">Home</a></li>
                                <li>Wishlist</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="page-content" class="page-wrapper section">
        <div class="shop-section mb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="wishlist-content">
                            <div class="table-content table-responsive mb-50">
                                <table class="text-center">
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-stock">Stock Status</th>
                                            <th class="product-add-cart">Add to Cart</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($wishlistItems as $item)
                                            <tr>
                                                <td class="product-thumbnail">
                                                    <a href="#">
                                                        <img src="{{ asset($item->shop->image) }}"
                                                            alt="{{ $item->shop->name }}">
                                                    </a>
                                                    <a href="#">{{ $item->shop->name }}</a>
                                                </td>
                                                <td class="product-price">
                                                    <span class="amount">${{ $item->shop->price }}</span>
                                                </td>
                                                <td class="product-stock">
                                                    In Stock
                                                </td>
                                                <td class="product-add-cart">
                                                    <form action="{{ route('cart.add') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="shop_id" value="{{ $item->shop->id }}">
                                                        <button type="submit" title="Add to cart"><i
                                                                class="zmdi zmdi-shopping-cart-plus"></i></button>
                                                    </form>
                                                </td>
                                                <td class="product-remove">
                                                    <form action="{{ route('wishlist.remove', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" title="Remove"><i
                                                                class="zmdi zmdi-close"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
