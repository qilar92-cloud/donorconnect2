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

        html,
        body {
            width: 100%;
            min-height: 100%;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            color: #333;
            background: linear-gradient(
                135deg,
                #fff7f8 0%,
                #ffe9ed 50%,
                #ffffff 100%
            );
            overflow-x: hidden;
        }

        .page {
            width: 100%;
            min-height: 100vh;
            position: relative;
            overflow: hidden;
        }


        /* Background */

        .circle {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
        }

        .circle.one {
            width: 420px;
            height: 420px;
            top: -190px;
            left: -140px;
            background: #ffd6de;
            opacity: .55;
        }

        .circle.two {
            width: 360px;
            height: 360px;
            right: -170px;
            bottom: -150px;
            background: #ffe3e9;
            opacity: .6;
        }

        .circle.three {
            width: 190px;
            height: 190px;
            right: 15%;
            top: 8%;
            background: #fff0f3;
            opacity: .8;
        }

        .heart {
            position: absolute;
            color: #e56a83;
            opacity: .55;
            pointer-events: none;
        }

        .heart.h1 {
            left: 8%;
            top: 24%;
            font-size: 30px;
        }

        .heart.h2 {
            right: 8%;
            top: 28%;
            font-size: 37px;
        }

        .heart.h3 {
            left: 17%;
            bottom: 14%;
            font-size: 23px;
        }

        .heart.h4 {
            right: 20%;
            bottom: 11%;
            font-size: 25px;
        }


        /* Navbar */

        .navbar {
            position: relative;
            z-index: 10;

            width: 100%;
            min-height: 78px;

            padding: 18px 7%;

            display: flex;
            align-items: center;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;

            color: #d91636;
            text-decoration: none;

            font-size: 18px;
            font-weight: 900;
        }

        .brand-icon {
            width: 34px;
            height: 40px;

            display: flex;
            align-items: center;
            justify-content: center;

            position: relative;

            color: white;
            background: #df1738;

            border-radius: 50% 50% 55% 55%;

            font-size: 20px;
        }

        .brand-icon::after {
            content: "";

            position: absolute;

            width: 8px;
            height: 8px;

            bottom: 7px;

            background: white;
            border-radius: 50%;
        }


        /* Hero */

        .hero {
            position: relative;
            z-index: 5;

            width: 100%;

            padding: 20px 6% 30px;

            display: flex;
            justify-content: center;
        }

        .hero-container {
            width: 100%;
            max-width: 1250px;

            display: grid;
            grid-template-columns: 1fr 1fr;

            align-items: center;

            gap: 20px;

            padding: 45px 55px;

            background: rgba(255, 255, 255, .62);

            border: 1px solid rgba(255,255,255,.9);

            border-radius: 32px;

            box-shadow:
                0 20px 60px rgba(201,47,72,.12);

            backdrop-filter: blur(6px);
        }


        /* Ilustrasi */

        .hero-image {
            position: relative;

            width: 100%;
            height: 500px;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .illustration-background {
            position: absolute;

            width: 425px;
            height: 425px;

            border-radius: 50%;

            background: #ffdce3;

            box-shadow:
                inset 0 0 50px rgba(255,255,255,.6);
        }


        /* Orang */

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

            top: 65px;
            left: 85px;

            background: #f6c7aa;

            border: 5px solid #8d493b;

            border-radius: 48% 48% 45% 45%;

            z-index: 3;
        }

        .hair {
            position: absolute;

            width: 145px;
            height: 175px;

            top: 35px;
            left: 75px;

            background: #6b302a;

            border-radius: 55% 55% 42% 42%;

            z-index: 2;
        }

        .hair::after {
            content: "";

            position: absolute;

            width: 35px;
            height: 105px;

            top: 50px;
            right: -8px;

            background: #6b302a;

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
            display: inline-block;

            width: 50px;
            height: 40px;

            background: #df1738;

            border-radius: 50% 10px 50% 10px;
        }

        .bow-right {
            transform: scaleX(-1);
        }

        .bow-center {
            position: absolute;

            width: 22px;
            height: 22px;

            top: 9px;
            left: 39px;

            background: #b90d28;

            border-radius: 50%;
        }

        .eye-person {
            position: absolute;

            width: 13px;
            height: 18px;

            top: 120px;

            background: #333;

            border-radius: 50%;

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

            top: 153px;
            left: 137px;

            border-bottom: 4px solid #b94b4b;

            border-radius: 50%;

            z-index: 5;
        }

        .body {
            position: absolute;

            width: 190px;
            height: 220px;

            top: 205px;
            left: 55px;

            background: white;

            border: 5px solid #df1738;

            border-radius: 80px 80px 30px 30px;

            z-index: 1;
        }

        .collar {
            position: absolute;

            width: 50px;
            height: 65px;

            top: 220px;
            left: 90px;

            background: white;

            border-left: 4px solid #df1738;
            border-bottom: 4px solid #df1738;

            transform: rotate(25deg);

            z-index: 4;
        }

        .medical-cross {
            position: absolute;

            top: 275px;
            left: 130px;

            color: #df1738;

            font-size: 58px;
            font-weight: 900;

            z-index: 5;
        }

        .arm {
            position: absolute;

            width: 65px;
            height: 170px;

            top: 235px;

            background: #f6c7aa;

            border-radius: 50px;

            z-index: 0;
        }

        .arm.left {
            left: 27px;
            transform: rotate(22deg);
        }

        .arm.right {
            right: 27px;
            transform: rotate(-22deg);
        }


        /* Maskot */

        .blood-mascot {
            position: absolute;

            width: 130px;
            height: 160px;

            right: 2%;
            bottom: 2%;

            z-index: 7;
        }

        .blood-drop {
            position: absolute;

            width: 100px;
            height: 125px;

            top: 10px;
            left: 15px;

            background: #df1738;

            border-radius: 55% 55% 60% 60%;

            box-shadow:
                0 10px 20px rgba(223,23,56,.22);
        }

        .blood-drop::before {
            content: "";

            position: absolute;

            width: 35px;
            height: 50px;

            top: 15px;
            left: 15px;

            background: #f85d78;

            border-radius: 50%;

            opacity: .7;
        }

        .eye {
            position: absolute;

            width: 10px;
            height: 14px;

            top: 58px;

            background: #333;

            border-radius: 50%;

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

            top: 76px;
            left: 39px;

            border-bottom: 3px solid #333;

            border-radius: 50%;

            z-index: 2;
        }

        .shield {
            position: absolute;

            width: 48px;
            height: 58px;

            right: -12px;
            bottom: 4px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: white;

            border: 5px solid #df1738;

            border-radius: 12px 12px 18px 18px;

            color: #df1738;

            font-size: 22px;
            font-weight: 900;

            z-index: 5;
        }


        /* Hati ilustrasi */

        .heart-decoration {
            position: absolute;
            color: #ed7188;
            z-index: 2;
        }

        .heart-decoration.one {
            top: 30px;
            left: 15px;
            font-size: 42px;
        }

        .heart-decoration.two {
            top: 120px;
            right: 20px;
            font-size: 30px;
        }

        .heart-decoration.three {
            bottom: 70px;
            left: 35px;
            font-size: 28px;
        }


        /* Konten */

        .hero-content {
            position: relative;
            z-index: 5;

            text-align: center;

            width: 100%;
        }

        .drop-logo {
            width: 70px;
            height: 85px;

            margin: 0 auto 15px;

            display: flex;
            align-items: center;
            justify-content: center;

            position: relative;

            background: #df1738;

            border-radius: 50% 50% 58% 58%;

            box-shadow:
                0 10px 25px rgba(223,23,56,.25);
        }

        .drop-logo::before {
            content: "";

            position: absolute;

            width: 27px;
            height: 40px;

            top: 12px;
            left: 13px;

            background: #ff617b;

            border-radius: 50%;

            opacity: .55;
        }

        .drop-logo::after {
            content: "+";

            position: relative;

            color: white;

            font-size: 29px;
            font-weight: 900;

            z-index: 2;
        }

        .subtitle {
            margin-bottom: 7px;

            color: #555;

            font-size: 16px;
            font-weight: 700;
        }

        .main-title {
            margin-bottom: 12px;

            color: #d91636;

            font-size: clamp(34px, 4vw, 53px);

            line-height: 1.08;

            font-weight: 900;

            letter-spacing: -1px;
        }

        .tagline {
            margin-bottom: 8px;

            color: #555;

            font-size: 17px;
            font-weight: 700;
        }

        .description {
            max-width: 450px;

            margin: 0 auto 27px;

            color: #666;

            font-size: 14px;

            line-height: 1.7;
        }


        /* Tombol */

        .buttons {
            display: flex;

            align-items: center;
            justify-content: center;

            gap: 14px;

            flex-wrap: wrap;
        }

        .btn {
            min-width: 175px;

            padding: 15px 23px;

            display: flex;

            align-items: center;
            justify-content: center;

            gap: 9px;

            text-decoration: none;

            border-radius: 13px;

            font-size: 14px;
            font-weight: 800;

            transition: .25s;
        }

        .btn-login {
            color: white;

            background: #df1738;

            border: 2px solid #df1738;

            box-shadow:
                0 8px 20px rgba(223,23,56,.20);
        }

        .btn-register {
            color: #df1738;

            background: white;

            border: 2px solid #df1738;
        }

        .btn:hover {
            transform: translateY(-3px);

            box-shadow:
                0 12px 25px rgba(223,23,56,.20);
        }

        .btn-icon {
            font-size: 18px;
        }


        /* Footer */

        .footer {
            position: relative;

            z-index: 5;

            width: 100%;

            padding: 0 20px 18px;

            text-align: center;

            color: #999;

            font-size: 12px;
        }


        /* Tablet */

        @media (max-width: 900px) {

            .hero {
                padding: 10px 18px 20px;
            }

            .hero-container {
                padding: 28px 25px;
            }

            .hero-image {
                height: 420px;
            }

            .illustration-background {
                width: 340px;
                height: 340px;
            }

            .person {
                transform: scale(.72);
            }

            .blood-mascot {
                right: 0;
                bottom: 0;
                transform: scale(.65);
            }

            .main-title {
                font-size: 38px;
            }
        }


        /* HP */

        @media (max-width: 600px) {

            body {
                background:
                    linear-gradient(
                        145deg,
                        #fff5f7,
                        #ffecef
                    );
            }

            .navbar {
                min-height: 58px;
                padding: 9px 16px;
            }

            .brand {
                font-size: 14px;
            }

            .brand-icon {
                width: 28px;
                height: 34px;
                font-size: 17px;
            }


            .hero {
                padding: 5px 9px 12px;
            }

            .hero-container {
                display: flex;
                flex-direction: column;

                gap: 0;

                padding: 12px 12px 18px;

                border-radius: 20px;
            }


            /* Area ilustrasi */

            .hero-image {
                width: 100%;

                height: 255px;
                min-height: 0;

                flex-shrink: 0;
            }

            .illustration-background {
                width: 210px;
                height: 210px;
            }

            .person {
                transform: scale(.43);
            }

            .blood-mascot {
                right: 2px;
                bottom: -5px;

                transform: scale(.40);
            }

            .heart-decoration.one {
                top: 5px;
                left: 7%;

                font-size: 22px;
            }

            .heart-decoration.two {
                top: 50px;
                right: 6%;

                font-size: 18px;
            }

            .heart-decoration.three {
                bottom: 5px;
                left: 10%;

                font-size: 17px;
            }


            /* Area teks */

            .hero-content {
                padding: 0 4px;
            }

            .drop-logo {
                width: 48px;
                height: 58px;

                margin-bottom: 7px;
            }

            .drop-logo::before {
                width: 18px;
                height: 27px;

                top: 7px;
                left: 9px;
            }

            .drop-logo::after {
                font-size: 20px;
            }

            .subtitle {
                margin-bottom: 3px;
                font-size: 12px;
            }

            .main-title {
                margin-bottom: 6px;

                font-size: clamp(25px, 7.5vw, 31px);

                line-height: 1.06;

                letter-spacing: -.5px;
            }

            .tagline {
                margin-bottom: 5px;

                font-size: 13px;
            }

            .description {
                max-width: 320px;

                margin-bottom: 13px;

                font-size: 10.5px;

                line-height: 1.45;
            }


            /* Tombol */

            .buttons {
                width: 100%;

                gap: 7px;
            }

            .btn {
                width: 100%;
                max-width: 260px;

                min-width: 0;

                padding: 10px 14px;

                border-radius: 10px;

                font-size: 11px;
            }

            .btn-icon {
                font-size: 16px;
            }


            .footer {
                padding: 0 10px 10px;

                font-size: 8px;
            }


            /* Background */

            .circle.one {
                width: 210px;
                height: 210px;

                top: -105px;
                left: -85px;
            }

            .circle.two {
                width: 180px;
                height: 180px;

                right: -85px;
                bottom: -70px;
            }

            .circle.three {
                width: 90px;
                height: 90px;

                top: 14%;
                right: 2%;
            }

            .heart.h1 {
                left: 1%;
                top: 29%;
                font-size: 17px;
            }

            .heart.h2 {
                right: 1%;
                top: 37%;
                font-size: 20px;
            }

            .heart.h3,
            .heart.h4 {
                display: none;
            }
        }


        /* HP kecil */

        @media (max-width: 380px) {

            .hero-image {
                height: 225px;
            }

            .illustration-background {
                width: 185px;
                height: 185px;
            }

            .person {
                transform: scale(.38);
            }

            .blood-mascot {
                transform: scale(.35);
            }

            .main-title {
                font-size: 24px;
            }

            .description {
                max-width: 270px;
                font-size: 10px;
            }

            .btn {
                max-width: 235px;
            }
        }
    </style>
</head>

<body>

<div class="page">

    <!-- Background -->

    <div class="circle one"></div>
    <div class="circle two"></div>
    <div class="circle three"></div>

    <div class="heart h1">♥</div>
    <div class="heart h2">♥</div>
    <div class="heart h3">♥</div>
    <div class="heart h4">♥</div>


    <!-- Navbar -->

    <nav class="navbar">

        <a href="{{ url('/') }}" class="brand">

            <span class="brand-icon">
                +
            </span>

            DONORCONNECT

        </a>

    </nav>


    <!-- Hero -->

    <main class="hero">

        <div class="hero-container">


            <!-- Ilustrasi -->

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


            <!-- Konten -->

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

                        <span class="btn-icon">
                            ⇥
                        </span>

                        LOGIN

                    </a>

                    <a href="{{ route('register') }}" class="btn btn-register">

                        <span class="btn-icon">
                            ♟
                        </span>

                        REGISTRASI

                    </a>

                </div>

            </section>

        </div>

    </main>


    <!-- Footer -->

    <footer class="footer">

        © {{ date('Y') }} DonorConnect —
        Aplikasi Donor Darah PMR Sekolah

    </footer>

</div>

</body>
</html>