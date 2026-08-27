@extends('layouts.auth')

@section('title', 'Register - DONORCONNECT')

@section('content')

<style>
    * {
        box-sizing: border-box;
    }

    body {
        background: #fff7f5 !important;
    }

    .register-container {
        width: 100%;
        max-width: 1100px;
        min-height: 650px;
        margin: 25px auto;
        background: #ffffff;
        border-radius: 25px;
        overflow: hidden;
        display: flex;
        box-shadow: 0 10px 35px rgba(190, 40, 55, 0.12);
    }


    /* =====================================
       BAGIAN KIRI - FORM REGISTRASI
    ===================================== */

    .register-left {
        width: 52%;
        background: #ffffff;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 45px 70px;
    }

    .register-box {
        width: 100%;
        max-width: 430px;
    }

    .logo {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #d91e36;
        font-size: 21px;
        font-weight: bold;
        margin-bottom: 25px;
    }

    .logo-icon {
        font-size: 27px;
    }

    .register-title {
        font-size: 27px;
        color: #222;
        margin-bottom: 8px;
    }

    .register-description {
        color: #777;
        font-size: 13px;
        margin-bottom: 25px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        font-size: 13px;
        font-weight: bold;
        color: #333;
        margin-bottom: 7px;
    }

    .input-wrapper {
        position: relative;
    }

    .input-wrapper input {
        width: 100%;
        height: 42px;
        border: 1px solid #ead6d8;
        border-radius: 8px;
        padding: 0 14px;
        outline: none;
        background: #fff;
        color: #444;
        font-size: 13px;
        transition: 0.2s;
    }

    .input-wrapper input:focus {
        border-color: #e51f3b;
        box-shadow: 0 0 0 3px rgba(229, 31, 59, 0.08);
    }

    .password-input {
        padding-right: 45px !important;
    }

    .show-password {
        position: absolute;
        right: 14px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #777;
        font-size: 16px;
    }

    .register-button {
        width: 100%;
        height: 45px;
        border: none;
        border-radius: 8px;
        background: #e51f3b;
        color: white;
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.2s;
        margin-top: 5px;
    }

    .register-button:hover {
        background: #c91830;
    }

    .login-text {
        text-align: center;
        font-size: 12px;
        color: #555;
        margin-top: 18px;
    }

    .login-text a {
        color: #d91e36;
        font-weight: bold;
        text-decoration: none;
    }

    .login-text a:hover {
        text-decoration: underline;
    }

    .error-message {
        background: #fff0f1;
        color: #c91830;
        border: 1px solid #f3c5ca;
        border-radius: 7px;
        padding: 10px 12px;
        margin-bottom: 15px;
        font-size: 12px;
    }

    .field-error {
        color: #c91830;
        font-size: 11px;
        margin-top: 5px;
    }


    /* =====================================
       BAGIAN KANAN - BRANDING REGISTRASI
    ===================================== */

    .register-right {
        width: 48%;
        background: linear-gradient(
            145deg,
            #fff1f0,
            #ffe3e4,
            #fff8f5
        );

        display: flex;
        justify-content: center;
        align-items: center;

        position: relative;
        overflow: hidden;

        padding: 45px;
    }

    /* Lingkaran dekorasi */

    .register-right::before {
        content: "";
        position: absolute;

        width: 280px;
        height: 280px;

        background: #ffd4d7;

        border-radius: 50%;

        top: -120px;
        right: -100px;

        opacity: 0.5;
    }

    .register-right::after {
        content: "";
        position: absolute;

        width: 230px;
        height: 230px;

        background: #ffd9dc;

        border-radius: 50%;

        bottom: -100px;
        left: -90px;

        opacity: 0.55;
    }


    /* =====================================
       ILUSTRASI DONOR
    ===================================== */

    .branding-content {
        text-align: center;
        position: relative;
        z-index: 2;
        max-width: 380px;
    }

    .donor-illustration {
        width: 190px;
        height: 150px;

        margin: 0 auto 25px;

        position: relative;
    }

    /* Lingkaran belakang */

    .illustration-circle {
        position: absolute;

        width: 150px;
        height: 150px;

        background: #ffe0e2;

        border-radius: 50%;

        left: 20px;
        top: 0;
    }

    /* Kepala orang */

    .person-head {
        position: absolute;

        width: 45px;
        height: 45px;

        background: #f2b7a5;

        border-radius: 50%;

        left: 73px;
        top: 20px;

        z-index: 3;
    }

    /* Rambut */

    .person-hair {
        position: absolute;

        width: 47px;
        height: 25px;

        background: #4b3030;

        border-radius: 30px 30px 10px 10px;

        left: 72px;
        top: 16px;

        z-index: 4;
    }

    /* Badan */

    .person-body {
        position: absolute;

        width: 70px;
        height: 65px;

        background: #e51f3b;

        border-radius: 35px 35px 10px 10px;

        left: 60px;
        top: 65px;

        z-index: 2;
    }

    /* Kantong darah */

    .blood-bag {
        position: absolute;

        width: 45px;
        height: 60px;

        background: #ffffff;

        border: 3px solid #e51f3b;

        border-radius: 8px;

        right: 18px;
        top: 50px;

        z-index: 5;
    }

    .blood-bag::before {
        content: "";

        position: absolute;

        width: 6px;
        height: 18px;

        background: #e51f3b;

        left: 17px;
        top: -21px;

        border-radius: 4px;
    }

    .blood-bag::after {
        content: "♥";

        position: absolute;

        color: #e51f3b;

        font-size: 20px;

        left: 10px;
        top: 17px;
    }


    /* =====================================
       TEXT BRANDING
    ===================================== */

    .branding-small {
        color: #d91e36;
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 8px;
        letter-spacing: 0.5px;
    }

    .branding-title {
        color: #d91e36;
        font-size: 27px;
        font-weight: bold;
        margin-bottom: 12px;
    }

    .branding-text {
        color: #555;
        font-size: 14px;
        line-height: 1.7;
        max-width: 330px;
        margin: 0 auto 20px;
    }

    .branding-quote {
        display: inline-block;

        background: #ffffff;

        color: #d91e36;

        font-size: 13px;
        font-weight: bold;

        padding: 10px 18px;

        border-radius: 20px;

        box-shadow: 0 5px 15px rgba(190, 40, 55, 0.08);
    }


    /* Dekorasi hati */

    .heart {
        position: absolute;

        color: #f0a0aa;

        font-size: 30px;

        opacity: 0.65;

        z-index: 1;
    }

    .heart.one {
        top: 65px;
        left: 55px;
    }

    .heart.two {
        bottom: 70px;
        right: 55px;
    }

    .heart.three {
        top: 150px;
        right: 70px;
        font-size: 20px;
    }


    /* =====================================
       RESPONSIVE
    ===================================== */

    @media (max-width: 850px) {

        .register-container {
            min-height: auto;
        }

        .register-left {
            width: 100%;
            padding: 40px 30px;
        }

        .register-right {
            display: none;
        }
    }

</style>


<div class="register-container">


    <!-- =====================================
         FORM REGISTRASI
         SEBELAH KIRI
    ===================================== -->

    <div class="register-left">

        <div class="register-box">

            <!-- LOGO -->

            <div class="logo">
                <span class="logo-icon">🩸</span>
                DONORCONNECT
            </div>


            <!-- JUDUL -->

            <h1 class="register-title">
                Buat Akun Baru ❤️
            </h1>

            <p class="register-description">
                Daftarkan akunmu untuk bergabung bersama DONORCONNECT.
            </p>


            <!-- ERROR -->

            @if ($errors->any())

                <div class="error-message">
                    {{ $errors->first() }}
                </div>

            @endif


            <!-- FORM -->

            <form method="POST" action="{{ route('register.submit') }}">

                @csrf


                <!-- NAMA LENGKAP -->

                <div class="form-group">

                    <label for="nama">
                        Nama Lengkap
                    </label>

                    <div class="input-wrapper">

                        <input
                            type="text"
                            id="nama"
                            name="nama"
                            value="{{ old('nama') }}"
                            placeholder="Masukkan nama lengkap"
                            required
                            autofocus
                            autocomplete="name"
                        >

                    </div>

                    @error('nama')

                        <div class="field-error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <!-- USERNAME -->

                <div class="form-group">

                    <label for="username">
                        Username
                    </label>

                    <div class="input-wrapper">

                        <input
                            type="text"
                            id="username"
                            name="username"
                            value="{{ old('username') }}"
                            placeholder="Masukkan username"
                            required
                            autocomplete="username"
                        >

                    </div>

                    @error('username')

                        <div class="field-error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <!-- EMAIL -->

                <div class="form-group">

                    <label for="email">
                        Email
                    </label>

                    <div class="input-wrapper">

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

                    @error('email')

                        <div class="field-error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <!-- PASSWORD -->

                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <div class="input-wrapper">

                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="password-input"
                            placeholder="Masukkan password"
                            required
                            autocomplete="new-password"
                        >

                        <span
                            class="show-password"
                            onclick="togglePassword(
                                'password',
                                'eyePassword'
                            )"
                            id="eyePassword"
                        >
                            👁
                        </span>

                    </div>

                    @error('password')

                        <div class="field-error">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                <!-- KONFIRMASI PASSWORD -->

                <div class="form-group">

                    <label for="password_confirmation">
                        Konfirmasi Password
                    </label>

                    <div class="input-wrapper">

                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            class="password-input"
                            placeholder="Masukkan ulang password"
                            required
                            autocomplete="new-password"
                        >

                        <span
                            class="show-password"
                            onclick="togglePassword(
                                'password_confirmation',
                                'eyeConfirmation'
                            )"
                            id="eyeConfirmation"
                        >
                            👁
                        </span>

                    </div>

                </div>


                <!-- BUTTON -->

                <button
                    type="submit"
                    class="register-button"
                >
                    Daftar
                </button>

            </form>


            <!-- LOGIN -->

            <div class="login-text">

                Sudah punya akun?

                <a href="{{ route('login') }}">
                    Login di sini
                </a>

            </div>

        </div>

    </div>


    <!-- =====================================
         BRANDING REGISTRASI
         SEBELAH KANAN
    ===================================== -->

    <div class="register-right">


        <div class="heart one">
            ♥
        </div>

        <div class="heart two">
            ♥
        </div>

        <div class="heart three">
            ♥
        </div>


        <div class="branding-content">


            <!-- ILUSTRASI -->

            <div class="donor-illustration">

                <div class="illustration-circle"></div>

                <div class="person-head"></div>

                <div class="person-hair"></div>

                <div class="person-body"></div>

                <div class="blood-bag"></div>

            </div>


            <!-- TEXT -->

            <div class="branding-small">
                SELAMAT BERGABUNG
            </div>

            <div class="branding-title">
                Bergabung Bersama Kami ❤️
            </div>

            <div class="branding-text">
                Buat akun DONORCONNECT dan mulai
                berkontribusi dalam kegiatan donor darah
                untuk membantu sesama.
            </div>


            <div class="branding-quote">
                Setetes Darah, Sejuta Harapan
            </div>

        </div>

    </div>

</div>


<script>

    function togglePassword(inputId, iconId) {

        const password = document.getElementById(inputId);
        const icon = document.getElementById(iconId);

        if (password.type === 'password') {

            password.type = 'text';

            icon.textContent = '🙈';

        } else {

            password.type = 'password';

            icon.textContent = '👁';

        }

    }

</script>

@endsection