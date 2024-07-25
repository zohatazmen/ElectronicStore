<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">

<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title>ZohaTech Electronic Store</title>

    <meta name="author" content="themesflat.com">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="{{ url('backend/css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('backend/css/animation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('backend/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('backend/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('backend/css/style.css') }}">

    <!-- Font -->
    <link rel="stylesheet" href="{{ url('backend/font/fonts.css') }}">

    <!-- Icon -->
    <link rel="stylesheet" href="{{ url('backend/icon/style.css') }}">

    <link rel="shortcut icon" type="image/x-icon" href="{{ url('frontend/images/techlogo.svg') }}">


</head>

<body class="body">

    <!-- #wrapper -->
    <div id="wrapper">
        <!-- #page -->
        <div id="page" class="">
            <div class="wrap-login-page">
                <div class="flex-grow flex flex-column justify-center gap30">
                    <a href="{{ route('dashboard') }}" id="site-logo-inner">
                        <!-- Add your logo here -->
                    </a>
                    <div class="login-box">
                        <div style="text-align: center;">
                            <div style="margin-bottom: 20px;">
                                <a href="">
                                    <img src="{{ url('frontend/images/techlogo.svg') }}" alt="main logo"
                                        style="min-height: 100px; width: auto;">
                                </a>
                            </div>
                            <h3>Login to account</h3>
                            <div class="body-text">Enter your email & password to login</div>
                        </div>

                        <form class="form-login flex flex-column gap24" method="POST"
                            action="{{ route('admin.login') }}">
                            @csrf
                            <fieldset class="email">
                                <div class="body-title mb-10">Email address <span class="tf-color-1">*</span></div>
                                <input class="flex-grow" type="email" placeholder="Enter your email address"
                                    name="email" value="{{ old('email') }}" required autofocus>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                            <fieldset class="password">
                                <div class="body-title mb-10">Password <span class="tf-color-1">*</span></div>
                                <input class="password-input" type="password" placeholder="Enter your password"
                                    name="password" required>
                                <span class="show-pass">
                                    <i class="icon-eye view"></i>
                                    <i class="icon-eye-off hide"></i>
                                </span>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                            <div class="flex justify-between items-center">
                                <div class="flex gap10">
                                    <input class="" type="checkbox" id="signed" name="remember">
                                    <label class="body-text" for="signed">Keep me signed in</label>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-dark w-100">Login</button>
                        </form>
                        <div>

                        </div>

                    </div>
                </div>
                <div class="login-bg"></div>
            </div>
        </div><!-- /#page -->
    </div><!-- /#wrapper -->
    <!-- Javascript -->

    <script src="{{ url('backend/js/jquery.min.js') }}"></script>
    <script src="{{ url('backend/js/tether.min.js') }}"></script>
    <script src="{{ url('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('backend/js/waypoints.min.js') }}"></script>
    <script src="{{ url('backend/js/imagesloaded.min.js') }}"></script>
    <script src="{{ url('backend/js/jquery.isotope.min.js') }}"></script>
    <script src="{{ url('backend/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ url('backend/js/easypiechart.min.js') }}"></script>
    <script src="{{ url('backend/js/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ url('backend/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ url('backend/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ url('backend/js/jquery.scrollme.min.js') }}"></script>
    <script src="{{ url('backend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('backend/js/jquery.pagepiling.min.js') }}"></script>
    <script src="{{ url('backend/js/typed.min.js') }}"></script>
    <script src="{{ url('backend/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ url('backend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ url('backend/js/jquery.hoverdir.js') }}"></script>
    <script src="{{ url('backend/js/popup.js') }}"></script>
    <script src="{{ url('backend/js/main.js') }}"></script>

</body>

</html>
