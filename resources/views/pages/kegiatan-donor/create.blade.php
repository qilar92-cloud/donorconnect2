@extends('layouts.app')

@section('title', 'Tambah Kegiatan Donor - DonorConnect')

@push('styles')
    @vite('resources/css/kegiatan-donor/create.css')
@endpush

@section('content')

<div class="kegiatan-create-page">

    <div class="create-card">

        {{-- HEADER --}}

        <div class="create-header">

            <div class="create-header-main">

                <div class="create-icon">
                    <i class="fas fa-calendar-plus"></i>
                </div>

                <div class="create-header-text">

                    <span>
                        DonorConnect • Petugas PMR
                    </span>

                    <h1>
                        Tambah Kegiatan Donor
                    </h1>

                    <p>
                        Kelola jadwal dan informasi kegiatan donor darah.
                    </p>

                </div>

            </div>

        </div>


        {{-- FORM --}}

        <form
            action="{{ route('kegiatan-donor.store') }}"
            method="POST"
        >

            @csrf

            <div class="form-content">

                <div class="form-heading">

                    <div class="heading-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>

                    <div>

                        <h2>
                            Informasi Kegiatan
                        </h2>

                        <p>
                            Lengkapi data kegiatan donor di bawah ini.
                        </p>

                    </div>

                </div>


                <div class="form-grid">

                    {{-- NAMA KEGIATAN --}}

                    <div class="form-group full-width">

                        <label for="nama_kegiatan">
                            Nama Kegiatan
                        </label>

                        <div class="input-box">

                            <i class="fas fa-calendar-alt"></i>

                            <input
                                type="text"
                                name="nama_kegiatan"
                                id="nama_kegiatan"
                                value="{{ old('nama_kegiatan') }}"
                                placeholder="Masukkan nama kegiatan donor"
                                class="@error('nama_kegiatan') input-error @enderror"
                            >

                        </div>

                        @error('nama_kegiatan')
                            <small class="error-message">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>


                    {{-- TANGGAL --}}

                    <div class="form-group">

                        <label for="tanggal">
                            Tanggal
                        </label>

                        <div class="input-box">

                            <i class="fas fa-calendar-day"></i>

                            <input
                                type="date"
                                name="tanggal"
                                id="tanggal"
                                value="{{ old('tanggal') }}"
                                class="@error('tanggal') input-error @enderror"
                            >

                        </div>

                        @error('tanggal')
                            <small class="error-message">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>


                    {{-- WAKTU --}}

                    <div class="form-group">

                        <label for="waktu">
                            Waktu
                        </label>

                        <div class="input-box">

                            <i class="fas fa-clock"></i>

                            <input
                                type="text"
                                name="waktu"
                                id="waktu"
                                value="{{ old('waktu') }}"
                                placeholder="Contoh: 08:00 - 12:00"
                                required
                                class="@error('waktu') input-error @enderror"
                            >

                        </div>

                        @error('waktu')
                            <small class="error-message">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>


                    {{-- LOKASI --}}

                    <div class="form-group full-width">

                        <label for="lokasi">
                            Lokasi
                        </label>

                        <div class="input-box">

                            <i class="fas fa-map-marker-alt"></i>

                            <input
                                type="text"
                                name="lokasi"
                                id="lokasi"
                                value="{{ old('lokasi') }}"
                                placeholder="Masukkan lokasi kegiatan"
                                class="@error('lokasi') input-error @enderror"
                            >

                        </div>

                        @error('lokasi')
                            <small class="error-message">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>


                    {{-- KETERANGAN --}}

                    <div class="form-group full-width">

                        <label for="keterangan">
                            Keterangan
                        </label>

                        <div class="textarea-box">

                            <i class="fas fa-align-left"></i>

                            <textarea
                                name="keterangan"
                                id="keterangan"
                                rows="4"
                                placeholder="Masukkan keterangan kegiatan (opsional)"
                                class="@error('keterangan') input-error @enderror"
                            >{{ old('keterangan') }}</textarea>

                        </div>

                        @error('keterangan')
                            <small class="error-message">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                </div>

            </div>


            {{-- FOOTER --}}

            <div class="form-footer">

                <a
                    href="{{ route('kegiatan-donor.index') }}"
                    class="btn btn-cancel"
                >
                    <i class="fas fa-times"></i>
                    Batal
                </a>

                <button
                    type="submit"
                    class="btn btn-save"
                >
                    <i class="fas fa-save"></i>
                    Simpan Kegiatan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection