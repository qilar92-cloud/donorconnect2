@extends('layouts.auth')

@section('title', 'Register - DONORCONNECT')

@push('styles')
    @vite('resources/css/auth/register.css')
@endpush

@section('content')

<div class="register-page">

    <!-- Background -->
    <img
        src="{{ asset('images/smakda.jpeg') }}"
        alt=""
        class="register-background"
    >

    <!-- Card Register -->
    <div class="register-card">

        <!-- Header -->
        <div class="register-header">

            <div class="register-icon">
                <i class="fas fa-heart"></i>
            </div>

            <h1>DONORCONNECT</h1>

            <h2>SMKN 2 PURBALINGGA</h2>

            <p>Buat akun untuk mulai berdonor</p>

        </div>


        <!-- Error -->
        @if ($errors->any())

            <div class="error-message">
                {{ $errors->first() }}
            </div>

        @endif


        <!-- Form Register -->
        <form
            action="{{ route('register.submit') }}"
            method="POST"
        >

            @csrf


            <!-- Nama Lengkap -->
            <div class="form-group">

                <label for="nama">
                    Nama Lengkap
                </label>

                <input
                    type="text"
                    name="nama"
                    id="nama"
                    value="{{ old('nama') }}"
                    placeholder="Masukkan nama lengkap"
                    required
                >

            </div>


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


            <!-- Email -->
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
                        placeholder="Minimal 6 karakter"
                        required
                    >

                    <button
                        type="button"
                        class="password-toggle"
                        onclick="togglePassword('password', 'eyeIcon')"
                        aria-label="Tampilkan password"
                    >

                        <i
                            class="fas fa-eye"
                            id="eyeIcon"
                        ></i>

                    </button>

                </div>

            </div>


            <!-- Konfirmasi Password -->
            <div class="form-group">

                <label for="password_confirmation">
                    Konfirmasi Password
                </label>

                <div class="password-box">

                    <input
                        type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        placeholder="Ulangi password"
                        required
                    >

                    <button
                        type="button"
                        class="password-toggle"
                        onclick="togglePassword(
                            'password_confirmation',
                            'eyeIconConfirm'
                        )"
                        aria-label="Tampilkan konfirmasi password"
                    >

                        <i
                            class="fas fa-eye"
                            id="eyeIconConfirm"
                        ></i>

                    </button>

                </div>

            </div>


            <!-- Register -->
            <button
                type="submit"
                class="register-button"
            >
                REGISTER
            </button>

        </form>


        <!-- Login -->
        <div class="login-link">

            Sudah punya akun?

            <a href="{{ route('login') }}">
                LOGIN
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


    function togglePassword(inputId, iconId) {

        const input =
            document.getElementById(inputId);

        const icon =
            document.getElementById(iconId);


        if (input.type === 'password') {

            input.type = 'text';

            icon.classList.remove('fa-eye');

            icon.classList.add('fa-eye-slash');

        }

        else {

            input.type = 'password';

            icon.classList.remove('fa-eye-slash');

            icon.classList.add('fa-eye');

        }

    }


    document.addEventListener(
        'DOMContentLoaded',
        function () {

            ubahIdentitas();

        }
    );

</script>

@endsection