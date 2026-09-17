@extends('layouts.auth')

@section('title', 'Login - DONORCONNECT')

@push('styles')
    @vite('resources/css/auth/login.css')
@endpush

@section('content')

<div class="login-page">

    <!-- Background -->
    <img
        src="{{ asset('images/2.jpg') }}"
        alt=""
        class="login-background"
    >

    <!-- Card Login -->
    <div class="login-card">

        <!-- Header -->
        <div class="login-header">

            <div class="login-icon">
                <i class="fas fa-heart"></i>
            </div>

            <h1>DONORCONNECT</h1>

            <h2>SMKN 2 PURBALINGGA</h2>

            <p>Masuk untuk melanjutkan</p>

        </div>


        <!-- Error -->
        @if ($errors->any())

            <div class="error-message">
                {{ $errors->first() }}
            </div>

        @endif


        <!-- Form Login -->
        <form action="{{ route('login.submit') }}" method="POST">

            @csrf


            <!-- Status Pengguna -->
            <div class="form-group">

                <label for="jenis_warga">
                    Status Pengguna
                </label>

                <select
                    name="jenis_warga"
                    id="jenis_warga"
                    onchange="ubahIdentitas()"
                    required
                >

                    <option value="">
                        Pilih status pengguna
                    </option>

                    <option
                        value="siswa"
                        {{ old('jenis_warga') == 'siswa' ? 'selected' : '' }}
                    >
                        Siswa
                    </option>

                    <option
                        value="guru"
                        {{ old('jenis_warga') == 'guru' ? 'selected' : '' }}
                    >
                        Guru
                    </option>

                    <option
                        value="karyawan"
                        {{ old('jenis_warga') == 'karyawan' ? 'selected' : '' }}
                    >
                        Karyawan
                    </option>

                </select>

            </div>


            <!-- Identitas -->
            <div class="form-group">

                <label
                    for="identitas"
                    id="labelIdentitas"
                >
                    NIS / NIP / ID Pegawai
                </label>

                <input
                    type="text"
                    name="identitas"
                    id="identitas"
                    value="{{ old('identitas') }}"
                    placeholder="Masukkan identitas"
                    required
                >

            </div>


            <!-- Password -->
            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <div class="password-box">

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


            <!-- Ingat Saya -->
            <label class="remember">

                <input
                    type="checkbox"
                    name="remember"
                    value="1"
                >

                <span>Ingat saya</span>

            </label>


            <!-- Tombol Login -->
            <button
                type="submit"
                class="login-button"
            >
                LOGIN
            </button>

        </form>


        <!-- Register -->
        <div class="register-link">

            Belum punya akun?

            <a href="{{ route('register') }}">
                REGISTER
            </a>

        </div>


        <!-- Kembali -->
        <div class="back-link">

            <a href="{{ route('landing') }}">

                <i class="fas fa-arrow-left"></i>

                Kembali ke halaman utama

            </a>

        </div>

    </div>

</div>


<script>

    function ubahIdentitas() {

        const jenis = document.getElementById('jenis_warga').value;
        const label = document.getElementById('labelIdentitas');
        const input = document.getElementById('identitas');


        if (jenis === 'siswa') {

            label.textContent = 'NIS';
            input.placeholder = 'Masukkan NIS';

        }

        else if (jenis === 'guru') {

            label.textContent = 'NIP';
            input.placeholder = 'Masukkan NIP';

        }

        else if (jenis === 'karyawan') {

            label.textContent = 'ID Pegawai';
            input.placeholder = 'Masukkan ID Pegawai';

        }

        else {

            label.textContent = 'NIS / NIP / ID Pegawai';
            input.placeholder = 'Masukkan identitas';

        }

    }


    function togglePassword() {

        const password = document.getElementById('password');
        const icon = document.getElementById('eyeIcon');


        if (password.type === 'password') {

            password.type = 'text';

            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');

        }

        else {

            password.type = 'password';

            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');

        }

    }


    document.addEventListener('DOMContentLoaded', function () {

        ubahIdentitas();

    });

</script>

@endsection