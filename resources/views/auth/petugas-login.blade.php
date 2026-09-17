@extends('layouts.auth')

@section('title', 'Login Petugas - DONORCONNECT')

@push('styles')
    @vite('resources/css/auth/petugas-login.css')
@endpush

@section('content')

<div class="login-page">

    <img
        src="{{ asset('images/petugas.jpeg') }}"
        alt=""
        class="login-background"
    >

    <div class="login-card">

        <div class="login-header">

            <div class="login-icon">
                <i class="fas fa-user-shield"></i>
            </div>

            <h1>DONORCONNECT</h1>

            <h2>PETUGAS PMR</h2>

            <p>
                Masuk ke sistem pengelolaan donor
            </p>

            <div class="petugas-badge">
                AKSES KHUSUS PETUGAS
            </div>

        </div>

        @if ($errors->any())

            <div class="error-message">

                <i class="fas fa-circle-exclamation"></i>

                <span>
                    {{ $errors->first() }}
                </span>

            </div>

        @endif

        <form
            action="{{ route('login.petugas.submit') }}"
            method="POST"
        >

            @csrf

            <div class="form-group">

                <label for="email">
                    Email Petugas
                </label>

                <div class="input-wrapper">

                    <i class="fas fa-envelope input-icon"></i>

                    <input
                        type="email"
                        name="email"
                        id="email"
                        value="{{ old('email') }}"
                        placeholder="Masukkan email petugas"
                        required
                        autofocus
                    >

                </div>

            </div>

            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <div class="password-box">

                    <i class="fas fa-lock input-icon"></i>

                    <input
                        type="password"
                        name="password"
                        id="password"
                        placeholder="Masukkan password"
                        required
                    >

                    <button
                        type="button"
                        class="password-toggle"
                        onclick="togglePassword()"
                        aria-label="Tampilkan password"
                    >

                        <i
                            class="fas fa-eye"
                            id="eyeIcon"
                        ></i>

                    </button>

                </div>

            </div>

            <button
                type="submit"
                class="login-button"
            >

                <i class="fas fa-right-to-bracket"></i>

                LOGIN

            </button>

        </form>

        <div class="login-footer">

            DonorConnect &bull;
            <span>SMKN 2 Purbalingga</span>

            <br>

            Sistem Informasi Donor Darah

        </div>

    </div>

</div>

<script>
    function togglePassword() {
        const input = document.getElementById('password');
        const icon = document.getElementById('eyeIcon');

        if (input.type === 'password') {
            input.type = 'text';

            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';

            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>

@endsection