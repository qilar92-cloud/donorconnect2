@extends('layouts.app')

@section('title', 'Edit Pendonor')

@push('styles')
    @vite('resources/css/pendonor/data-edit.css')
@endpush

@section('content')

    <div class="pendonor-page">

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


        <div class="form-card">

            {{-- Akun --}}

            <div class="account-info">

                <div class="avatar">
                    {{ strtoupper(substr($pendonor->user->nama ?? 'P', 0, 1)) }}
                </div>

                <div class="account-text">

                    <span>
                        Pendonor
                    </span>

                    <h2>
                        {{ $pendonor->user->nama ?? '-' }}
                    </h2>

                    <p>
                        {{ $pendonor->user->email ?? '-' }}
                    </p>

                </div>

            </div>


            <form
                action="{{ route('pendonor.update', $pendonor->id_pendonor) }}"
                method="POST"
            >

                @csrf
                @method('PUT')


                {{-- Form --}}

                <div class="form-body">

                    <div class="form-heading">

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

                            <label>
                                Nama Lengkap
                            </label>

                            <input
                                type="text"
                                value="{{ $pendonor->user->nama ?? '' }}"
                                class="readonly"
                                disabled
                            >

                            <span class="readonly-info">
                                Nama akun tidak diubah di sini.
                            </span>

                        </div>


                        {{-- Email --}}

                        <div class="form-group">

                            <label>
                                Email
                            </label>

                            <input
                                type="email"
                                value="{{ $pendonor->user->email ?? '' }}"
                                class="readonly"
                                disabled
                            >

                            <span class="readonly-info">
                                Email akun tidak diubah di sini.
                            </span>

                        </div>


                        {{-- Status --}}

                        <div class="form-group">

                            <label for="status">
                                Status
                            </label>

                            <select
                                name="status"
                                id="status"
                            >

                                <option value="">
                                    Pilih Status
                                </option>

                                <option
                                    value="Siswa"
                                    {{ old('status', $pendonor->status) == 'Siswa' ? 'selected' : '' }}
                                >
                                    Siswa
                                </option>

                                <option
                                    value="Mahasiswa"
                                    {{ old('status', $pendonor->status) == 'Mahasiswa' ? 'selected' : '' }}
                                >
                                    Mahasiswa
                                </option>

                                <option
                                    value="Umum"
                                    {{ old('status', $pendonor->status) == 'Umum' ? 'selected' : '' }}
                                >
                                    Umum
                                </option>

                            </select>

                            @error('status')
                                <span class="error">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>


                        {{-- Kelas --}}

                        <div class="form-group">

                            <label for="kelas_jabatan">
                                Kelas / Jabatan
                            </label>

                            <input
                                type="text"
                                name="kelas_jabatan"
                                id="kelas_jabatan"
                                value="{{ old('kelas_jabatan', $pendonor->kelas_jabatan) }}"
                                placeholder="Contoh: XII PPLG 2"
                            >

                            @error('kelas_jabatan')
                                <span class="error">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>


                        {{-- Tanggal Lahir --}}

                        <div class="form-group">

                            <label for="tanggal_lahir">
                                Tanggal Lahir
                            </label>

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

                            @error('tanggal_lahir')
                                <span class="error">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>


                        {{-- Golongan Darah --}}

                        <div class="form-group">

                            <label for="golongan_darah">
                                Golongan Darah
                            </label>

                            <select
                                name="golongan_darah"
                                id="golongan_darah"
                            >

                                <option value="">
                                    Pilih Golongan
                                </option>

                                @foreach (['A', 'B', 'AB', 'O'] as $golongan)

                                    <option
                                        value="{{ $golongan }}"
                                        {{ old(
                                            'golongan_darah',
                                            $pendonor->golongan_darah
                                        ) == $golongan ? 'selected' : '' }}
                                    >
                                        {{ $golongan }}
                                    </option>

                                @endforeach

                            </select>

                            @error('golongan_darah')
                                <span class="error">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>


                        {{-- Telepon --}}

                        <div class="form-group">

                            <label for="nomor_telepon">
                                No. Telepon
                            </label>

                            <input
                                type="text"
                                name="nomor_telepon"
                                id="nomor_telepon"
                                value="{{ old(
                                    'nomor_telepon',
                                    $pendonor->nomor_telepon
                                ) }}"
                                placeholder="Contoh: 081234567890"
                            >

                            @error('nomor_telepon')
                                <span class="error">
                                    {{ $message }}
                                </span>
                            @enderror

                        </div>


                        {{-- Kesehatan --}}

                        <div class="form-group full">

                            <label for="informasi_kesehatan">
                                Informasi Kesehatan
                            </label>

                            <textarea
                                name="informasi_kesehatan"
                                id="informasi_kesehatan"
                                placeholder="Contoh: Sehat"
                            >{{ old(
                                'informasi_kesehatan',
                                $pendonor->informasi_kesehatan
                            ) }}</textarea>

                            @error('informasi_kesehatan')
                                <span class="error">
                                    {{ $message }}
                                </span>
                            @enderror

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
                        <i class="fas fa-check"></i>
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </div>

@endsection