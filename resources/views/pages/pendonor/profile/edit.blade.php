@extends('layouts.app')

@section('title', 'Ubah Profil - DonorConnect')

@push('styles')
    @vite('resources/css/pendonor/profile-edit.css')
@endpush

@section('content')

<div class="edit-page">

    {{-- Judul --}}
    <div class="page-title">

        <h1>Ubah Profil</h1>

        @if(isset($pendonor))

            <p>
                Perbarui informasi profil pendonor.
            </p>

        @elseif(isset($petugas))

            <p>
                Perbarui informasi profil petugas PMR.
            </p>

        @endif

    </div>


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


    <div class="edit-card">

        {{-- Header --}}
        <div class="edit-card-header">

            <div class="header-icon">
                <i class="fas fa-user-edit"></i>
            </div>

            <div>

                <h2>Ubah Profil</h2>

                @if(isset($pendonor))

                    <span>
                        Perbarui data pribadi pendonor.
                    </span>

                @elseif(isset($petugas))

                    <span>
                        Perbarui data akun petugas PMR.
                    </span>

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

                    {{-- Nama --}}
                    <div class="form-row">

                        <label>
                            Nama Lengkap
                        </label>

                        <input
                            type="text"
                            name="nama"
                            value="{{ old('nama', $user->nama ?? $pendonor->user->nama ?? '') }}"
                            required
                        >

                    </div>


                    {{-- Email --}}
                    <div class="form-row">

                        <label>
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email', $user->email ?? $pendonor->user->email ?? '') }}"
                            required
                        >

                    </div>


                    {{-- Status --}}
                    <div class="form-row">

                        <label>
                            Status
                        </label>

                        <input
                            type="text"
                            name="status"
                            value="{{ old('status', $pendonor->status ?? '') }}"
                            required
                        >

                    </div>


                    {{-- Kelas / Jabatan --}}
                    <div class="form-row">

                        <label>
                            Kelas / Jabatan
                        </label>

                        <input
                            type="text"
                            name="kelas_jabatan"
                            value="{{ old('kelas_jabatan', $pendonor->kelas_jabatan ?? '') }}"
                            required
                        >

                    </div>


                    {{-- Tanggal Lahir --}}
                    <div class="form-row">

                        <label>
                            Tanggal Lahir
                        </label>

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


                    {{-- Golongan Darah --}}
                    <div class="form-row">

                        <label>
                            Golongan Darah
                        </label>

                        <input
                            type="text"
                            name="golongan_darah"
                            value="{{ old('golongan_darah', $pendonor->golongan_darah ?? '') }}"
                            required
                        >

                    </div>


                    {{-- No. Telepon --}}
                    <div class="form-row">

                        <label>
                            No. Telepon
                        </label>

                        <input
                            type="text"
                            name="nomor_telepon"
                            value="{{ old('nomor_telepon', $pendonor->nomor_telepon ?? '') }}"
                            required
                        >

                    </div>


                    {{-- Informasi Kesehatan --}}
                    <div class="form-row">

                        <label>
                            Informasi Kesehatan
                        </label>

                        <input
                            type="text"
                            name="informasi_kesehatan"
                            value="{{ old('informasi_kesehatan', $pendonor->informasi_kesehatan ?? '') }}"
                            required
                        >

                    </div>


                {{-- Petugas --}}
                @elseif(isset($petugas))

                    {{-- Nama --}}
                    <div class="form-row">

                        <label>
                            Nama Lengkap
                        </label>

                        <input
                            type="text"
                            name="nama"
                            value="{{ old('nama', $user->nama ?? $petugas->user->nama ?? '') }}"
                            required
                        >

                    </div>


                    {{-- Email --}}
                    <div class="form-row">

                        <label>
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email', $user->email ?? $petugas->user->email ?? '') }}"
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