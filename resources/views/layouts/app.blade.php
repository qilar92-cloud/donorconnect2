<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description"
          content="DONORCONNECT - Aplikasi Donor Darah">

    <meta name="author"
          content="DonorConnect">

    <title>@yield('title', 'DonorConnect')</title>


    <!-- FONT AWESOME -->
    <link
        href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}"
        rel="stylesheet"
        type="text/css"
    >


    <!-- GOOGLE FONT -->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900"
        rel="stylesheet"
    >


    <!-- SB ADMIN -->
    <link
        href="{{ asset('css/sb-admin-2.min.css') }}"
        rel="stylesheet"
    >


    <!-- CUSTOM DONORCONNECT -->
    <style>

        html,
        body {
            background: #fff7f5 !important;
        }

        body {
            font-family: 'Nunito', sans-serif;
            color: #302e38;
        }


        /* CONTENT */

        #content-wrapper {
            background: #fff7f5 !important;
        }

        #content {
            background: #fff7f5 !important;
        }

        .container-fluid {
            padding-top: 20px;
        }


        /* SIDEBAR */

        .sidebar {
            background: linear-gradient(
                180deg,
                #e51f3b 0%,
                #d91e36 55%,
                #c91830 100%
            ) !important;
        }

        .sidebar .sidebar-brand {
            height: 80px;
        }

        .sidebar .sidebar-brand-text {
            font-size: 16px;
            font-weight: 800;
        }

        .sidebar .sidebar-brand-icon {
            color: #ffffff;
        }

        .sidebar .nav-item .nav-link {
            color: rgba(255,255,255,0.88);
            font-size: 12px;
            font-weight: 600;
            border-radius: 8px;
            margin: 3px 10px;
            padding: 12px 14px;
        }

        .sidebar .nav-item .nav-link i {
            color: rgba(255,255,255,0.95);
        }

        .sidebar .nav-item .nav-link:hover {
            background: rgba(255,255,255,0.12);
            color: #ffffff;
        }

        .sidebar .nav-item.active .nav-link {
            background: #ffffff;
            color: #d91e36;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
        }

        .sidebar .nav-item.active .nav-link i {
            color: #d91e36;
        }

        .sidebar hr.sidebar-divider {
            border-top: 1px solid rgba(255,255,255,0.18);
        }


        /* TOPBAR */

        .topbar {
            background: #ffffff !important;
            border-bottom: 1px solid #f4dfe1;
            box-shadow: 0 3px 12px rgba(217,30,54,0.04) !important;
            height: 75px;
        }

        .topbar .nav-link {
            color: #4a4649 !important;
        }

        .topbar .img-profile {
            width: 35px;
            height: 35px;
            background: #fff0f1;
            padding: 7px;
        }


        /* DROPDOWN */

        .dropdown-menu {
            border: 1px solid #f3dfe1;
            border-radius: 10px;
        }

        .dropdown-item {
            font-size: 12px;
        }

        .dropdown-item:hover {
            background: #fff0f1;
            color: #d91e36;
        }


        /* SCROLL TOP */

        .scroll-to-top {
            background: #e51f3b !important;
        }

        .scroll-to-top:hover {
            background: #c91830 !important;
        }


        /* MOBILE */

        @media (max-width: 768px) {

            .container-fluid {
                padding-left: 15px;
                padding-right: 15px;
            }

        }

    </style>

    @stack('styles')

</head>


<body id="page-top">

<div id="wrapper">


    <!-- SIDEBAR -->
    @include('layouts.inc.sidebar')


    <div id="content-wrapper"
         class="d-flex flex-column">


        <div id="content">


            <!-- NAVBAR -->
            @include('layouts.inc.navbar')


            <!-- MAIN CONTENT -->
            <div class="container-fluid">

                @yield('content')

            </div>


        </div>


        <!-- FOOTER -->
        @include('layouts.inc.footer')


    </div>

</div>


<!-- SCROLL TO TOP -->

<a class="scroll-to-top rounded"
   href="#page-top">

    <i class="fas fa-angle-up"></i>

</a>


<!-- JQUERY -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>


<!-- BOOTSTRAP -->
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


<!-- JQUERY EASING -->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>


<!-- SB ADMIN -->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>


<!-- SWEET ALERT -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@if (session('success'))

<script>

    Swal.fire({

        title: 'Berhasil!',

        text: @json(session('success')),

        icon: 'success',

        confirmButtonColor: '#e51f3b',

        timer: 2500,

        timerProgressBar: true

    });

</script>

@endif


@if (session('error'))

<script>

    Swal.fire({

        title: 'Gagal!',

        text: @json(session('error')),

        icon: 'error',

        confirmButtonColor: '#d91e36'

    });

</script>

@endif


@stack('scripts')


</body>

</html>