@extends('layouts.app')

@section('title', 'Edit Pendonor')

@push('styles')
    @vite('resources/css/pendonor/data-edit.css')
@endpush

@section('content')

<div class="pendonor-page">

    <div class="form-card">

        {{-- Header --}}

        <div class="page-header">

            <small>
                <i class="fas fa-users"></i>
                Data Pendonor
            </small>

            <h1>
                Edit Pendonor
            </h1>

            <p>
                Perbarui informasi pendonor yang diperlukan.
            </p>

        </div>


        {{-- Profil Pendonor --}}

        <div class="account-info">

            <div class="account-main">

                <div class="avatar">
                    {{ strtoupper(substr($pendonor->user->nama ?? 'P', 0, 1)) }}
                </div>

                <div class="account-text">

                    <span>Pendonor</span>

                    <h2>
                        {{ $pendonor->user->nama ?? '-' }}
                    </h2>

                    <p>
                        {{ $pendonor->user->email ?? '-' }}
                    </p>

                </div>

            </div>

        </div>


        {{-- Form --}}

        <form
            action="{{ route('pendonor.update', $pendonor->id_pendonor) }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            <div class="form-body">

                <div class="section-title">

                    <h3>
                        Informasi Pendonor
                    </h3>

                    <span>
                        ID #{{ $pendonor->id_pendonor }}
                    </span>

                </div>


                <div class="form-grid">

                    {{-- Nama --}}

                    <div class="form-group">

                        <label for="nama">
                            Nama Lengkap
                        </label>

                        <div class="input-wrap">

                            <i class="fas fa-user"></i>

                            <input
                                type="text"
                                id="nama"
                                value="{{ $pendonor->user->nama ?? '' }}"
                                disabled
                            >

                        </div>

                    </div>


                    {{-- Email --}}

                    <div class="form-group">

                        <label for="email">
                            Email
                        </label>

                        <div class="input-wrap">

                            <i class="fas fa-envelope"></i>

                            <input
                                type="email"
                                id="email"
                                value="{{ $pendonor->user->email ?? '' }}"
                                disabled
                            >

                        </div>

                    </div>


                    {{-- Status --}}

                    <div class="form-group">

                        <label for="status">
                            Status
                        </label>

                        <div class="input-wrap">

                            <i class="fas fa-user-check"></i>

                            <select id="status" name="status">

                                <option value="">
                                    Pilih Status
                                </option>

                                <option
                                    value="Siswa"
                                    {{ $pendonor->status == 'Siswa' ? 'selected' : '' }}
                                >
                                    Siswa
                                </option>

                                <option
                                    value="Mahasiswa"
                                    {{ $pendonor->status == 'Mahasiswa' ? 'selected' : '' }}
                                >
                                    Mahasiswa
                                </option>

                                <option
                                    value="Umum"
                                    {{ $pendonor->status == 'Umum' ? 'selected' : '' }}
                                >
                                    Umum
                                </option>

                            </select>

                        </div>

                    </div>


                    {{-- Kelas / Jabatan --}}

                    <div class="form-group">

                        <label for="kelas_jabatan">
                            Kelas / Jabatan
                        </label>

                        <div class="input-wrap">

                            <i class="fas fa-graduation-cap"></i>

                            <input
                                type="text"
                                id="kelas_jabatan"
                                name="kelas_jabatan"
                                value="{{ old('kelas_jabatan', $pendonor->kelas_jabatan) }}"
                            >

                        </div>

                    </div>


                    {{-- Tanggal Lahir --}}

                    <div class="form-group">

                        <label for="tanggal_lahir">
                            Tanggal Lahir
                        </label>

                        <div class="input-wrap">

                            <i class="fas fa-calendar-alt"></i>

                            <input
                                type="date"
                                id="tanggal_lahir"
                                name="tanggal_lahir"
                                value="{{ old('tanggal_lahir', $pendonor->tanggal_lahir ? $pendonor->tanggal_lahir->format('Y-m-d') : '') }}"
                            >

                        </div>

                    </div>


                    {{-- Golongan Darah --}}

                    <div class="form-group">

                        <label for="golongan_darah">
                            Golongan Darah
                        </label>

                        <div class="input-wrap">

                            <i class="fas fa-tint"></i>

                            <select
                                id="golongan_darah"
                                name="golongan_darah"
                            >

                                <option value="">
                                    Pilih Golongan Darah
                                </option>

                                <option
                                    value="A"
                                    {{ $pendonor->golongan_darah == 'A' ? 'selected' : '' }}
                                >
                                    A
                                </option>

                                <option
                                    value="B"
                                    {{ $pendonor->golongan_darah == 'B' ? 'selected' : '' }}
                                >
                                    B
                                </option>

                                <option
                                    value="AB"
                                    {{ $pendonor->golongan_darah == 'AB' ? 'selected' : '' }}
                                >
                                    AB
                                </option>

                                <option
                                    value="O"
                                    {{ $pendonor->golongan_darah == 'O' ? 'selected' : '' }}
                                >
                                    O
                                </option>

                            </select>

                        </div>

                    </div>


                    {{-- No Telepon --}}

                    <div class="form-group">

                        <label for="nomor_telepon">
                            No. Telepon
                        </label>

                        <div class="input-wrap">

                            <i class="fas fa-phone"></i>

                            <input
                                type="text"
                                id="nomor_telepon"
                                name="nomor_telepon"
                                value="{{ old('nomor_telepon', $pendonor->nomor_telepon) }}"
                            >

                        </div>

                    </div>


                    {{-- Informasi Kesehatan --}}

                    <div class="form-group health-group">

                        <label for="informasi_kesehatan">
                            Informasi Kesehatan
                        </label>

                        <div class="textarea-wrap">

                            <i class="fas fa-heartbeat"></i>

                            <textarea
                                id="informasi_kesehatan"
                                name="informasi_kesehatan"
                                rows="4"
                            >{{ old('informasi_kesehatan', $pendonor->informasi_kesehatan) }}</textarea>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Tombol --}}

            <div class="form-footer">

                <a
                    href="{{ route('pendonor.show', $pendonor->id_pendonor) }}"
                    class="btn btn-back"
                >
                    <i class="fas fa-arrow-left"></i>
                    Batal
                </a>

                <button
                    type="submit"
                    class="btn btn-save"
                >
                    <i class="fas fa-save"></i>
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection