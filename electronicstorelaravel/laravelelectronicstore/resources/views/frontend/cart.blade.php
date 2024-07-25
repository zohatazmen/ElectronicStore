@extends('frontend.layouts.main')
@section('title', 'Cart')
@section('main-container')

    <!-- BREADCRUMBS SECTION START -->
    <div class="breadcrumbs-section plr-200 mb-80 section">
        <div class="breadcrumbs overlay-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumbs-inner">
                            <h1 class="breadcrumbs-title">Shopping Cart</h1>
                            <ul class="breadcrumb-list">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>Shopping Cart</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMBS SECTION END -->

    <!-- Start page content -->
    <section id="page-content" class="page-wrapper section">
        <!-- SHOP SECTION START -->
        <div class="shop-section mb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shopping-cart-content">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if (session('cart') && count(session('cart')) > 0)
                                <form action="{{ route('cart.clear') }}" method="POST" style="margin-bottom: 20px;">
                                    @csrf
                                    <button type="submit" class="submit-btn-1 mt-30 btn-hover-1">Empty Cart</button>
                                </form>

                                <form action="{{ route('cart.checkout') }}" method="POST">
                                    @csrf
                                    <div class="table-content table-responsive mb-50">
                                        <table class="text-center">
                                            <thead>
                                                <tr>
                                                    <th class="product-thumbnail">Product</th>
                                                    <th class="product-price">Price</th>
                                                    <th class="product-quantity">Quantity</th>
                                                    <th class="product-subtotal">Total</th>
                                                    <th class="product-remove">Remove</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $grandTotal = 0;
                                                @endphp
                                                @foreach (session('cart', []) as $itemId => $item)
                                                    @php
                                                        $itemTotal = $item['price'] * $item['quantity'];
                                                        $grandTotal += $itemTotal;
                                                    @endphp
                                                    <tr>
                                                        <td class="product-thumbnail">
                                                            <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}"
                                                                width="100">
                                                        </td>
                                                        <td class="product-price">${{ number_format($item['price'], 2) }}
                                                        </td>
                                                        <td class="product-quantity">{{ $item['quantity'] }}</td>
                                                        <td class="product-subtotal">${{ number_format($itemTotal, 2) }}
                                                        </td>
                                                        <td class="product-remove">
                                                            <form action="{{ route('cart.remove', ['id' => $itemId]) }}"
                                                                method="POST" style="display: inline;">
                                                                @csrf
                                                                <button type="submit" class="remove">Remove</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="3">Grand Total</td>
                                                    <td colspan="2">${{ number_format($grandTotal, 2) }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Billing Details -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="billing-details pr-10">
                                                <h6 class="widget-title border-left mb-20">Billing Details</h6>
                                                <input type="text" name="name" placeholder="Your Name Here..."
                                                    required>
                                                <input type="text" name="email" placeholder="Email Address Here..."
                                                    required>
                                                <input type="text" name="phone" placeholder="Phone Here..." required>
                                                <input type="text" name="company" placeholder="Company Name Here...">
                                                <select class="custom-select" name="country" required>
                                                    <option value="" disabled selected>Country</option>
                                                    <option value="Pakistan">Pakistan</option>
                                                    <!-- Add more options if needed -->
                                                </select>
                                                <select class="custom-select" name="state" required>
                                                    <option value="" disabled selected>State</option>
                                                    <option value="Punjab">Punjab</option>
                                                    <option value="Sindh">Sindh</option>
                                                    <option value="Khyber Pakhtunkhwa">Khyber Pakhtunkhwa</option>
                                                    <!-- Add more options if needed -->
                                                </select>
                                                <select class="custom-select" name="city" required>
                                                    <option value="" disabled selected>City</option>
                                                    <option value="Sahiwal">Sahiwal</option>
                                                    <option value="Okara">Okara</option>
                                                    <option value="Lahore">Lahore</option>
                                                    <option value="Islamabad">Islamabad</option>
                                                    <!-- Add more options if needed -->
                                                </select>
                                                <textarea class="custom-textarea" name="address" placeholder="Your Address Here..." required></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <button class="submit-btn-1 mt-30 btn-hover-1" type="submit">Place Order</button>
                                </form>
                            @else
                                <p>Your cart is empty.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- SHOP SECTION END -->
    </section>
    <!-- End page content -->

@endsection
