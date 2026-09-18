@extends('layouts.app')

@section('title', 'Ubah Profil - DonorConnect')

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

            <div>
                <h1>Ubah Profil</h1>
                <p>Perbarui informasi akun kamu</p>
            </div>

        </div>

        <div class="edit-body">

            <form action="{{ route('profile.petugas.update') }}" method="POST">

                @csrf
                @method('PUT')

                {{-- Data Pendonor --}}
                @if(isset($pendonor))

                    <div class="form-section">

                        {{-- Nama --}}
                        <div class="form-group">

                            <label>Nama Lengkap</label>

                            <div class="input-box">
                                <i class="fas fa-user"></i>

                                <input
                                    type="text"
                                    value="{{ $pendonor->user->nama ?? '' }}"
                                    disabled
                                >
                            </div>

                        </div>

                        {{-- Status --}}
                        <div class="form-group">

                            <label>Status</label>

                            <div class="input-box">
                                <i class="fas fa-user-tag"></i>

                                <input
                                    type="text"
                                    name="status"
                                    value="{{ old('status', $pendonor->status) }}"
                                    placeholder="Masukkan status"
                                    required
                                >
                            </div>

                            @error('status')
                                <small class="error-text">{{ $message }}</small>
                            @enderror

                        </div>

                        {{-- Kelas / Jabatan --}}
                        <div class="form-group">

                            <label>Kelas / Jabatan</label>

                            <div class="input-box">
                                <i class="fas fa-briefcase"></i>

                                <input
                                    type="text"
                                    name="kelas_jabatan"
                                    value="{{ old('kelas_jabatan', $pendonor->kelas_jabatan) }}"
                                    placeholder="Masukkan kelas atau jabatan"
                                    required
                                >
                            </div>

                            @error('kelas_jabatan')
                                <small class="error-text">{{ $message }}</small>
                            @enderror

                        </div>

                        {{-- Tanggal Lahir --}}
                        <div class="form-group">

                            <label>Tanggal Lahir</label>

                            <div class="input-box">
                                <i class="fas fa-calendar-alt"></i>

                                <input
                                    type="date"
                                    name="tanggal_lahir"
                                    value="{{ old('tanggal_lahir', $pendonor->tanggal_lahir) }}"
                                    required
                                >
                            </div>

                            @error('tanggal_lahir')
                                <small class="error-text">{{ $message }}</small>
                            @enderror

                        </div>

                        {{-- Golongan Darah --}}
                        <div class="form-group">

                            <label>Golongan Darah</label>

                            <div class="input-box">
                                <i class="fas fa-tint"></i>

                                <input
                                    type="text"
                                    name="golongan_darah"
                                    value="{{ old('golongan_darah', $pendonor->golongan_darah) }}"
                                    placeholder="Contoh: A+"
                                    required
                                >
                            </div>

                            @error('golongan_darah')
                                <small class="error-text">{{ $message }}</small>
                            @enderror

                        </div>

                        {{-- Nomor Telepon --}}
                        <div class="form-group">

                            <label>Nomor Telepon</label>

                            <div class="input-box">
                                <i class="fas fa-phone"></i>

                                <input
                                    type="text"
                                    name="nomor_telepon"
                                    value="{{ old('nomor_telepon', $pendonor->nomor_telepon) }}"
                                    placeholder="Masukkan nomor telepon"
                                    required
                                >
                            </div>

                            @error('nomor_telepon')
                                <small class="error-text">{{ $message }}</small>
                            @enderror

                        </div>

                        {{-- Informasi Kesehatan --}}
                        <div class="form-group">

                            <label>Informasi Kesehatan</label>

                            <div class="textarea-box">
                                <i class="fas fa-notes-medical"></i>

                                <textarea
                                    name="informasi_kesehatan"
                                    rows="4"
                                    placeholder="Masukkan informasi kesehatan"
                                    required
                                >{{ old('informasi_kesehatan', $pendonor->informasi_kesehatan) }}</textarea>
                            </div>

                            @error('informasi_kesehatan')
                                <small class="error-text">{{ $message }}</small>
                            @enderror

                        </div>

                    </div>

                {{-- Data Petugas --}}
                @elseif(isset($petugas))

                    <div class="form-section">

                        {{-- Nama --}}
                        <div class="form-group">

                            <label>Nama Lengkap</label>

                            <div class="input-box">
                                <i class="fas fa-user"></i>

                                <input
                                    type="text"
                                    name="nama"
                                    value="{{ old('nama', $user->nama) }}"
                                    placeholder="Masukkan nama lengkap"
                                    required
                                >
                            </div>

                            @error('nama')
                                <small class="error-text">{{ $message }}</small>
                            @enderror

                        </div>

                        {{-- Email --}}
                        <div class="form-group">

                            <label>Email</label>

                            <div class="input-box">
                                <i class="fas fa-envelope"></i>

                                <input
                                    type="email"
                                    name="email"
                                    value="{{ old('email', $user->email) }}"
                                    placeholder="Masukkan email"
                                    required
                                >
                            </div>

                            @error('email')
                                <small class="error-text">{{ $message }}</small>
                            @enderror

                        </div>

                    </div>

                @endif

                {{-- Tombol --}}
                <div class="form-footer">

                    <a
                        href="{{ route('profile.petugas') }}"
                        class="cancel-button"
                    >
                        <i class="fas fa-arrow-left"></i>
                        Kembali
                    </a>

                    <button type="submit" class="save-button">
                        <i class="fas fa-check"></i>
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection