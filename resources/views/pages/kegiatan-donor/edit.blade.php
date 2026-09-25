@extends('layouts.app')

@section('title', 'Edit Kegiatan Donor - DonorConnect')

@push('styles')
    @vite('resources/css/kegiatan-donor/edit.css')
@endpush

@section('content')

<div class="kegiatan-page">

    <div class="form-card">

        {{-- Header --}}

        <div class="page-header">

            <div class="header-text">

                <span class="page-label">
                    <i class="fas fa-calendar-alt"></i>
                    Kegiatan Donor
                </span>

                <h1>
                    Edit Kegiatan Donor
                </h1>

                <p>
                    Perbarui informasi kegiatan donor yang diperlukan.
                </p>

            </div>

            <div class="activity-id">
                ID #{{ $kegiatan->id_kegiatan }}
            </div>

        </div>


        {{-- Form --}}

        <form
            action="{{ route('kegiatan-donor.update', $kegiatan->id_kegiatan) }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            <div class="form-body">

                <div class="section-heading">

                    <div>
                        <h2>Informasi Kegiatan</h2>

                        <p>
                            Pastikan data kegiatan sudah sesuai.
                        </p>
                    </div>

                </div>


                <div class="form-grid">

                    {{-- Nama Kegiatan --}}

                    <div class="form-group full-width">

                        <label for="nama_kegiatan">
                            Nama Kegiatan
                        </label>

                        <div class="input-wrap">

                            <i class="fas fa-calendar-check"></i>

                            <input
                                type="text"
                                name="nama_kegiatan"
                                id="nama_kegiatan"
                                value="{{ old('nama_kegiatan', $kegiatan->nama_kegiatan) }}"
                                placeholder="Masukkan nama kegiatan donor"
                                class="@error('nama_kegiatan') input-error @enderror"
                                required
                            >

                        </div>

                        @error('nama_kegiatan')
                            <span class="error-message">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>


                    {{-- Tanggal --}}

                    <div class="form-group">

                        <label for="tanggal">
                            Tanggal
                        </label>

                        <div class="input-wrap">

                            <i class="fas fa-calendar-alt"></i>

                            <input
                                type="date"
                                name="tanggal"
                                id="tanggal"
                                value="{{ old('tanggal', optional($kegiatan->tanggal)->format('Y-m-d')) }}"
                                class="@error('tanggal') input-error @enderror"
                                required
                            >

                        </div>

                        @error('tanggal')
                            <span class="error-message">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>


                    {{-- Waktu --}}

                    <div class="form-group">

                        <label for="waktu">
                            Waktu
                        </label>

                        <div class="input-wrap">

                            <i class="fas fa-clock"></i>

                            <input
                                type="text"
                                name="waktu"
                                id="waktu"
                                value="{{ old('waktu', $kegiatan->waktu) }}"
                                placeholder="Contoh: 08:00 - 12:00"
                                class="@error('waktu') input-error @enderror"
                                required
                            >

                        </div>

                        @error('waktu')
                            <span class="error-message">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>


                    {{-- Lokasi --}}

                    <div class="form-group full-width">

                        <label for="lokasi">
                            Lokasi
                        </label>

                        <div class="input-wrap">

                            <i class="fas fa-map-marker-alt"></i>

                            <input
                                type="text"
                                name="lokasi"
                                id="lokasi"
                                value="{{ old('lokasi', $kegiatan->lokasi) }}"
                                placeholder="Masukkan lokasi kegiatan"
                                class="@error('lokasi') input-error @enderror"
                                required
                            >

                        </div>

                        @error('lokasi')
                            <span class="error-message">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>


                    {{-- Keterangan --}}

                    <div class="form-group full-width">

                        <label for="keterangan">
                            Keterangan
                        </label>

                        <div class="textarea-wrap">

                            <i class="fas fa-align-left"></i>

                            <textarea
                                name="keterangan"
                                id="keterangan"
                                rows="4"
                                placeholder="Masukkan keterangan kegiatan (opsional)"
                                class="@error('keterangan') input-error @enderror"
                            >{{ old('keterangan', $kegiatan->keterangan) }}</textarea>

                        </div>

                        @error('keterangan')
                            <span class="error-message">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>

                </div>

            </div>


            {{-- Footer --}}

            <div class="form-footer">

                <a
                    href="{{ route('kegiatan-donor.index') }}"
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