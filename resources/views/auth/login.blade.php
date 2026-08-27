<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - DONORCONNECT</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            min-height: 100vh;
            background: #fff7f5;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 25px;
        }

        .login-container {
            width: 100%;
            max-width: 1100px;
            min-height: 650px;
            background: #ffffff;
            border-radius: 25px;
            overflow: hidden;
            display: flex;
            box-shadow: 0 10px 35px rgba(190, 40, 55, 0.12);
        }

        /* BAGIAN KIRI */
        .login-left {
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

        .login-left::before {
            content: "";
            position: absolute;
            width: 260px;
            height: 260px;
            background: #ffd4d7;
            border-radius: 50%;
            top: -100px;
            left: -80px;
            opacity: 0.45;
        }

        .login-left::after {
            content: "";
            position: absolute;
            width: 220px;
            height: 220px;
            background: #ffd9dc;
            border-radius: 50%;
            bottom: -100px;
            right: -60px;
            opacity: 0.5;
        }

        .left-content {
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .blood-icon {
            width: 85px;
            height: 85px;
            background: #e51f3b;
            margin: 0 auto 20px;
            border-radius: 50% 50% 50% 8px;
            transform: rotate(-45deg);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .blood-icon span {
            color: white;
            font-size: 38px;
            transform: rotate(45deg);
        }

        .brand {
            color: #d91e36;
            font-size: 25px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #555;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .welcome-title {
            color: #d91e36;
            font-size: 25px;
            font-weight: bold;
            margin-bottom: 12px;
        }

        .welcome-text {
            color: #555;
            font-size: 14px;
            line-height: 1.7;
            max-width: 350px;
            margin: auto;
        }

        .heart {
            position: absolute;
            color: #f4a5ad;
            font-size: 35px;
            opacity: 0.6;
        }

        .heart.one {
            top: 70px;
            right: 55px;
        }

        .heart.two {
            bottom: 90px;
            left: 55px;
        }

        /* BAGIAN KANAN */
        .login-right {
            width: 52%;
            padding: 55px 70px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
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
            margin-bottom: 35px;
        }

        .logo-icon {
            font-size: 28px;
        }

        .login-title {
            font-size: 27px;
            color: #222;
            margin-bottom: 8px;
        }

        .login-description {
            color: #777;
            font-size: 13px;
            margin-bottom: 28px;
        }

        .form-group {
            margin-bottom: 18px;
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

        .input-wrapper input,
        .input-wrapper select {
            width: 100%;
            height: 44px;
            border: 1px solid #ead6d8;
            border-radius: 8px;
            padding: 0 14px;
            outline: none;
            background: #fff;
            color: #444;
            font-size: 13px;
            transition: 0.2s;
        }

        .input-wrapper input:focus,
        .input-wrapper select:focus {
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

        .remember {
            display: flex;
            align-items: center;
            gap: 7px;
            font-size: 12px;
            color: #555;
            margin: 5px 0 20px;
        }

        .remember input {
            accent-color: #e51f3b;
        }

        .login-button {
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
        }

        .login-button:hover {
            background: #c91830;
        }

        .register-text {
            text-align: center;
            font-size: 12px;
            color: #555;
            margin-top: 18px;
        }

        .register-text a {
            color: #d91e36;
            font-weight: bold;
            text-decoration: none;
        }

        .register-text a:hover {
            text-decoration: underline;
        }

        .error-message {
            background: #fff0f1;
            color: #c91830;
            border: 1px solid #f3c5ca;
            border-radius: 7px;
            padding: 10px 12px;
            margin-bottom: 18px;
            font-size: 12px;
        }

        /* RESPONSIVE */
        @media (max-width: 800px) {
            .login-container {
                min-height: auto;
            }

            .login-left {
                display: none;
            }

            .login-right {
                width: 100%;
                padding: 45px 30px;
            }
        }
    </style>
</head>

<body>

<div class="login-container">

    <!-- BAGIAN KIRI -->
    <div class="login-left">

        <div class="heart one">♥</div>
        <div class="heart two">♥</div>

        <div class="left-content">

            <div class="blood-icon">
                <span>♥</span>
            </div>

            <div class="brand">
                DONORCONNECT
            </div>

            <div class="subtitle">
                Aplikasi Donor Darah<br>
                PMR Sekolah
            </div>

            <div class="welcome-title">
                Donor Darah, Selamatkan Nyawa ❤️
            </div>

            <div class="welcome-text">
                Bersama DONORCONNECT, mari berkontribusi
                untuk membantu sesama melalui kegiatan
                donor darah.
            </div>

        </div>
    </div>


    <!-- BAGIAN KANAN -->
    <div class="login-right">

        <div class="login-box">

            <div class="logo">
                <span class="logo-icon">🩸</span>
                DONORCONNECT
            </div>

            <h1 class="login-title">
                Selamat Datang Kembali! 👋
            </h1>

            <p class="login-description">
                Silakan login untuk melanjutkan.
            </p>

            @if ($errors->any())
                <div class="error-message">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.submit') }}">
                @csrf

                <!-- EMAIL -->
                <div class="form-group">
                    <label for="email">
                        Email / Username
                    </label>

                    <div class="input-wrapper">
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Masukkan email atau username"
                            required
                            autocomplete="email"
                        >
                    </div>
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
                            autocomplete="current-password"
                        >

                        <span
                            class="show-password"
                            onclick="togglePassword()"
                            id="eyeIcon"
                        >
                            👁
                        </span>
                    </div>
                </div>


                <!-- PILIH PERAN -->
                <div class="form-group">
                    <label for="role">
                        Pilih Peran
                    </label>

                    <div class="input-wrapper">
                        <select id="role" name="role">
                            <option value="">Pilih peran Anda</option>
                            <option value="pendonor">Pendonor</option>
                            <option value="petugas">Petugas PMR</option>
                        </select>
                    </div>
                </div>


                <!-- INGAT SAYA -->
                <label class="remember">
                    <input type="checkbox" name="remember">
                    <span>Ingat saya</span>
                </label>


                <!-- BUTTON LOGIN -->
                <button type="submit" class="login-button">
                    Login
                </button>

            </form>


            <!-- REGISTER -->
            <div class="register-text">
                Belum punya akun?
                <a href="{{ route('register') }}">
                    Registrasi di sini
                </a>
            </div>

        </div>

    </div>

</div>


<script>
    function togglePassword() {
        const password = document.getElementById('password');
        const eye = document.getElementById('eyeIcon');

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