@extends('frontend.layouts.main')
@section('title', 'Shop')
@section('main-container')
    <div class="page-content">
        <!-- SHOP SECTION START -->
        <div class="shop-section mb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 order-lg-2 order-1">
                        <div class="shop-content">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="shop-option box-shadow mb-30 clearfix">
                                <!-- short-by -->
                                <div class="short-by f-left text-center">
                                    <span>Sort by:</span>
                                    <select name="sortby" id="sortby" class="form-control">
                                        <option value="default">Default</option>
                                        <option value="price_asc">Price: Low to High</option>
                                        <option value="price_desc">Price: High to Low</option>
                                    </select>
                                </div>
                                <!-- showing -->
                                <div class="showing f-right text-center">
                                    <span>Showing : {{ $shops->count() }} items</span>
                                </div>
                            </div>
                            <!-- shop-products -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="grid-view">
                                    <div class="row">
                                        @foreach ($shops as $shop)
                                            <div class="col-lg-4 col-md-6">
                                                <div class="product-item">
                                                    <div class="product-img">
                                                        <a href="">
                                                            <img src="{{ asset('storage/' . $shop->image) }}"
                                                                alt="{{ $shop->name }}" />
                                                        </a>
                                                    </div>
                                                    <div class="product-info">
                                                        <h6 class="product-title">
                                                            <a href="">{{ $shop->name }}</a>
                                                        </h6>
                                                        <div class="pro-rating">
                                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                            <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                        </div>
                                                        <h3 class="pro-price">${{ $shop->price }}</h3>
                                                        <ul class="action-button">
                                                            <li>
                                                                <form action="{{ route('wishlist.add') }}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="shop_id"
                                                                        value="{{ $shop->id }}">
                                                                    <button type="submit" title="Wishlist"><i
                                                                            class="zmdi zmdi-favorite"></i></button>
                                                                </form>
                                                            </li>
                                                            <li>
                                                                <a href="#" data-bs-toggle="modal"
                                                                    data-bs-target="#productModal" title="Quickview"><i
                                                                        class="zmdi zmdi-zoom-in"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#" title="Compare"><i
                                                                        class="zmdi zmdi-refresh"></i></a>
                                                            </li>
                                                            <li>
                                                                <form action="{{ route('cart.add') }}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="shop_id"
                                                                        value="{{ $shop->id }}">
                                                                    <button type="submit" title="Add to cart"><i
                                                                            class="zmdi zmdi-shopping-cart-plus"></i></button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- shop-pagination -->
                            {{ $shops->links() }}
                        </div>
                    </div>
                    <div class="col-lg-3 order-lg-1 order-2">
                        <!-- widget-search -->
                        <aside class="widget-search mb-30">
                            <form action="{{ route('shop.index') }}" method="GET">
                                <input type="text" name="search" placeholder="Search here...">
                                <button type="submit"><i class="zmdi zmdi-search"></i></button>
                            </form>
                        </aside>
                        <!-- widget-categories -->
                        <aside class="widget widget-categories box-shadow mb-30">
                            <h6 class="widget-title border-left mb-20">Categories</h6>
                            <div id="cat-treeview" class="product-cat">
                                <ul>
                                    <li class="closed"><a href="#">Brand One</a>
                                        <ul>
                                            <li><a href="#">Mobile</a></li>
                                            <li><a href="#">Tab</a></li>
                                            <li><a href="#">Watch</a></li>
                                            <li><a href="#">Head Phone</a></li>
                                            <li><a href="#">Memory</a></li>
                                        </ul>
                                    </li>
                                    <li class="open"><a href="#">Brand Two</a>
                                        <ul>
                                            <li><a href="#">Mobile</a></li>
                                            <li><a href="#">Tab</a></li>
                                            <li><a href="#">Watch</a></li>
                                            <li><a href="#">Head Phone</a></li>
                                            <li><a href="#">Memory</a></li>
                                        </ul>
                                    </li>
                                    <li class="closed"><a href="#">Accessories</a>
                                        <ul>
                                            <li><a href="#">Footwear</a></li>
                                            <li><a href="#">Sunglasses</a></li>
                                            <li><a href="#">Watches</a></li>
                                            <li><a href="#">Utilities</a></li>
                                        </ul>
                                    </li>
                                    <li class="closed"><a href="#">Top Brands</a>
                                        <ul>
                                            <li><a href="#">Mobile</a></li>
                                            <li><a href="#">Tab</a></li>
                                            <li><a href="#">Watch</a></li>
                                            <li><a href="#">Head Phone</a></li>
                                            <li><a href="#">Memory</a></li>
                                        </ul>
                                    </li>
                                    <li class="closed"><a href="#">Jewelry</a>
                                        <ul>
                                            <li><a href="#">Footwear</a></li>
                                            <li><a href="#">Sunglasses</a></li>
                                            <li><a href="#">Watches</a></li>
                                            <li><a href="#">Utilities</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </aside>
                        <!-- shop-filter -->
                        <aside class="widget shop-filter box-shadow mb-30">
                            <h6 class="widget-title border-left mb-20">Price</h6>
                            <form action="{{ route('shop.index') }}" method="GET">
                                <div class="price_filter">
                                    <div class="price_slider_amount">
                                        <input type="submit" value="You range :" />
                                        <input type="text" id="amount" name="price"
                                            placeholder="Add Your Price" />
                                    </div>
                                    <div id="slider-range"></div>
                                </div>
                            </form>
                        </aside>
                        <!-- widget-color -->
                        <aside class="widget widget-color box-shadow mb-30">
                            <h6 class="widget-title border-left mb-20">Color</h6>
                            <ul>
                                <li class="color-1"><a href="#">LightSalmon</a></li>
                                <li class="color-2"><a href="#">Dark Salmon</a></li>
                                <li class="color-3"><a href="#">Tomato</a></li>
                                <li class="color-4"><a href="#">Deep Sky Blue</a></li>
                                <li class="color-5"><a href="#">Electric Purple</a></li>
                                <li class="color-6"><a href="#">Atlantis</a></li>
                            </ul>
                        </aside>
                        <!-- operating-system -->
                        <aside class="widget operating-system box-shadow mb-30">
                            <h6 class="widget-title border-left mb-20">Operating System</h6>
                            <form action="{{ route('shop.index') }}" method="GET">
                                <label><input type="checkbox" name="category[]" value="windows"> Windows</label>
                                <label><input type="checkbox" name="category[]" value="mac"> Mac</label>
                                <label><input type="checkbox" name="category[]" value="linux"> Linux</label>
                                <label><input type="checkbox" name="category[]" value="android"> Android</label>
                                <label><input type="checkbox" name="category[]" value="ios"> iOS</label>
                                <button type="submit">Apply Filters</button>
                            </form>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
        <!-- SHOP SECTION END -->
    </div>
@endsection
