<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - DONORCONNECT</title>

    <style>
        /* =====================================================
           RESET
        ===================================================== */

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
            background: #fff7f5;
        }


        /* =====================================================
           HALAMAN LOGIN
        ===================================================== */

        .dc-login-page {
            width: 100%;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }


        /* =====================================================
           CONTAINER
        ===================================================== */

        .dc-login-container {
            width: 100%;
            max-width: 1050px;
            min-height: 620px;

            background: #ffffff;

            border-radius: 24px;
            overflow: hidden;

            display: flex;

            box-shadow:
                0 15px 40px rgba(180, 30, 50, 0.12);
        }


        /* =====================================================
           BAGIAN KIRI
        ===================================================== */

        .dc-login-left {
            width: 46%;

            background: linear-gradient(
                145deg,
                #fff0f1 0%,
                #ffe1e4 50%,
                #fff7f5 100%
            );

            display: flex;
            justify-content: center;
            align-items: center;

            position: relative;
            overflow: hidden;

            padding: 50px;
        }


        /* Lingkaran dekorasi */

        .dc-login-left::before {
            content: "";

            position: absolute;

            width: 280px;
            height: 280px;

            background: #ffd1d6;

            border-radius: 50%;

            top: -130px;
            left: -110px;

            opacity: 0.45;
        }

        .dc-login-left::after {
            content: "";

            position: absolute;

            width: 230px;
            height: 230px;

            background: #ffd7db;

            border-radius: 50%;

            bottom: -110px;
            right: -80px;

            opacity: 0.55;
        }


        /* Konten kiri */

        .dc-left-content {
            position: relative;
            z-index: 2;

            width: 100%;

            text-align: center;
        }


        /* Icon darah */

        .dc-blood-icon {
            width: 90px;
            height: 90px;

            margin: 0 auto 22px;

            background: #e51f3b;

            border-radius: 50% 50% 50% 10px;

            transform: rotate(-45deg);

            display: flex;
            justify-content: center;
            align-items: center;

            box-shadow:
                0 8px 20px rgba(229, 31, 59, 0.20);
        }

        .dc-blood-icon span {
            color: white;

            font-size: 40px;

            transform: rotate(45deg);
        }


        /* Brand */

        .dc-brand {
            color: #d91e36;

            font-size: 27px;

            font-weight: 800;

            margin-bottom: 8px;
        }

        .dc-subtitle {
            color: #666;

            font-size: 14px;

            line-height: 1.6;

            margin-bottom: 35px;
        }


        /* Welcome */

        .dc-welcome-title {
            color: #d91e36;

            font-size: 24px;

            font-weight: 700;

            line-height: 1.4;

            margin-bottom: 12px;
        }

        .dc-welcome-text {
            color: #555;

            font-size: 14px;

            line-height: 1.8;

            max-width: 350px;

            margin: 0 auto;
        }


        /* Hati */

        .dc-heart {
            position: absolute;

            color: #e99aa4;

            font-size: 34px;

            opacity: 0.55;

            z-index: 1;
        }

        .dc-heart-one {
            top: 65px;
            right: 50px;
        }

        .dc-heart-two {
            bottom: 75px;
            left: 50px;
        }


        /* =====================================================
           BAGIAN KANAN
        ===================================================== */

        .dc-login-right {
            width: 54%;

            padding: 55px 65px;

            display: flex;
            justify-content: center;
            align-items: center;

            background: #ffffff;
        }


        /* Box form */

        .dc-login-box {
            width: 100%;
            max-width: 420px;
        }


        /* Logo */

        .dc-login-logo {
            display: flex;
            align-items: center;

            gap: 9px;

            color: #d91e36;

            font-size: 22px;

            font-weight: 800;

            margin-bottom: 32px;
        }

        .dc-login-logo-icon {
            font-size: 27px;
        }


        /* Judul */

        .dc-login-title {
            color: #222;

            font-size: 28px;

            font-weight: 700;

            line-height: 1.3;

            margin-bottom: 8px;
        }

        .dc-login-description {
            color: #777;

            font-size: 13px;

            margin-bottom: 25px;
        }


        /* =====================================================
           ERROR
        ===================================================== */

        .dc-error-message {
            width: 100%;

            background: #fff0f1;

            color: #c91830;

            border: 1px solid #f3c5ca;

            border-radius: 8px;

            padding: 11px 13px;

            margin-bottom: 18px;

            font-size: 12px;

            line-height: 1.5;
        }


        /* =====================================================
           FORM
        ===================================================== */

        .dc-login-form {
            width: 100%;
        }


        /* INI YANG PENTING:
           Setiap form-group SELALU satu baris vertikal */

        .dc-form-group {
            width: 100%;

            display: block;

            margin-bottom: 18px;
        }


        .dc-form-group label {
            display: block;

            width: 100%;

            color: #333;

            font-size: 13px;

            font-weight: 700;

            margin-bottom: 7px;
        }


        /* Input wrapper */

        .dc-input-wrapper {
            width: 100%;

            position: relative;

            display: block;
        }


        /* Input dan select */

        .dc-input-wrapper input,
        .dc-input-wrapper select {
            display: block;

            width: 100%;

            height: 46px;

            border: 1px solid #e5d5d7;

            border-radius: 8px;

            background: #ffffff;

            color: #333;

            font-size: 13px;

            padding: 0 14px;

            outline: none;

            box-shadow: none;

            transition: all 0.2s ease;
        }


        /* Fokus */

        .dc-input-wrapper input:focus,
        .dc-input-wrapper select:focus {
            border-color: #e51f3b;

            box-shadow:
                0 0 0 3px rgba(229, 31, 59, 0.08);
        }


        /* Placeholder */

        .dc-input-wrapper input::placeholder {
            color: #aaa;
        }


        /* Password */

        .dc-password-input {
            padding-right: 48px !important;
        }


        /* Eye */

        .dc-show-password {
            position: absolute;

            right: 14px;
            top: 50%;

            transform: translateY(-50%);

            cursor: pointer;

            color: #777;

            font-size: 16px;

            user-select: none;
        }


        /* =====================================================
           REMEMBER
        ===================================================== */

        .dc-remember {
            display: flex;

            align-items: center;

            gap: 7px;

            margin: 3px 0 20px;

            color: #555;

            font-size: 12px;
        }

        .dc-remember input {
            width: 14px;
            height: 14px;

            accent-color: #e51f3b;
        }


        /* =====================================================
           BUTTON LOGIN
        ===================================================== */

        .dc-login-button {
            display: block;

            width: 100%;

            height: 46px;

            border: none;

            border-radius: 8px;

            background: #e51f3b;

            color: #ffffff;

            font-size: 14px;

            font-weight: 700;

            cursor: pointer;

            transition: all 0.2s ease;
        }

        .dc-login-button:hover {
            background: #c91830;

            transform: translateY(-1px);
        }

        .dc-login-button:active {
            transform: translateY(0);
        }


        /* =====================================================
           REGISTER
        ===================================================== */

        .dc-register-text {
            width: 100%;

            text-align: center;

            color: #666;

            font-size: 12px;

            margin-top: 18px;

            line-height: 1.6;
        }

        .dc-register-text a {
            color: #d91e36;

            font-weight: 700;

            text-decoration: none;
        }

        .dc-register-text a:hover {
            text-decoration: underline;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 850px) {

            .dc-login-container {
                max-width: 600px;
            }

            .dc-login-left {
                display: none;
            }

            .dc-login-right {
                width: 100%;

                padding: 50px 40px;
            }
        }


        @media (max-width: 500px) {

            .dc-login-page {
                padding: 15px;
            }

            .dc-login-container {
                border-radius: 18px;
            }

            .dc-login-right {
                padding: 40px 25px;
            }

            .dc-login-title {
                font-size: 24px;
            }
        }
    </style>
</head>


<body>

<div class="dc-login-page">

    <div class="dc-login-container">


        <!-- =================================================
             BAGIAN KIRI
        ================================================== -->

        <div class="dc-login-left">

            <div class="dc-heart dc-heart-one">
                ♥
            </div>

            <div class="dc-heart dc-heart-two">
                ♥
            </div>


            <div class="dc-left-content">

                <div class="dc-blood-icon">
                    <span>♥</span>
                </div>


                <div class="dc-brand">
                    DONORCONNECT
                </div>


                <div class="dc-subtitle">
                    Aplikasi Donor Darah<br>
                    PMR Sekolah
                </div>


                <div class="dc-welcome-title">
                    Donor Darah, Selamatkan Nyawa ❤️
                </div>


                <div class="dc-welcome-text">
                    Bersama DONORCONNECT, mari berkontribusi
                    untuk membantu sesama melalui kegiatan
                    donor darah.
                </div>

            </div>

        </div>


        <!-- =================================================
             BAGIAN KANAN
        ================================================== -->

        <div class="dc-login-right">

            <div class="dc-login-box">


                <!-- LOGO -->

                <div class="dc-login-logo">

                    <span class="dc-login-logo-icon">
                        🩸
                    </span>

                    <span>
                        DONORCONNECT
                    </span>

                </div>


                <!-- JUDUL -->

                <h1 class="dc-login-title">
                    Selamat Datang Kembali! 👋
                </h1>


                <p class="dc-login-description">
                    Silakan login untuk melanjutkan.
                </p>


                <!-- ERROR -->

                @if ($errors->any())

                    <div class="dc-error-message">

                        {{ $errors->first() }}

                    </div>

                @endif


                <!-- =================================================
                     FORM LOGIN
                ================================================== -->

                <form
                    class="dc-login-form"
                    method="POST"
                    action="{{ route('login.submit') }}"
                >

                    @csrf


                    <!-- EMAIL -->

                    <div class="dc-form-group">

                        <label for="email">
                            Email
                        </label>

                        <div class="dc-input-wrapper">

                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="Masukkan email"
                                required
                                autocomplete="email"
                            >

                        </div>

                    </div>


                    <!-- PASSWORD -->

                    <div class="dc-form-group">

                        <label for="password">
                            Password
                        </label>

                        <div class="dc-input-wrapper">

                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="dc-password-input"
                                placeholder="Masukkan password"
                                required
                                autocomplete="current-password"
                            >

                            <span
                                class="dc-show-password"
                                id="dcEyeIcon"
                                onclick="togglePassword()"
                            >
                                👁
                            </span>

                        </div>

                    </div>


                    <!-- PILIH PERAN -->

                    <div class="dc-form-group">

                        <label for="role">
                            Pilih Peran
                        </label>

                        <div class="dc-input-wrapper">

                            <select
                                id="role"
                                name="role"
                                required
                            >

                                <option value="">
                                    Pilih peran Anda
                                </option>

                                <option
                                    value="pendonor"
                                    {{ old('role') === 'pendonor' ? 'selected' : '' }}
                                >
                                    Pendonor
                                </option>

                                <option
                                    value="petugas"
                                    {{ old('role') === 'petugas' ? 'selected' : '' }}
                                >
                                    Petugas PMR
                                </option>

                            </select>

                        </div>

                    </div>


                    <!-- REMEMBER ME -->

                    <label class="dc-remember">

                        <input
                            type="checkbox"
                            name="remember"
                            value="1"
                        >

                        <span>
                            Ingat saya
                        </span>

                    </label>


                    <!-- LOGIN BUTTON -->

                    <button
                        type="submit"
                        class="dc-login-button"
                    >
                        Login
                    </button>

                </form>


                <!-- REGISTER -->

                <div class="dc-register-text">

                    Belum punya akun?

                    <a href="{{ route('register') }}">
                        Registrasi di sini
                    </a>

                </div>


            </div>

        </div>

    </div>

</div>


<!-- =========================================================
     JAVASCRIPT
========================================================= -->

<script>

    function togglePassword() {

        const password =
            document.getElementById('password');

        const eye =
            document.getElementById('dcEyeIcon');


        if (password.type === 'password') {

            password.type = 'text';

            eye.textContent = '🙈';

        } else {

            password.type = 'password';

            eye.textContent = '👁';

        }

    }

</script>


</body>
</html>