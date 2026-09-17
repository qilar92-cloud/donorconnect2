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
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    >

    <meta
        name="description"
        content=""
    >

    <meta
        name="author"
        content=""
    >

    <title>@yield('title', 'DONORCONNECT')</title>


    <!-- Font Awesome -->
    <link
        href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}"
        rel="stylesheet"
        type="text/css"
    >


    <!-- Nunito -->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,500,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet"
    >


    <!-- SB Admin 2 -->
    <link
        href="{{ asset('css/sb-admin-2.min.css') }}"
        rel="stylesheet"
    >


    <!-- CSS halaman -->
    @stack('styles')

</head>


<body>

    @yield('content')


    <!-- jQuery -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>


    <!-- Bootstrap -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


    <!-- jQuery Easing -->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>


    <!-- SB Admin 2 -->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>


    <!-- JavaScript halaman -->
    @stack('scripts')

</body>

</html>