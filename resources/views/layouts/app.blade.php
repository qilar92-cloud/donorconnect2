<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <meta name="description"
          content="DONORCONNECT - Aplikasi Donor Darah">

    <meta name="author"
          content="DonorConnect">

    <title>@yield('title', 'DonorConnect')</title>


    <!-- Font Awesome -->
    <link
        href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}"
        rel="stylesheet"
    >

    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900"
        rel="stylesheet"
    >

    <!-- SB Admin 2 -->
    <link
        href="{{ asset('css/sb-admin-2.min.css') }}"
        rel="stylesheet"
    >


    <style>

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            min-height: 100%;
            background: #fff7f5 !important;
        }

        body {
            font-family: 'Nunito', sans-serif;
            color: #302e38;
            overflow-x: hidden;
        }


        /* Wrapper */

        #wrapper {
            min-height: 100vh;
            background: #fff7f5 !important;
        }


        /* Content */

        #content-wrapper {
            min-height: 100vh;
            background: #fff7f5 !important;
            margin-left: 230px;
        }

        #content {
            min-height: calc(100vh - 75px);
            background: #fff7f5 !important;
            width: 100%;
        }

        main.container-fluid {
            width: 100%;
            max-width: 100%;
            margin: 0;
            padding: 25px 30px 35px;
            background: #fff7f5 !important;
        }


        /* Sidebar */

        .sidebar {
            position: fixed !important;
            top: 0;
            left: 0;
            width: 230px !important;
            min-width: 230px !important;
            height: 100vh;
            z-index: 2000;

            background: linear-gradient(
                180deg,
                #e51f3b 0%,
                #d91e36 55%,
                #c91830 100%
            ) !important;

            overflow-y: auto;
            overflow-x: hidden;

            transition: transform 0.3s ease;
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
            color: rgba(255, 255, 255, 0.9);
            font-size: 13px;
            font-weight: 600;
            border-radius: 8px;
            margin: 3px 10px;
            padding: 12px 14px;
            transition: all 0.2s ease;
        }

        .sidebar .nav-item .nav-link i {
            color: rgba(255, 255, 255, 0.95);
        }

        .sidebar .nav-item .nav-link:hover {
            background: rgba(255, 255, 255, 0.12);
            color: #ffffff;
        }

        .sidebar .nav-item.active .nav-link {
            background: #ffffff;
            color: #d91e36;

            box-shadow:
                0 3px 10px rgba(0, 0, 0, 0.08);
        }

        .sidebar .nav-item.active .nav-link i {
            color: #d91e36;
        }

        .sidebar hr.sidebar-divider {
            border-top: 1px solid rgba(255, 255, 255, 0.18);
        }


        /* Navbar */

        .topbar {
            position: relative;
            z-index: 1000;

            width: 100%;
            min-height: 75px;
            height: 75px;

            background: #ffffff !important;

            border-bottom: 1px solid #f4dfe1;

            box-shadow:
                0 3px 12px rgba(217, 30, 54, 0.04) !important;

            overflow: visible !important;
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


        /* Dropdown */

        .dropdown-menu {
            border: 1px solid #f3dfe1;
            border-radius: 10px;
            z-index: 3000;
        }

        .dropdown-item {
            font-size: 12px;
        }

        .dropdown-item:hover {
            background: #fff0f1;
            color: #d91e36;
        }


        /* Mobile button */

        .mobile-sidebar-btn {
            display: none;
            border: none;
            outline: none;
            background: #fff0f3;
            color: #c91830;

            width: 46px;
            height: 46px;

            border-radius: 14px;

            align-items: center;
            justify-content: center;

            font-size: 20px;
            cursor: pointer;
        }


        /* Overlay */

        .sidebar-overlay {
            display: none;

            position: fixed;
            inset: 0;

            background: rgba(0, 0, 0, 0.35);

            z-index: 1900;
        }

        .sidebar-overlay.show {
            display: block;
        }


        /* Footer */

        footer.sticky-footer {
            background: #fff7f5 !important;
            border-top: 1px solid #f3dfe1;
        }


        /* Scroll top */

        .scroll-to-top {
            background: #e51f3b !important;
            z-index: 1500;
        }

        .scroll-to-top:hover {
            background: #c91830 !important;
        }


        /* Tablet */

        @media (max-width: 991px) {

            #content-wrapper {
                margin-left: 0 !important;
            }

            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.mobile-open {
                transform: translateX(0);
            }

            .mobile-sidebar-btn {
                display: flex !important;
            }

            main.container-fluid {
                padding: 22px 20px 30px;
            }

        }


        /* HP */

        @media (max-width: 768px) {

            #wrapper {
                width: 100%;
                min-width: 0;
            }

            #content-wrapper {
                width: 100%;
                min-width: 0;
                margin-left: 0 !important;
            }

            #content {
                width: 100%;
                min-width: 0;
                min-height: calc(100vh - 64px);
                overflow-x: hidden;
            }

            .topbar {
                width: 100%;
                min-height: 64px;
                height: 64px;
                padding-left: 12px;
                padding-right: 12px;
            }

            main.container-fluid {
                width: 100% !important;
                max-width: 100% !important;

                padding: 18px 14px 28px !important;

                overflow-x: hidden;
            }

            .container-fluid {
                width: 100%;
                max-width: 100%;
            }

            .row {
                margin-left: 0 !important;
                margin-right: 0 !important;
            }

            [class*="col-"] {
                max-width: 100%;
            }

            .sidebar {
                width: 270px !important;
                min-width: 270px !important;
                max-width: 270px !important;
            }

            .sidebar .nav-item .nav-link {
                font-size: 14px;
                padding: 13px 15px;
            }

            .scroll-to-top {
                display: none !important;
            }

        }


        /* HP kecil */

        @media (max-width: 480px) {

            .topbar {
                min-height: 60px;
                height: 60px;
                padding-left: 10px;
                padding-right: 10px;
            }

            main.container-fluid {
                padding: 15px 11px 25px !important;
            }

            .mobile-sidebar-btn {
                width: 43px;
                height: 43px;
                border-radius: 12px;
                font-size: 18px;
            }

            .sidebar {
                width: 255px !important;
                min-width: 255px !important;
                max-width: 255px !important;
            }

        }


        /* Hindari overflow */

        img {
            max-width: 100%;
            height: auto;
        }

        table {
            max-width: 100%;
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

    </style>


    @stack('styles')

</head>


<body id="page-top">

<div id="wrapper">


    <!-- Sidebar -->

    @include('layouts.inc.sidebar')


    <!-- Overlay -->

    <div
        class="sidebar-overlay"
        id="sidebarOverlay">
    </div>


    <!-- Content -->

    <div
        id="content-wrapper"
        class="d-flex flex-column">


        <div id="content">


            <!-- Navbar -->

            @include('layouts.inc.navbar')


            <!-- Main -->

            <main class="container-fluid">

                @yield('content')

            </main>


        </div>


        <!-- Footer -->

        @include('layouts.inc.footer')


    </div>

</div>


<!-- Scroll top -->

<a
    class="scroll-to-top rounded"
    href="#page-top">

    <i class="fas fa-angle-up"></i>

</a>


<!-- JQuery -->

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>


<!-- Bootstrap -->

<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


<!-- JQuery Easing -->

<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>


<!-- SB Admin -->

<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>


<!-- Sweet Alert -->

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


<script>

document.addEventListener('DOMContentLoaded', function () {

    const sidebar = document.querySelector('.sidebar');
    const overlay = document.getElementById('sidebarOverlay');

    const toggle =
        document.querySelector('.mobile-sidebar-btn') ||
        document.getElementById('sidebarToggle') ||
        document.getElementById('sidebarToggleTop');

    if (!sidebar) {
        return;
    }

    function openSidebar() {

        sidebar.classList.add('mobile-open');

        if (overlay) {
            overlay.classList.add('show');
        }

        document.body.style.overflow = 'hidden';
    }

    function closeSidebar() {

        sidebar.classList.remove('mobile-open');

        if (overlay) {
            overlay.classList.remove('show');
        }

        document.body.style.overflow = '';
    }

    if (toggle) {

        toggle.addEventListener('click', function (event) {

            event.preventDefault();

            if (sidebar.classList.contains('mobile-open')) {
                closeSidebar();
            } else {
                openSidebar();
            }

        });

    }

    if (overlay) {

        overlay.addEventListener('click', function () {

            closeSidebar();

        });

    }

    sidebar.querySelectorAll('a').forEach(function (link) {

        link.addEventListener('click', function () {

            if (window.innerWidth <= 991) {
                closeSidebar();
            }

        });

    });

    window.addEventListener('resize', function () {

        if (window.innerWidth > 991) {
            closeSidebar();
        }

    });

});

</script>


@stack('scripts')


</body>

</html>