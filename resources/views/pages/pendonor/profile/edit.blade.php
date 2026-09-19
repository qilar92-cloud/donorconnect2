@extends('layouts.app')

@section('title', 'Ubah Profil - DonorConnect')

@push('styles')
    @vite('resources/css/pendonor/profile-edit.css')
@endpush

@section('content')

<div class="edit-page">

    {{-- Error --}}
    @if($errors->any())

        <div class="alert alert-danger">
            <i class="fas fa-exclamation-circle"></i>

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif


    {{-- Card --}}
    <div class="edit-card">

        {{-- Header --}}
        <div class="edit-card-header">

            <div class="header-icon">
                <i class="fas fa-user-edit"></i>
            </div>

            <div>
                <h2>Ubah Profil</h2>

                @if(isset($pendonor))
                    <span>Perbarui data pribadi pendonor.</span>
                @elseif(isset($petugas))
                    <span>Perbarui data akun petugas PMR.</span>
                @endif
            </div>

        </div>


        {{-- Form --}}
        <form
            action="{{ isset($pendonor)
                ? route('profile.pendonor.update')
                : route('profile.petugas.update') }}"
            method="POST"
        >

            @csrf
            @method('PUT')


            <div class="edit-body">

                {{-- Pendonor --}}
                @if(isset($pendonor))

                    <div class="form-row">
                        <label>Nama Lengkap</label>

                        <input
                            type="text"
                            name="nama"
                            value="{{ old('nama', $user->nama ?? '') }}"
                            required
                        >
                    </div>


                    <div class="form-row">
                        <label>Email</label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email', $user->email ?? '') }}"
                            required
                        >
                    </div>


                    <div class="form-row">
                        <label>Status</label>

                        <input
                            type="text"
                            name="status"
                            value="{{ old('status', $pendonor->status ?? '') }}"
                            required
                        >
                    </div>


                    <div class="form-row">
                        <label>Kelas / Jabatan</label>

                        <input
                            type="text"
                            name="kelas_jabatan"
                            value="{{ old('kelas_jabatan', $pendonor->kelas_jabatan ?? '') }}"
                            required
                        >
                    </div>


                    <div class="form-row">
                        <label>Tanggal Lahir</label>

                        <input
                            type="date"
                            name="tanggal_lahir"
                            value="{{ old(
                                'tanggal_lahir',
                                $pendonor->tanggal_lahir
                                    ? \Carbon\Carbon::parse($pendonor->tanggal_lahir)->format('Y-m-d')
                                    : ''
                            ) }}"
                            required
                        >
                    </div>


                    <div class="form-row">
                        <label>Golongan Darah</label>

                        <input
                            type="text"
                            name="golongan_darah"
                            value="{{ old('golongan_darah', $pendonor->golongan_darah ?? '') }}"
                            required
                        >
                    </div>


                    <div class="form-row">
                        <label>No. Telepon</label>

                        <input
                            type="text"
                            name="nomor_telepon"
                            value="{{ old('nomor_telepon', $pendonor->nomor_telepon ?? '') }}"
                            required
                        >
                    </div>


                    <div class="form-row">
                        <label>Informasi Kesehatan</label>

                        <input
                            type="text"
                            name="informasi_kesehatan"
                            value="{{ old('informasi_kesehatan', $pendonor->informasi_kesehatan ?? '') }}"
                            required
                        >
                    </div>


                {{-- Petugas --}}
                @elseif(isset($petugas))

                    <div class="form-row">
                        <label>Nama Lengkap</label>

                        <input
                            type="text"
                            name="nama"
                            value="{{ old('nama', $user->nama ?? '') }}"
                            required
                        >
                    </div>


                    <div class="form-row">
                        <label>Email</label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email', $user->email ?? '') }}"
                            required
                        >
                    </div>

                @endif

            </div>


            {{-- Footer --}}
            <div class="edit-footer">

                <button
                    type="submit"
                    class="save-button"
                >
                    <i class="fas fa-save"></i>
                    Simpan Perubahan
                </button>

                <a
                    href="{{ isset($pendonor)
                        ? route('profile.pendonor')
                        : route('profile.petugas') }}"
                    class="cancel-button"
                >
                    Batal
                </a>

            </div>

        </form>

    </div>

</div>

@endsection