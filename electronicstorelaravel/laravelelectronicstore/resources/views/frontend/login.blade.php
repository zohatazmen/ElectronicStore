@extends('frontend.layouts.main')
@section('title', 'Login')
@section('main-container')
    <!-- BREADCRUMBS SETCTION START -->
    <div class="breadcrumbs-section plr-200 mb-80 section">
        <div class="breadcrumbs overlay-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumbs-inner">
                            <h1 class="breadcrumbs-title">Login / Register</h1>
                            <ul class="breadcrumb-list">
                                <li><a href="index.html">Home</a></li>
                                <li>Login / Register</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMBS SETCTION END -->

    <!-- Start page content -->
    <div id="page-content" class="page-wrapper section">

        <!-- LOGIN SECTION START -->
        <div class="login-section mb-80">
            <div class="container">
                <div class="row">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="col-lg-6">
                        <div class="registered-customers">
                            <h6 class="widget-title border-left mb-50">REGISTERED CUSTOMERS</h6>
                            <form method="post" action="{{ route('login') }}">
                                @csrf
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="login-account p-30 box-shadow">
                                    <p>If you have an account with us, Please log in.</p>
                                    <input type="text" name="email" placeholder="Email Address" required>
                                    <input type="password" name="password" placeholder="Password" required>
                                    <br>
                                    <button class="submit-btn-1 btn-hover-1" type="submit">login</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- new-customers -->
                    <div class="col-lg-6">
                        <div class="new-customers">
                            <form method="post" action="{{ route('register') }}">
                                @csrf
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <h6 class="widget-title border-left mb-50">NEW CUSTOMERS</h6>
                                <div class="login-account p-30 box-shadow">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input type="text" name="name" placeholder="Full Name" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <select class="custom-select" name="country">
                                                <option value="default">Country</option>
                                                <option value="Pakistan">Pakistan</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <select class="custom-select" name="state">
                                                <option value="default">State</option>
                                                <option value="Punjab">Punjab</option>
                                                <option value="Sindh">Sindh</option>
                                                <option value="Khyber Pakhtunkhwa">Khyber Pakhtunkhwa</option>
                                                <option value="Balochistan">Balochistan</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <select class="custom-select" name="city">
                                                <option value="default">Town/City</option>
                                                <option value="Sahiwal">Sahiwal</option>
                                                <option value="Lahore">Lahore</option>
                                                <option value="Okara">Okara</option>
                                                <option value="Islamabad">Islamabad</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" name="phone" placeholder="Phone here...">
                                        </div>
                                    </div>
                                    <input type="text" name="company" placeholder="Company name here...">
                                    <input type="email" name="email" placeholder="Email address here..." required>
                                    <input type="password" name="password" placeholder="Password" required>
                                    <input type="password" name="password_confirmation" placeholder="Confirm Password"
                                        required>
                                    <div class="checkbox">
                                        <label class="mr-10">
                                            <small>
                                                <input type="checkbox" name="newsletter">Sign up for our newsletter!
                                            </small>
                                        </label>
                                        <label>
                                            <small>
                                                <input type="checkbox" name="special_offers">Receive special offers from our
                                                partners!
                                            </small>
                                        </label>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button class="submit-btn-1 mt-20 btn-hover-1" type="submit"
                                                value="register">Register</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button class="submit-btn-1 mt-20 btn-hover-1 f-right"
                                                type="reset">Clear</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- LOGIN SECTION END -->

    </div>
    <!-- End page content -->

@endsection
