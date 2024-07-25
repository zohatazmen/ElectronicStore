@extends('frontend.layouts.main')
@section('title', 'Account')
@section('main-container')
    <!-- BREADCRUMBS SETCTION START -->
    <div class="breadcrumbs-section plr-200 mb-80 section">
        <div class="breadcrumbs overlay-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumbs-inner">
                            <h1 class="breadcrumbs-title">My Account</h1>
                            <ul class="breadcrumb-list">
                                <li><a href="{{ route('dashboard') }}">Home</a></li>
                                <li>My Account</li>
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
                    <div class="col-lg-8 offset-lg-2">
                        <div class="my-account-content" id="accordion">
                            <!-- My Personal Information -->
                            <div class="card mb-15">
                                <div class="card-header" id="headingOne">
                                    <h4 class="card-title">
                                        <a data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">My Personal Information</a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-bs-parent="#accordion">
                                    <div class="card-body">
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

                                        <form method="post" action="{{ route('account.update') }}">
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
                                            <div class="new-customers">
                                                <div class="p-30">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <input type="text" name="name" value="{{ $user->name }}"
                                                                placeholder="Full Name" required>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <select class="custom-select" name="country">
                                                                <option value="default"
                                                                    {{ $user->country == 'default' ? 'selected' : '' }}>
                                                                    Country</option>
                                                                <option value="Pakistan"
                                                                    {{ $user->country == 'Pakistan' ? 'selected' : '' }}>
                                                                    Pakistan</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <select class="custom-select" name="state">
                                                                <option value="default"
                                                                    {{ $user->state == 'default' ? 'selected' : '' }}>State
                                                                </option>
                                                                <option value="Punjab"
                                                                    {{ $user->state == 'Punjab' ? 'selected' : '' }}>Punjab
                                                                </option>
                                                                <option value="Sindh"
                                                                    {{ $user->state == 'Sindh' ? 'selected' : '' }}>Sindh
                                                                </option>
                                                                <option value="Khyber Pakhtunkhwa"
                                                                    {{ $user->state == 'Khyber Pakhtunkhwa' ? 'selected' : '' }}>
                                                                    Khyber Pakhtunkhwa</option>
                                                                <option value="Balochistan"
                                                                    {{ $user->state == 'Balochistan' ? 'selected' : '' }}>
                                                                    Balochistan</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <select class="custom-select" name="city">
                                                                <option value="default"
                                                                    {{ $user->city == 'default' ? 'selected' : '' }}>
                                                                    Town/City</option>
                                                                <option value="Sahiwal"
                                                                    {{ $user->city == 'Sahiwal' ? 'selected' : '' }}>
                                                                    Sahiwal</option>
                                                                <option value="Lahore"
                                                                    {{ $user->city == 'Lahore' ? 'selected' : '' }}>Lahore
                                                                </option>
                                                                <option value="Okara"
                                                                    {{ $user->city == 'Okara' ? 'selected' : '' }}>Okara
                                                                </option>
                                                                <option value="Islamabad"
                                                                    {{ $user->city == 'Islamabad' ? 'selected' : '' }}>
                                                                    Islamabad</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" name="phone"
                                                                value="{{ $user->phone }}" placeholder="Phone here...">
                                                        </div>
                                                    </div>
                                                    <input type="text" name="company" value="{{ $user->company }}"
                                                        placeholder="Company name here...">
                                                    <input type="email" name="email" value="{{ $user->email }}"
                                                        placeholder="Email address here..." required>
                                                    <input type="password" name="password" placeholder="Password">
                                                    <input type="password" name="password_confirmation"
                                                        placeholder="Confirm Password">
                                                    <div class="checkbox">
                                                        <label class="mr-10">
                                                            <small>
                                                                <input type="checkbox" name="newsletter"
                                                                    {{ $user->newsletter ? 'checked' : '' }}>Sign up for
                                                                our newsletter!
                                                            </small>
                                                        </label>
                                                        <label>
                                                            <small>
                                                                <input type="checkbox" name="special_offers"
                                                                    {{ $user->special_offers ? 'checked' : '' }}>Receive
                                                                special offers from our partners!
                                                            </small>
                                                        </label>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <button class="submit-btn-1 mt-20 btn-hover-1" type="submit"
                                                                value="register">Save</button>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <button class="submit-btn-1 mt-20 btn-hover-1 f-right"
                                                                type="reset">Clear</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End My Personal Information -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- LOGIN SECTION END -->
    </div>
    <!-- End page content -->

@endsection
