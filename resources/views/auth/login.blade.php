@extends('layouts.auth')

@section('title', 'Login - DONORCONNECT')

@push('styles')
    @vite('resources/css/auth/login.css')
@endpush

@section('content')

<div
    class="login-page"
    id="loginPage"
>

    <!-- Background Pendonor -->
    <img
        src="{{ asset('images/2.jpg') }}"
        alt=""
        class="login-background login-background-pendonor"
    >

    <!-- Background Petugas -->
    <img
        src="{{ asset('images/petugas.jpeg') }}"
        alt=""
        class="login-background login-background-petugas"
    >


    <!-- Card Login -->
    <div class="login-card">

        <!-- Header -->
        <div class="login-header">

            <div class="login-icon">
                <i class="fas fa-heart" id="loginIcon"></i>
            </div>

            <h1>DONORCONNECT</h1>

            <h2 id="loginTitle">
                SMKN 2 PURBALINGGA
            </h2>

            <p id="loginDescription">
                Masuk untuk melanjutkan
            </p>

        </div>


        <!-- Error -->
        @if ($errors->any())

            <div class="error-message">
                {{ $errors->first() }}
            </div>

        @endif


        <!-- Form Login -->
        <form
            action="{{ route('login.submit') }}"
            method="POST"
        >

            @csrf


            <!-- Tipe Login -->
            <div class="form-group">

                <label for="tipe_login">
                    Login Sebagai
                </label>

                <select
                    name="tipe_login"
                    id="tipe_login"
                    onchange="ubahLogin()"
                    required
                >

                    <option value="">
                        Pilih jenis login
                    </option>

                    <option
                        value="pendonor"
                        {{ old('tipe_login') == 'pendonor' ? 'selected' : '' }}
                    >
                        Pendonor
                    </option>

                    <option
                        value="petugas"
                        {{ old('tipe_login') == 'petugas' ? 'selected' : '' }}
                    >
                        Petugas PMR
                    </option>

                </select>

            </div>


            <!-- Pendonor -->
            <div id="formPendonor">

                <div class="form-group">

                    <label for="jenis_warga">
                        Status Pengguna
                    </label>

                    <select
                        name="jenis_warga"
                        id="jenis_warga"
                        onchange="ubahIdentitas()"
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
                    >

                </div>

            </div>


            <!-- Petugas -->
            <div
                id="formPetugas"
                style="display: none;"
            >

                <div class="form-group">

                    <label for="nama">
                        Nama
                    </label>

                    <input
                        type="text"
                        name="nama"
                        id="nama"
                        value="{{ old('nama') }}"
                        placeholder="Masukkan nama"
                    >

                </div>


                <div class="form-group">

                    <label for="email">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        id="email"
                        value="{{ old('email') }}"
                        placeholder="Masukkan email"
                    >

                </div>

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


            <!-- Login -->
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

    // Login

    function ubahLogin() {

        const tipe =
            document.getElementById('tipe_login').value;

        const loginPage =
            document.getElementById('loginPage');

        const formPendonor =
            document.getElementById('formPendonor');

        const formPetugas =
            document.getElementById('formPetugas');

        const jenisWarga =
            document.getElementById('jenis_warga');

        const identitas =
            document.getElementById('identitas');

        const nama =
            document.getElementById('nama');

        const email =
            document.getElementById('email');

        const loginIcon =
            document.getElementById('loginIcon');

        const loginTitle =
            document.getElementById('loginTitle');

        const loginDescription =
            document.getElementById('loginDescription');


        loginPage.classList.remove(
            'login-pendonor',
            'login-petugas'
        );


        if (tipe === 'petugas') {

            loginPage.classList.add('login-petugas');

            formPendonor.style.display = 'none';
            formPetugas.style.display = 'block';

            jenisWarga.required = false;
            identitas.required = false;

            nama.required = true;
            email.required = true;

            loginIcon.className =
                'fas fa-user-shield';

            loginTitle.textContent =
                'PETUGAS PMR';

            loginDescription.textContent =
                'Masuk ke sistem pengelolaan donor';

        }

        else if (tipe === 'pendonor') {

            loginPage.classList.add('login-pendonor');

            formPendonor.style.display = 'block';
            formPetugas.style.display = 'none';

            jenisWarga.required = true;
            identitas.required = true;

            nama.required = false;
            email.required = false;

            loginIcon.className =
                'fas fa-heart';

            loginTitle.textContent =
                'SMKN 2 PURBALINGGA';

            loginDescription.textContent =
                'Masuk untuk melanjutkan';

        }

        else {

            formPendonor.style.display = 'block';
            formPetugas.style.display = 'none';

            jenisWarga.required = false;
            identitas.required = false;

            nama.required = false;
            email.required = false;

            loginIcon.className =
                'fas fa-heart';

            loginTitle.textContent =
                'SMKN 2 PURBALINGGA';

            loginDescription.textContent =
                'Masuk untuk melanjutkan';

        }

    }


    // Identitas

    function ubahIdentitas() {

        const jenis =
            document.getElementById('jenis_warga').value;

        const label =
            document.getElementById('labelIdentitas');

        const input =
            document.getElementById('identitas');


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

            label.textContent =
                'NIS / NIP / ID Pegawai';

            input.placeholder =
                'Masukkan identitas';

        }

    }


    // Password

    function togglePassword() {

        const password =
            document.getElementById('password');

        const icon =
            document.getElementById('eyeIcon');


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


    // Saat halaman dibuka

    document.addEventListener(
        'DOMContentLoaded',
        function () {

            ubahLogin();
            ubahIdentitas();

        }
    );

</script>

@endsection