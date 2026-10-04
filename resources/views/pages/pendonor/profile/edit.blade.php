@extends('layouts.pendonor')

@section('title', 'Ubah Profil - DonorConnect')

@push('styles')
    @vite('resources/css/pendonor/profile-edit.css')
@endpush

@section('content')

<div class="edit-page">

    {{-- Card Edit Profil --}}
    <div class="edit-card">

        {{-- Header --}}
        <div class="edit-card-header">

            <div class="header-icon">
                <i class="fas fa-user-edit"></i>
            </div>

            <div>

                <h2>
                    Ubah Profil
                </h2>

                <span>
                    Perbarui data pribadi pendonor.
                </span>

            </div>

        </div>


        {{-- Form --}}
        <form
            action="{{ route('profile.pendonor.update') }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            <div class="edit-body">

                @if(isset($pendonor))

                    {{-- Nama Lengkap --}}
                    <div class="form-row">

                        <label for="nama">
                            Nama Lengkap
                        </label>

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


                    {{-- Email --}}
                    <div class="form-row">

                        <label for="email">
                            Email
                        </label>

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


                    {{-- Status --}}
                    <div class="form-row">

                        <label for="status">
                            Status
                        </label>

                        <input
                            type="text"
                            id="status"
                            name="status"
                            value="{{ old('status', $pendonor->status ?? '') }}"
                            placeholder="Masukkan status"
                            required
                        >

                    </div>


                    {{-- Kelas / Jabatan --}}
                    <div class="form-row">

                        <label for="kelas_jabatan">
                            Kelas / Jabatan
                        </label>

                        <input
                            type="text"
                            id="kelas_jabatan"
                            name="kelas_jabatan"
                            value="{{ old('kelas_jabatan', $pendonor->kelas_jabatan ?? '') }}"
                            placeholder="Masukkan kelas atau jabatan"
                            required
                        >

                    </div>


                    {{-- Tanggal Lahir --}}
                    <div class="form-row">

                        <label for="tanggal_lahir">
                            Tanggal Lahir
                        </label>

                        <input
                            type="date"
                            id="tanggal_lahir"
                            name="tanggal_lahir"
                            value="{{ old(
                                'tanggal_lahir',
                                !empty($pendonor->tanggal_lahir)
                                    ? \Carbon\Carbon::parse($pendonor->tanggal_lahir)->format('Y-m-d')
                                    : ''
                            ) }}"
                            required
                        >

                    </div>


                    {{-- Golongan Darah --}}
                    <div class="form-row">

                        <label for="golongan_darah">
                            Golongan Darah
                        </label>

                        <input
                            type="text"
                            id="golongan_darah"
                            name="golongan_darah"
                            value="{{ old('golongan_darah', $pendonor->golongan_darah ?? '') }}"
                            placeholder="Contoh: A, B, AB, O"
                            required
                        >

                    </div>


                    {{-- Nomor Telepon --}}
                    <div class="form-row">

                        <label for="nomor_telepon">
                            No. Telepon
                        </label>

                        <input
                            type="text"
                            id="nomor_telepon"
                            name="nomor_telepon"
                            value="{{ old('nomor_telepon', $pendonor->nomor_telepon ?? '') }}"
                            placeholder="Masukkan nomor telepon"
                            autocomplete="tel"
                            required
                        >

                    </div>


                    {{-- Informasi Kesehatan --}}
                    <div class="form-row">

                        <label for="informasi_kesehatan">
                            Informasi Kesehatan
                        </label>

                        <input
                            type="text"
                            id="informasi_kesehatan"
                            name="informasi_kesehatan"
                            value="{{ old('informasi_kesehatan', $pendonor->informasi_kesehatan ?? '') }}"
                            placeholder="Masukkan informasi kesehatan"
                            required
                        >

                    </div>


                @else

                    {{-- Data profil tidak ditemukan --}}
                    <div class="empty-profile">

                        <div class="empty-icon">
                            <i class="fas fa-user-slash"></i>
                        </div>

                        <h3>
                            Data profil tidak ditemukan
                        </h3>

                        <p>
                            Data profil pendonor belum tersedia.
                        </p>

                    </div>

                @endif

            </div>


            {{-- Footer --}}
            <div class="edit-footer">

                {{-- Tombol Kembali --}}
                <a
                    href="{{ route('profile.pendonor') }}"
                    class="cancel-button"
                >

                    <i class="fas fa-arrow-left"></i>

                    <span>
                        Kembali
                    </span>

                </a>


                {{-- Tombol Simpan --}}
                @if(isset($pendonor))

                    <button
                        type="submit"
                        class="save-button"
                    >

                        <i class="fas fa-save"></i>

                        <span>
                            Simpan Perubahan
                        </span>

                    </button>

                @endif

            </div>

        </form>

    </div>

</div>

@endsection

