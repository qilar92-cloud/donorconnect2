<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DonorConnect - Halaman Utama</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #fff7f8 0%, #ffe9ed 50%, #fff 100%);
            overflow-x: hidden;
            color: #333;
        }

        /* =========================
           BACKGROUND DECORATION
        ========================== */

        .page {
            min-height: 100vh;
            position: relative;
            overflow: hidden;
        }

        .circle {
            position: absolute;
            border-radius: 50%;
            opacity: 0.55;
            z-index: 0;
        }

        .circle.one {
            width: 420px;
            height: 420px;
            background: #ffd6de;
            top: -180px;
            left: -130px;
        }

        .circle.two {
            width: 350px;
            height: 350px;
            background: #ffe5ea;
            right: -150px;
            bottom: -120px;
        }

        .circle.three {
            width: 180px;
            height: 180px;
            background: #fff0f2;
            right: 15%;
            top: 8%;
        }

        .heart {
            position: absolute;
            color: #f28a9b;
            font-size: 30px;
            opacity: 0.55;
            z-index: 1;
        }

        .heart.h1 {
            left: 8%;
            top: 23%;
        }

        .heart.h2 {
            right: 8%;
            top: 28%;
            font-size: 38px;
        }

        .heart.h3 {
            left: 18%;
            bottom: 15%;
            font-size: 24px;
        }

        .heart.h4 {
            right: 22%;
            bottom: 12%;
            font-size: 26px;
        }

        /* =========================
           NAVBAR
        ========================== */

        .navbar {
            position: relative;
            z-index: 10;
            width: 100%;
            padding: 22px 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: #df1738;
            font-weight: 800;
            font-size: 18px;
            letter-spacing: 0.3px;
        }

        .brand-icon {
            width: 34px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            background: #df1738;
            border-radius: 50% 50% 55% 55%;
            font-size: 20px;
            position: relative;
        }

        .brand-icon::after {
            content: "";
            position: absolute;
            width: 8px;
            height: 8px;
            background: white;
            border-radius: 50%;
            bottom: 7px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .nav-links a {
            text-decoration: none;
            color: #c51d39;
            font-weight: 700;
            font-size: 14px;
            padding: 10px 18px;
            border-radius: 10px;
        }

        .nav-links a:hover {
            background: #fff;
        }

        /* =========================
           HERO
        ========================== */

        .hero {
            position: relative;
            z-index: 5;
            min-height: calc(100vh - 84px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px 7% 60px;
        }

        .hero-container {
            width: 100%;
            max-width: 1250px;
            min-height: 650px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            gap: 30px;
            background: rgba(255, 255, 255, 0.52);
            border: 1px solid rgba(255, 255, 255, 0.8);
            border-radius: 32px;
            padding: 55px 65px;
            box-shadow: 0 20px 60px rgba(201, 47, 72, 0.12);
            backdrop-filter: blur(5px);
        }

        /* =========================
           LEFT CONTENT
        ========================== */

        .hero-content {
            text-align: center;
            position: relative;
            z-index: 3;
        }

        .drop-logo {
            width: 72px;
            height: 88px;
            margin: 0 auto 18px;
            background: #df1738;
            border-radius: 50% 50% 58% 58%;
            transform: rotate(0deg);
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 10px 25px rgba(223, 23, 56, 0.25);
        }

        .drop-logo::before {
            content: "";
            width: 28px;
            height: 42px;
            border-radius: 50%;
            background: #ff617b;
            position: absolute;
            top: 12px;
            left: 13px;
            opacity: 0.55;
        }

        .drop-logo::after {
            content: "+";
            color: white;
            font-weight: 900;
            font-size: 30px;
            position: relative;
            z-index: 2;
        }

        .subtitle {
            font-size: 16px;
            color: #555;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .main-title {
            font-size: clamp(32px, 4vw, 54px);
            line-height: 1.1;
            font-weight: 900;
            color: #d91636;
            margin-bottom: 14px;
            letter-spacing: -1px;
        }

        .tagline {
            font-size: 17px;
            color: #555;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .description {
            max-width: 450px;
            margin: 0 auto 30px;
            font-size: 14px;
            line-height: 1.7;
            color: #666;
        }

        /* =========================
           BUTTONS
        ========================== */

        .buttons {
            display: flex;
            justify-content: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .btn {
            min-width: 180px;
            padding: 16px 25px;
            border-radius: 14px;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-weight: 800;
            font-size: 15px;
            transition: all 0.25s ease;
            border: 2px solid #df1738;
        }

        .btn-login {
            background: #df1738;
            color: white;
            box-shadow: 0 8px 20px rgba(223, 23, 56, 0.2);
        }

        .btn-register {
            background: white;
            color: #df1738;
        }

        .btn:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 25px rgba(223, 23, 56, 0.2);
        }

        .btn-icon {
            font-size: 20px;
        }

        /* =========================
           RIGHT ILLUSTRATION
        ========================== */

        .hero-image {
            position: relative;
            min-height: 520px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .illustration-background {
            position: absolute;
            width: 440px;
            height: 440px;
            border-radius: 50%;
            background: #ffdce3;
            box-shadow: inset 0 0 50px rgba(255,255,255,0.6);
        }

        /* Blood drop mascot */

        .blood-mascot {
            position: absolute;
            right: 4%;
            bottom: 4%;
            width: 130px;
            height: 160px;
            z-index: 4;
        }

        .blood-drop {
            width: 100px;
            height: 125px;
            background: #df1738;
            border-radius: 55% 55% 60% 60%;
            transform: rotate(0deg);
            position: absolute;
            left: 15px;
            top: 10px;
            box-shadow: 0 10px 20px rgba(223, 23, 56, 0.22);
        }

        .blood-drop::before {
            content: "";
            position: absolute;
            width: 35px;
            height: 50px;
            background: #f85d78;
            border-radius: 50%;
            top: 15px;
            left: 15px;
            opacity: 0.7;
        }

        .eye {
            position: absolute;
            width: 10px;
            height: 14px;
            background: #333;
            border-radius: 50%;
            top: 58px;
            z-index: 2;
        }

        .eye.left {
            left: 28px;
        }

        .eye.right {
            right: 28px;
        }

        .smile {
            position: absolute;
            width: 22px;
            height: 11px;
            border-bottom: 3px solid #333;
            border-radius: 50%;
            left: 39px;
            top: 76px;
            z-index: 2;
        }

        .shield {
            position: absolute;
            right: -12px;
            bottom: 4px;
            width: 48px;
            height: 58px;
            background: white;
            border: 5px solid #df1738;
            border-radius: 12px 12px 18px 18px;
            z-index: 5;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #df1738;
            font-size: 22px;
            font-weight: 900;
        }

        /* Person illustration - CSS simplified */

        .person {
            position: relative;
            width: 300px;
            height: 430px;
            z-index: 3;
        }

        .person-head {
            position: absolute;
            width: 125px;
            height: 140px;
            border-radius: 48% 48% 45% 45%;
            background: #f6c7aa;
            top: 65px;
            left: 85px;
            z-index: 3;
            border: 5px solid #8d493b;
        }

        .hair {
            position: absolute;
            width: 145px;
            height: 175px;
            background: #6b302a;
            border-radius: 55% 55% 42% 42%;
            top: 35px;
            left: 75px;
            z-index: 2;
        }

        .hair::after {
            content: "";
            position: absolute;
            width: 35px;
            height: 105px;
            background: #6b302a;
            right: -8px;
            top: 50px;
            border-radius: 0 50% 50% 0;
        }

        .bow {
            position: absolute;
            top: 22px;
            right: 55px;
            z-index: 6;
        }

        .bow-left,
        .bow-right {
            width: 50px;
            height: 40px;
            background: #df1738;
            display: inline-block;
            border-radius: 50% 10px 50% 10px;
        }

        .bow-right {
            transform: scaleX(-1);
        }

        .bow-center {
            width: 22px;
            height: 22px;
            background: #b90d28;
            border-radius: 50%;
            position: absolute;
            top: 9px;
            left: 39px;
        }

        .eye-person {
            position: absolute;
            width: 13px;
            height: 18px;
            background: #333;
            border-radius: 50%;
            top: 120px;
            z-index: 5;
        }

        .eye-person.left {
            left: 115px;
        }

        .eye-person.right {
            left: 170px;
        }

        .mouth-person {
            position: absolute;
            width: 28px;
            height: 14px;
            border-bottom: 4px solid #b94b4b;
            border-radius: 50%;
            top: 153px;
            left: 137px;
            z-index: 5;
        }

        .body {
            position: absolute;
            width: 190px;
            height: 220px;
            background: white;
            border: 5px solid #df1738;
            border-radius: 80px 80px 30px 30px;
            top: 205px;
            left: 55px;
            z-index: 1;
        }

        .collar {
            position: absolute;
            width: 50px;
            height: 65px;
            background: #fff;
            border-left: 4px solid #df1738;
            border-bottom: 4px solid #df1738;
            transform: rotate(25deg);
            left: 90px;
            top: 220px;
            z-index: 4;
        }

        .medical-cross {
            position: absolute;
            top: 275px;
            left: 130px;
            z-index: 5;
            color: #df1738;
            font-size: 58px;
            font-weight: 900;
        }

        .arm {
            position: absolute;
            width: 65px;
            height: 170px;
            background: #f6c7aa;
            border-radius: 50px;
            z-index: 0;
        }

        .arm.left {
            left: 27px;
            top: 235px;
            transform: rotate(22deg);
        }

        .arm.right {
            right: 27px;
            top: 235px;
            transform: rotate(-22deg);
        }

        .heart-decoration {
            position: absolute;
            font-size: 42px;
            color: #ed7188;
            z-index: 2;
        }

        .heart-decoration.one {
            top: 30px;
            left: 15px;
        }

        .heart-decoration.two {
            right: 20px;
            top: 120px;
            font-size: 30px;
        }

        .heart-decoration.three {
            left: 35px;
            bottom: 70px;
            font-size: 28px;
        }

        /* =========================
           FOOTER
        ========================== */

        .footer {
            position: relative;
            z-index: 5;
            text-align: center;
            padding: 0 20px 25px;
            color: #999;
            font-size: 12px;
        }

        /* =========================
           RESPONSIVE
        ========================== */

        @media (max-width: 950px) {

            .hero-container {
                grid-template-columns: 1fr;
                padding: 45px 30px;
            }

            .hero-image {
                min-height: 430px;
                order: -1;
            }

            .illustration-background {
                width: 350px;
                height: 350px;
            }

            .navbar {
                padding-left: 5%;
                padding-right: 5%;
            }
        }

        @media (max-width: 600px) {

            .navbar {
                padding: 18px 20px;
            }

            .nav-links {
                display: none;
            }

            .hero {
                padding: 15px 15px 35px;
            }

            .hero-container {
                border-radius: 22px;
                padding: 35px 18px;
            }

            .hero-image {
                min-height: 350px;
                transform: scale(0.78);
                margin: -35px 0;
            }

            .illustration-background {
                width: 330px;
                height: 330px;
            }

            .main-title {
                font-size: 34px;
            }

            .subtitle {
                font-size: 14px;
            }

            .tagline {
                font-size: 15px;
            }

            .buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn {
                width: 100%;
                max-width: 300px;
            }
        }
    </style>
</head>

<body>

<div class="page">

    <!-- Background decoration -->
    <div class="circle one"></div>
    <div class="circle two"></div>
    <div class="circle three"></div>

    <div class="heart h1">♥</div>
    <div class="heart h2">♥</div>
    <div class="heart h3">♥</div>
    <div class="heart h4">♥</div>

    <!-- NAVBAR -->
    <nav class="navbar">

        <a href="{{ url('/') }}" class="brand">
            <span class="brand-icon">+</span>
            DONORCONNECT
        </a>

        <div class="nav-links">
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Registrasi</a>
        </div>

    </nav>

    <!-- HERO -->
    <main class="hero">

        <div class="hero-container">

            <!-- LEFT -->
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

                    <a href="{{ route('login') }}" class="btn btn-login">
                        <span class="btn-icon">⇥</span>
                        LOGIN
                    </a>

                    <a href="{{ route('register') }}" class="btn btn-register">
                        <span class="btn-icon">♟</span>
                        REGISTRASI
                    </a>

                </div>

            </section>


            <!-- RIGHT ILLUSTRATION -->
            <section class="hero-image">

                <div class="illustration-background"></div>

                <div class="heart-decoration one">♥</div>
                <div class="heart-decoration two">♥</div>
                <div class="heart-decoration three">♥</div>

                <!-- Person -->
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

                    <div class="medical-cross">+</div>

                    <div class="arm left"></div>
                    <div class="arm right"></div>

                </div>


                <!-- Blood Mascot -->
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

        </div>

    </main>

    <footer class="footer">
        © {{ date('Y') }} DonorConnect — Aplikasi Donor Darah PMR Sekolah
    </footer>

</div>

</body>
</html>