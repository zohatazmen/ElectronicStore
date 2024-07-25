<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Your description here" />
    <meta name="author" content="Your name or company" />
    <title>Dashboard - ZohaTech ElectronicStore ADMIN</title>
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


    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ url('backend/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand -->
        <a class="navbar-brand ps-3" href="{{ url('/') }}">
            <img src="{{ asset('frontend/images/logow.svg') }}" alt="Tech Logo" style="height: 150px; width: auto;">
        </a>

        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" action="#">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>


    </nav>
    <div id="layoutSidenav">
        @include('backend.layouts.sidebar')

        <div id="layoutSidenav_content">
            @yield('content')

            <footer class="py-4 bg-light mt-auto border-top">
                <div class="container-fluid px-4">
                    <div class="row align-items-center justify-content-between small">
                        <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
                            <p class="mb-0">
                                &copy; {{ date('Y') }} ZohaTech Electronic Shop. All rights reserved.
                            </p>
                        </div>
                        <div class="col-md-6 text-center text-md-right">
                            <p class="mb-0">
                                Developed by <a href="mailto:zohatazmen@example.com" class="text-primary">Zoha
                                    Tazmen</a>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>

        </div>
    </div>
    <script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js') }}"
        crossorigin="anonymous"></script>
    <script src="{{ url('backend/js/scripts.js') }}"></script>
    <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js') }}" crossorigin="anonymous">
    </script>
    <script src="{{ url('backend/assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ url('backend/assets/demo/chart-bar-demo.js') }}"></script>
    <script src="{{ url('https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js') }}"
        crossorigin="anonymous"></script>
    <script src="{{ url('backend/js/datatables-simple-demo.js') }}"></script>

    @yield('customJs')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Ensure jQuery is available before initializing PushMenu
            if (typeof $ !== 'undefined') {
                $('[data-widget="pushmenu"]').PushMenu({
                    screenCollapseSize: 767,
                    autoCollapseSize: 992,
                    enableRemember: true,
                    noTransitionAfterReload: true
                });
            }
        });
    </script>

    <!-- Javascript -->
    <script src="{{ url('backend/js/jquery.min.js') }}"></script>
    <script src="{{ url('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('backend/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ url('backend/js/zoom.js') }}"></script>
    <script src="{{ url('backend/js/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ url('backend/js/switcher.js') }}"></script>
    <script src="{{ url('backend/js/theme-settings.js') }}"></script>
    <script src="{{ url('backend/js/main.js') }}"></script>

</body>

</html>
