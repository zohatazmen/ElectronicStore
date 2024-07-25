@extends('frontend.layouts.main')
@section('title', 'Conatct')
@section('main-container')
    <!-- BREADCRUMBS SETCTION START -->
    <div class="breadcrumbs-section plr-200 mb-80 section">
        <div class="breadcrumbs overlay-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumbs-inner">
                            <h1 class="breadcrumbs-title">Contact</h1>
                            <ul class="breadcrumb-list">
                                <li><a href="index.html">Home</a></li>
                                <li>Contact</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMBS SETCTION END -->

    <!-- Start page content -->
    <section id="page-content" class="page-wrapper section">

        <!-- ADDRESS SECTION START -->
        <div class="address-section mb-80">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="contact-address box-shadow">
                            <i class="zmdi zmdi-pin"></i>
                            <h6>Sahiwal, Pakistan</h6>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-address box-shadow">
                            <i class="zmdi zmdi-phone"></i>
                            <h6><a href="tel:0123456789">0123456789</a></h6>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-address box-shadow">
                            <i class="zmdi zmdi-email"></i>
                            <h6>zohatech@gmail.com</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ADDRESS SECTION END -->

        <!-- GOOGLE MAP SECTION START -->
        <div class="google-map-section">
            <div class="container-fluid">
                <div class="google-map plr-185">
                    <div id="googleMap" style="position:relative; overflow:hidden; padding-bottom:56.25%; height:0;">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d109823.37708206289!2d73.0947367!3d30.662676649999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3922b62cd8405a6d%3A0x6cce79c0f78cbfb7!2sSahiwal%2C%20Sahiwal%20District%2C%20Punjab!5e0!3m2!1sen!2s!4v1721327015439!5m2!1sen!2s"
                            width="100%" height="100%" style="position:absolute; top:0; left:0; border:0;"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <!-- GOOGLE MAP SECTION END -->


        <!-- MESSAGE BOX SECTION START -->
        <div class="message-box-section mt--50 mb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="message-box box-shadow white-bg">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-block p-4 border-left-warning"
                                    style="background-color:#EC8E22; opacity:1">
                                    <strong>
                                        <h1 style="color:#ffffff">{{ $message }}</h1>
                                    </strong>
                                </div>
                            @endif
                            <form id="contact-form" method="POST" action="#">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4 class="blog-section-title border-left mb-30">get in touch</h4>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="name" placeholder="Your name here">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">
                                                {{ $errors->first('name') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="email" placeholder="Your email here">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">
                                                {{ $errors->first('email') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="subject" placeholder="Subject here">
                                        @if ($errors->has('subject'))
                                            <span class="text-danger">
                                                {{ $errors->first('subject') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="phone" placeholder="Your phone here">
                                        @if ($errors->has('phone'))
                                            <span class="text-danger">
                                                {{ $errors->first('phone') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea class="custom-textarea" name="message" placeholder="Message here">
                                        </textarea>
                                        <button class="submit-btn-1 mt-30 btn-hover-1" type="submit">submit
                                            message</button>
                                    </div>
                                </div>
                                <p class="form-message"></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- MESSAGE BOX SECTION END -->
    </section>
    <!-- End page content -->

@endsection
