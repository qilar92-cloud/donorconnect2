<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="utf-8">

    <meta
        http-equiv="X-UA-Compatible"
        content="IE=edge"
    >

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <meta
        name="description"
        content="DONORCONNECT - Aplikasi Donor Darah"
    >

    <meta
        name="author"
        content="DonorConnect"
    >

    <title>
        @yield('title', 'DONORCONNECT')
    </title>


    <!-- Font Awesome -->
    <link
        href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}"
        rel="stylesheet"
    >


    <!-- Google Font: Nunito -->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900"
        rel="stylesheet"
    >


    <!-- SB Admin 2 -->
    <link
        href="{{ asset('css/sb-admin-2.min.css') }}"
        rel="stylesheet"
    >


    <!-- CSS Layout -->
    @vite('resources/css/layouts/app-layout.css')


    <!-- CSS Halaman -->
    @stack('styles')

</head>


<body id="page-top">

    <div id="wrapper">

        <!-- Sidebar -->
        @include('layouts.inc.sidebar')


        <!-- Overlay Sidebar -->
        <div
            class="sidebar-overlay"
            id="sidebarOverlay"
        ></div>


        <!-- Content Wrapper -->
        <div
            id="content-wrapper"
            class="d-flex flex-column"
        >

            <div id="content">

                <!-- Navbar -->
                @include('layouts.inc.navbar')


                <!-- Main Content -->
                <main class="container-fluid">

                    @yield('content')

                </main>

            </div>


            <!-- Footer -->
            @include('layouts.inc.footer')

        </div>

    </div>


    <!-- Scroll to Top -->
    <a
        class="scroll-to-top rounded"
        href="#page-top"
    >
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- jQuery -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>


    <!-- Bootstrap -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


    <!-- jQuery Easing -->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>


    <!-- SB Admin 2 -->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>


    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Success Alert -->
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


    <!-- Error Alert -->
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


    <!-- Mobile Sidebar -->
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


    <!-- Script Halaman -->
    @stack('scripts')

</body>

</html>