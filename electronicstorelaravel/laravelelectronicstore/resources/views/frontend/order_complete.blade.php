@extends('frontend.layouts.main')
@section('title', 'Order Complete')
@section('main-container')

    <!-- BREADCRUMBS SECTION START -->
    <div class="breadcrumbs-section plr-200 mb-80 section">
        <div class="breadcrumbs overlay-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumbs-inner">
                            <h1 class="breadcrumbs-title">Order Complete</h1>
                            <ul class="breadcrumb-list">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>Order Complete</li>
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
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="order-complete-content text-center">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <p>Your order has been placed successfully. We will send a confirmation email to you soon.</p>
                        <a href="{{ url('/') }}" class="btn btn-primary">Return to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End page content -->

@endsection
