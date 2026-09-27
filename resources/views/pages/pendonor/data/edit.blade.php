@extends('layouts.app')

@section('title', 'Edit Pendonor')

@push('styles')
    @vite('resources/css/pendonor/data-edit.css')
@endpush

@section('content')

<div class="pendonor-page">

    <div class="form-card">

        {{-- HEADER --}}

        <div class="page-header">

            <div class="header-info">

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

        </div>


        {{-- FORM --}}

        <form
            action="{{ route('pendonor.update', $pendonor->id_pendonor) }}"
            method="POST"
        >

            @csrf
            @method('PUT')


            {{-- INFORMASI PENDONOR --}}

            <div class="form-body">

                <div class="section-title">

                    <div class="section-heading">

                        <span class="section-line"></span>

                        <h3>
                            Informasi Pendonor
                        </h3>

                    </div>

                    <span class="profile-id">
                        ID #{{ $pendonor->id_pendonor }}
                    </span>

                </div>


                <div class="form-grid">


                    {{-- NAMA LENGKAP --}}

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


                    {{-- EMAIL --}}

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


                    {{-- STATUS --}}

                    <div class="form-group">

                        <label for="status">
                            Status
                        </label>

                        <div class="input-wrap">

                            <i class="fas fa-user-check"></i>

                            <select
                                name="status"
                                id="status"
                                required
                            >

                                <option
                                    value="Siswa"
                                    {{ old('status', $pendonor->status) === 'Siswa' ? 'selected' : '' }}
                                >
                                    Siswa
                                </option>

                                <option
                                    value="Mahasiswa"
                                    {{ old('status', $pendonor->status) === 'Mahasiswa' ? 'selected' : '' }}
                                >
                                    Mahasiswa
                                </option>

                                <option
                                    value="Umum"
                                    {{ old('status', $pendonor->status) === 'Umum' ? 'selected' : '' }}
                                >
                                    Umum
                                </option>

                            </select>

                        </div>

                    </div>


                    {{-- KELAS / JABATAN --}}

                    <div class="form-group">

                        <label for="kelas_jabatan">
                            Kelas / Jabatan
                        </label>

                        <div class="input-wrap">

                            <i class="fas fa-graduation-cap"></i>

                            <input
                                type="text"
                                name="kelas_jabatan"
                                id="kelas_jabatan"
                                value="{{ old('kelas_jabatan', $pendonor->kelas_jabatan) }}"
                                placeholder="Masukkan kelas atau jabatan"
                            >

                        </div>

                    </div>


                    {{-- TANGGAL LAHIR --}}

                    <div class="form-group">

                        <label for="tanggal_lahir">
                            Tanggal Lahir
                        </label>

                        <div class="input-wrap">

                            <i class="fas fa-calendar-alt"></i>

                            <input
                                type="date"
                                name="tanggal_lahir"
                                id="tanggal_lahir"
                                value="{{ old(
                                    'tanggal_lahir',
                                    $pendonor->tanggal_lahir
                                        ? $pendonor->tanggal_lahir->format('Y-m-d')
                                        : ''
                                ) }}"
                            >

                        </div>

                    </div>


                    {{-- GOLONGAN DARAH --}}

                    <div class="form-group">

                        <label for="golongan_darah">
                            Golongan Darah
                        </label>

                        <div class="input-wrap">

                            <i class="fas fa-tint"></i>

                            <select
                                name="golongan_darah"
                                id="golongan_darah"
                                required
                            >

                                <option value="">
                                    Pilih golongan darah
                                </option>

                                <option
                                    value="A"
                                    {{ old('golongan_darah', $pendonor->golongan_darah) === 'A' ? 'selected' : '' }}
                                >
                                    A
                                </option>

                                <option
                                    value="B"
                                    {{ old('golongan_darah', $pendonor->golongan_darah) === 'B' ? 'selected' : '' }}
                                >
                                    B
                                </option>

                                <option
                                    value="AB"
                                    {{ old('golongan_darah', $pendonor->golongan_darah) === 'AB' ? 'selected' : '' }}
                                >
                                    AB
                                </option>

                                <option
                                    value="O"
                                    {{ old('golongan_darah', $pendonor->golongan_darah) === 'O' ? 'selected' : '' }}
                                >
                                    O
                                </option>

                            </select>

                        </div>

                    </div>


                    {{-- NO TELEPON --}}

                    <div class="form-group full-width">

                        <label for="nomor_telepon">
                            No. Telepon
                        </label>

                        <div class="input-wrap">

                            <i class="fas fa-phone"></i>

                            <input
                                type="text"
                                name="nomor_telepon"
                                id="nomor_telepon"
                                value="{{ old('nomor_telepon', $pendonor->nomor_telepon) }}"
                                placeholder="Masukkan nomor telepon"
                            >

                        </div>

                    </div>


                    {{-- INFORMASI KESEHATAN --}}

                    <div class="form-group full-width">

                        <label for="informasi_kesehatan">
                            Informasi Kesehatan
                        </label>

                        <div class="textarea-wrap">

                            <i class="fas fa-heartbeat"></i>

                            <textarea
                                name="informasi_kesehatan"
                                id="informasi_kesehatan"
                                placeholder="Masukkan informasi kesehatan jika diperlukan..."
                            >{{ old('informasi_kesehatan', $pendonor->informasi_kesehatan) }}</textarea>

                        </div>

                    </div>

                </div>

            </div>


            {{-- FOOTER --}}

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