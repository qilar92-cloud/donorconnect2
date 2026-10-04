@extends('layouts.app')

@section('title', 'Ubah Profil Petugas - DONORCONNECT')

@push('styles')
    @vite('resources/css/petugas/profile-edit.css')
@endpush

@section('content')

<div class="edit-profile-page">

    <div class="edit-card">

        {{-- Header --}}
        <div class="edit-header">

            <div class="header-icon">
                <i class="fas fa-user-edit"></i>
            </div>

            <div class="header-content">

                <span class="header-label">
                    PROFIL PETUGAS
                </span>

                <h1>Ubah Profil</h1>

                <p>
                    Perbarui informasi profil petugas kamu.
                </p>

            </div>

        </div>

        {{-- Body --}}
        <div class="edit-body">

            {{-- Error --}}
            @if ($errors->any())

                <div class="alert-danger">

                    <i class="fas fa-exclamation-circle"></i>

                    <div>

                        <strong>
                            Periksa kembali data yang dimasukkan.
                        </strong>

                        <ul>
                            @foreach ($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach
                        </ul>

                    </div>

                </div>

            @endif

            <form
                action="{{ route('profile.petugas.update') }}"
                method="POST"
            >

                @csrf
                @method('PUT')

                {{-- Data Petugas --}}
                @if(isset($petugas))

                    <div class="form-section">

                        {{-- Nama Lengkap --}}
                        <div class="form-group">

                            <label for="nama">
                                Nama Lengkap
                            </label>

                            <div class="input-box">

                                <i class="fas fa-user"></i>

                                <input
                                    type="text"
                                    id="nama"
                                    name="nama"
                                    value="{{ old('nama', $user->nama ?? '') }}"
                                    placeholder="Masukkan nama lengkap"
                                    autocomplete="name"
                                    required
                                >

                            </div>

                            @error('nama')
                                <small class="error-text">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                        {{-- Email --}}
                        <div class="form-group">

                            <label for="email">
                                Email
                            </label>

                            <div class="input-box">

                                <i class="fas fa-envelope"></i>

                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    value="{{ old('email', $user->email ?? '') }}"
                                    placeholder="Masukkan email"
                                    autocomplete="email"
                                    required
                                >

                            </div>

                            @error('email')
                                <small class="error-text">
                                    {{ $message }}
                                </small>
                            @enderror

                        </div>

                    </div>

                @else

                    {{-- Jika data petugas tidak ditemukan --}}
                    <div class="empty-profile">

                        <div class="empty-icon">
                            <i class="fas fa-user-slash"></i>
                        </div>

                        <h3>
                            Data profil tidak ditemukan
                        </h3>

                        <p>
                            Data profil petugas belum tersedia.
                        </p>

                    </div>

                @endif

                {{-- Tombol --}}
                <div class="form-footer">

                    <a
                        href="{{ route('profile.petugas') }}"
                        class="cancel-button"
                    >
                        <i class="fas fa-arrow-left"></i>
                        <span>Kembali</span>
                    </a>

                    @if(isset($petugas))

                        <button
                            type="submit"
                            class="save-button"
                        >
                            <i class="fas fa-check"></i>
                            <span>Simpan Perubahan</span>
                        </button>

                    @endif

                </div>

            </form>

        </div>

    </div>

</div>

@endsection

