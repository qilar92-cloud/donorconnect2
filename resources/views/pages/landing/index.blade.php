<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        DonorConnect - Halaman Utama
    </title>

    @vite('resources/css/landing/index.css')

</head>


<body>

    <div class="page">

        {{-- Background --}}

        <div class="circle one"></div>
        <div class="circle two"></div>
        <div class="circle three"></div>

        <div class="heart h1">♥</div>
        <div class="heart h2">♥</div>
        <div class="heart h3">♥</div>
        <div class="heart h4">♥</div>


        {{-- Navbar --}}

        <nav class="navbar">

            <a
                href="{{ url('/') }}"
                class="brand"
            >

                <span class="brand-icon">
                    +
                </span>

                DONORCONNECT

            </a>

        </nav>


        {{-- Hero --}}

        <main class="hero">

            <div class="hero-container">

                {{-- Ilustrasi --}}

                <section class="hero-image">

                    <div class="illustration-background"></div>


                    <div class="heart-decoration one">
                        ♥
                    </div>

                    <div class="heart-decoration two">
                        ♥
                    </div>

                    <div class="heart-decoration three">
                        ♥
                    </div>


                    <div class="person">

                        <div class="bow">

                            <span class="bow-left"></span>
                            <span class="bow-right"></span>
                            <span class="bow-center"></span>

                        </div>


                        <div class="hair"></div>

                        <div class="person-head"></div>

                        <div class="eye-person left"></div>
                        <div class="eye-person right"></div>

                        <div class="mouth-person"></div>

                        <div class="body"></div>

                        <div class="collar"></div>

                        <div class="medical-cross">
                            +
                        </div>

                        <div class="arm left"></div>
                        <div class="arm right"></div>

                    </div>


                    <div class="blood-mascot">

                        <div class="blood-drop">

                            <span class="eye left"></span>
                            <span class="eye right"></span>

                            <span class="smile"></span>

                        </div>

                        <div class="shield">
                            +
                        </div>

                    </div>

                </section>


                {{-- Konten --}}

                <section class="hero-content">

                    <div class="drop-logo"></div>

                    <div class="subtitle">
                        Aplikasi Donor Darah
                    </div>

                    <h1 class="main-title">
                        Selamat Datang di<br>
                        DONORCONNECT
                    </h1>

                    <p class="tagline">
                        Donor darah, selamatkan nyawa.
                    </p>

                    <p class="description">
                        Setetes darah Anda, berarti bagi mereka yang membutuhkan.
                        Mari bersama membantu sesama melalui DonorConnect.
                    </p>


                    <div class="buttons">

                        <a
                            href="{{ route('login') }}"
                            class="btn btn-login"
                        >

                            <span class="btn-icon">
                                ⇥
                            </span>

                            LOGIN

                        </a>


                        <a
                            href="{{ route('register') }}"
                            class="btn btn-register"
                        >

                            <span class="btn-icon">
                                ♟
                            </span>

                            REGISTRASI

                        </a>

                    </div>

                </section>

            </div>

        </main>


        {{-- Footer --}}

        <footer class="footer">

            © {{ date('Y') }} DonorConnect —
            Aplikasi Donor Darah PMR Sekolah

        </footer>

    </div>

</body>

</html>