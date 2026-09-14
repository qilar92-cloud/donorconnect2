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
        }

        body {
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            background: #fff7f5;
        }

        .login-page {
            min-height: 100vh;
            padding: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            width: 100%;
            max-width: 1050px;
            min-height: 620px;
            display: flex;
            overflow: hidden;
            background: #fff;
            border-radius: 24px;
            box-shadow: 0 15px 40px rgba(180, 30, 50, .12);
        }

        .login-left {
            width: 46%;
            padding: 50px;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            background: linear-gradient(145deg, #fff0f1, #ffe1e4, #fff7f5);
        }

        .login-left::before,
        .login-left::after {
            content: "";
            position: absolute;
            border-radius: 50%;
            background: #ffd1d6;
            opacity: .45;
        }

        .login-left::before {
            width: 280px;
            height: 280px;
            top: -130px;
            left: -110px;
        }

        .login-left::after {
            width: 230px;
            height: 230px;
            right: -80px;
            bottom: -110px;
        }

        .left-content {
            position: relative;
            z-index: 2;
        }

        .blood-icon {
            width: 90px;
            height: 90px;
            margin: 0 auto 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #e51f3b;
            border-radius: 50% 50% 50% 10px;
            transform: rotate(-45deg);
            box-shadow: 0 8px 20px rgba(229, 31, 59, .2);
        }

        .blood-icon span {
            color: #fff;
            font-size: 40px;
            transform: rotate(45deg);
        }

        .brand {
            margin-bottom: 8px;
            color: #d91e36;
            font-size: 27px;
            font-weight: 800;
        }

        .subtitle {
            margin-bottom: 35px;
            color: #666;
            font-size: 14px;
            line-height: 1.6;
        }

        .welcome-title {
            margin-bottom: 12px;
            color: #d91e36;
            font-size: 24px;
            font-weight: 700;
        }

        .welcome-text {
            max-width: 350px;
            margin: auto;
            color: #555;
            font-size: 14px;
            line-height: 1.8;
        }

        .heart {
            position: absolute;
            color: #e99aa4;
            font-size: 34px;
            opacity: .55;
        }

        .heart-one {
            top: 65px;
            right: 50px;
        }

        .heart-two {
            bottom: 75px;
            left: 50px;
        }

        .login-right {
            width: 54%;
            padding: 55px 65px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-box {
            width: 100%;
            max-width: 420px;
        }

        .login-logo {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 32px;
            color: #d91e36;
            font-size: 22px;
            font-weight: 800;
        }

        .login-logo-icon {
            font-size: 27px;
        }

        .login-title {
            margin-bottom: 8px;
            color: #222;
            font-size: 28px;
        }

        .login-description {
            margin-bottom: 25px;
            color: #777;
            font-size: 13px;
        }

        .error-message {
            margin-bottom: 18px;
            padding: 11px 13px;
            border: 1px solid #f3c5ca;
            border-radius: 8px;
            background: #fff0f1;
            color: #c91830;
            font-size: 12px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 7px;
            color: #333;
            font-size: 13px;
            font-weight: 700;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper input,
        .input-wrapper select {
            width: 100%;
            height: 46px;
            padding: 0 14px;
            border: 1px solid #e5d5d7;
            border-radius: 8px;
            outline: none;
            background: #fff;
            color: #333;
            font-size: 13px;
        }

        .input-wrapper input:focus,
        .input-wrapper select:focus {
            border-color: #e51f3b;
            box-shadow: 0 0 0 3px rgba(229, 31, 59, .08);
        }

        .password-input {
            padding-right: 45px !important;
        }

        .show-password {
            position: absolute;
            top: 50%;
            right: 14px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #777;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 7px;
            margin: 3px 0 20px;
            color: #555;
            font-size: 12px;
        }

        .remember input {
            accent-color: #e51f3b;
        }

        .login-button {
            width: 100%;
            height: 46px;
            border: 0;
            border-radius: 8px;
            background: #e51f3b;
            color: #fff;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
        }

        .login-button:hover {
            background: #c91830;
        }

        .register-text {
            margin-top: 18px;
            text-align: center;
            color: #666;
            font-size: 12px;
        }

        .register-text a {
            color: #d91e36;
            font-weight: 700;
            text-decoration: none;
        }

        @media (max-width: 850px) {
            .login-container {
                max-width: 600px;
            }

            .login-left {
                display: none;
            }

            .login-right {
                width: 100%;
                padding: 50px 40px;
            }
        }

        @media (max-width: 500px) {
            .login-page {
                padding: 15px;
            }

            .login-container {
                border-radius: 18px;
            }

            .login-right {
                padding: 40px 25px;
            }

            .login-title {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

<div class="login-page">

    <div class="login-container">

        <div class="login-left">

            <span class="heart heart-one">♥</span>
            <span class="heart heart-two">♥</span>

            <div class="left-content">

                <div class="blood-icon">
                    <span>♥</span>
                </div>

                <div class="brand">DONORCONNECT</div>

                <div class="subtitle">
                    Aplikasi Donor Darah<br>
                    PMR Sekolah
                </div>

                <h2 class="welcome-title">
                    Donor Darah, Selamatkan Nyawa ❤️
                </h2>

                <p class="welcome-text">
                    Bersama DONORCONNECT, mari berkontribusi
                    untuk membantu sesama melalui kegiatan
                    donor darah.
                </p>

            </div>
        </div>

        <div class="login-right">

            <div class="login-box">

                <div class="login-logo">
                    <span class="login-logo-icon">🩸</span>
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

                    <div class="form-group">
                        <label for="email">Email</label>

                        <div class="input-wrapper">
                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="Masukkan email"
                                required
                            >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>

                        <div class="input-wrapper">
                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="password-input"
                                placeholder="Masukkan password"
                                required
                            >

                            <span
                                class="show-password"
                                id="eyeIcon"
                                onclick="togglePassword()"
                            >👁</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="role">Pilih Peran</label>

                        <div class="input-wrapper">
                            <select id="role" name="role" required>

                                <option value="">
                                    Pilih peran Anda
                                </option>

                                <option
                                    value="pendonor"
                                    {{ old('role') == 'pendonor' ? 'selected' : '' }}
                                >
                                    Pendonor
                                </option>

                                <option
                                    value="petugas"
                                    {{ old('role') == 'petugas' ? 'selected' : '' }}
                                >
                                    Petugas PMR
                                </option>

                            </select>
                        </div>
                    </div>

                    <label class="remember">
                        <input type="checkbox" name="remember" value="1">
                        Ingat saya
                    </label>

                    <button type="submit" class="login-button">
                        Login
                    </button>

                </form>

                <div class="register-text">
                    Belum punya akun?
                    <a href="{{ route('register') }}">
                        Registrasi di sini
                    </a>
                </div>

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