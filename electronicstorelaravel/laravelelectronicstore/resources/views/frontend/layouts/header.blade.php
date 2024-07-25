<!doctype html>
<html class="no-js" lang="en">



<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title') | ZohaTech Electronic Store</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('frontend/images/techlogo.svg') }}">

    <!-- All CSS Files -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="{{ url('frontend/css/bootstrap.min.css') }}">
    <!-- Nivo-slider css -->
    <link rel="stylesheet" href="{{ url('frontend/lib/css/nivo-slider.css') }}">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="{{ url('frontend/css/core.css') }}">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="{{ url('frontend/css/shortcode/shortcodes.css') }}">
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{ url('frontend/style.css') }}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ url('frontend/css/responsive.css') }}">
    <!-- User style -->
    <link rel="stylesheet" href="{{ url('frontend/css/custom.css') }}">

    <!-- Style customizer (Remove these two lines please) -->
    <link rel="stylesheet" href="{{ url('frontend/css/style-customizer.css') }}">
    <link href="#" data-style="styles" rel="stylesheet">

    <!-- Modernizr JS -->
    <script src="{{ url('frontend/js/vendor/modernizr-3.11.2.min.js') }}"></script>
</head>

<body>

    <div class="wrapper">

        <!-- START HEADER AREA -->
        <header class="header-area header-wrapper">
            <!-- header-top-bar -->
            <div class="header-top-bar plr-185">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 d-none d-md-block">
                            <div class="call-us">
                                <p class="mb-0 roboto">03077936306</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="top-link clearfix">
                                <ul class="link f-right">
                                    <li>
                                        <a href="My-account">
                                            <i class="zmdi zmdi-account"></i>
                                            My Account
                                        </a>
                                    </li>
                                    <li>
                                        <a href="wishlist">
                                            <i class="zmdi zmdi-favorite"></i>
                                            Wish List
                                        </a>
                                    </li>
                                    <li>
                                        <a href="login">
                                            <i class="zmdi zmdi-lock"></i>
                                            Login
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-middle-area -->
            <div id="sticky-header" class="header-middle-area plr-185">
                <div class="container-fluid">
                    <div class="full-width-mega-dropdown">
                        <div class="row">
                            <!-- logo -->
                            <div class="col-lg-2 col-md-4">
                                <div class="logo">
                                    <a href="{{ route('dashboard') }}">
                                        <img src="frontend/images/techlogoooo.svg" alt="main logo"
                                            style="min-height: 60px;  width: auto;">
                                    </a>
                                </div>
                            </div>


                            <!-- primary-menu -->
                            <div class="col-lg-8 d-none d-lg-block">
                                <nav id="primary-menu">
                                    <ul class="main-menu text-center">
                                        <li><a href="{{ route('dashboard') }}">Home</a>

                                        </li>

                                        <li>
                                            <a href="shop">Shop</a>
                                        </li>

                                        <li>
                                            <a href="My-account">Account</a>
                                        </li>

                                        <li><a href="blog">Blog</a>

                                        </li>
                                        <li>
                                            <a href="about">About us</a>
                                        </li>
                                        <li>
                                            <a href="contact">Contact</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- header-search & total-cart -->
                            <div class="col-lg-2 col-md-8">
                                <div class="search-top-cart  f-right">
                                    <!-- header-search -->
                                    <div class="header-search f-left">
                                        <div class="header-search-inner">
                                            <button class="search-toggle">
                                                <i class="zmdi zmdi-search"></i>
                                            </button>
                                            <form action="#">
                                                <div class="top-search-box">
                                                    <input type="text" placeholder="Search here your product...">
                                                    <button type="submit">
                                                        <i class="zmdi zmdi-search"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- total-cart -->
                                    <div class="total-cart f-left">
                                        <div class="total-cart-in">
                                            <div class="cart-toggler">
                                                <a href="#">
                                                    <span
                                                        class="cart-quantity">{{ count(session('cart', [])) }}</span><br>
                                                    <span class="cart-icon">
                                                        <i class="zmdi zmdi-shopping-cart-plus"></i>
                                                    </span>
                                                </a>
                                            </div>
                                            <ul>
                                                @foreach (session('cart', []) as $itemId => $item)
                                                    <li>
                                                        <div class="total-cart-pro">
                                                            <a href="{{ route('shop.show', $itemId) }}">
                                                                <img src="{{ asset($item['image']) }}"
                                                                    alt="{{ $item['name'] }}" width="50">
                                                                <span class="cart-item-name">{{ $item['name'] }}</span>
                                                                <span
                                                                    class="cart-item-quantity">{{ $item['quantity'] }}</span>
                                                            </a>
                                                        </div>
                                                    </li>
                                                @endforeach
                                                <li>
                                                    <div class="top-cart-inner view-cart">
                                                        <h4 class="text-uppercase">
                                                            <a href="{{ route('cart.index') }}">View cart</a>
                                                        </h4>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- END HEADER AREA -->

        <!-- START MOBILE MENU AREA -->
        <div class="mobile-menu-area d-block d-lg-none section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mobile-menu">
                            <nav id="dropdown">
                                <ul>
                                    <li><a href="{{ route('dashboard') }}">Home</a>

                                    </li>
                                    <li>
                                        <a href="shop">Products</a>
                                    </li>
                                    <li><a href="shop">Shop</a>
                                        <ul>
                                            <li>
                                                <a href="shop">Shop</a>
                                            </li>


                                            <li>
                                                <a href="cart">Shopping Cart</a>
                                            </li>
                                            <li>
                                                <a href="wishlist">Wishlist</a>
                                            </li>
                                            <li>
                                                <a href="checkout">Checkout</a>
                                            </li>
                                            <li>
                                                <a href="order">Order</a>
                                            </li>
                                            <li>
                                                <a href="login">Login</a>
                                            </li>
                                            <li>
                                                <a href="my-account-2">My Account</a>
                                            </li>
                                            <li>
                                                <a href="about">About us</a>
                                            </li>

                                        </ul>
                                    </li>
                                    <li><a href="blog">Blog</a>

                                    </li>
                                    <li>
                                        <a href="about">About Us</a>
                                    </li>
                                    <li>
                                        <a href="contact">Contact</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MOBILE MENU AREA -->
