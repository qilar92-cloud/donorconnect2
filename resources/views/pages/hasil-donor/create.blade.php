@extends('layouts.app')

@section('title', 'Catat Hasil Donor')

@push('styles')
    @vite('resources/css/hasil-donor/create.css')
@endpush

@section('content')

    <div class="hasil-page">

        {{-- Banner --}}

        <div class="page-banner">

            <div class="banner-content">

                <div class="banner-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M12 3s6 6.2 6 11a6 6 0 0 1-12 0c0-4.8 6-11 6-11Z"/>
                        <path d="M9.5 15.5c.4 1.1 1.3 1.8 2.5 2"/>
                    </svg>
                </div>

                <div class="banner-text">

                    <span class="banner-label">
                        DONORCONNECT • PETUGAS PMR
                    </span>

                    <h1>
                        Catat Hasil Donor
                    </h1>

                    <p>
                        Catat dan simpan hasil donor pendonor setelah kegiatan selesai.
                    </p>

                </div>

            </div>


            <div class="banner-heart">

                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M20.8 8.6c0 5.5-8.8 10.2-8.8 10.2S3.2 14.1 3.2 8.6A4.6 4.6 0 0 1 12 6.3a4.6 4.6 0 0 1 8.8 2.3Z"/>
                </svg>

            </div>


            <div class="banner-info">

                <div class="banner-info-icon">
                    <i class="fas fa-clipboard-check"></i>
                </div>

                <div>
                    <strong>Hasil Donor</strong>
                    <span>Lengkapi data dengan benar</span>
                </div>

            </div>

        </div>


        {{-- Konten --}}

        <div class="hasil-layout">

            {{-- Form --}}

            <div class="form-column">

                <div class="result-card">

                    <div class="card-heading">

                        <div class="heading-icon">
                            <i class="fas fa-notes-medical"></i>
                        </div>

                        <div>

                            <h4>
                                Data Hasil Donor
                            </h4>

                            <span>
                                Lengkapi informasi hasil donor pendonor.
                            </span>

                        </div>

                    </div>


                    {{-- Error --}}

                    @if ($errors->any())

                        <div class="error-box">

                            <i class="fas fa-exclamation-circle"></i>

                            <div>

                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach

                            </div>

                        </div>

                    @endif


                    {{-- Success --}}

                    @if (session('success'))

                        <div class="success-box">

                            <i class="fas fa-check-circle"></i>

                            <span>
                                {{ session('success') }}
                            </span>

                        </div>

                    @endif


                    <form
                        action="{{ route('hasil-donor.store') }}"
                        method="POST"
                    >

                        @csrf


                        {{-- Pendonor --}}

                        <div class="form-group">

                            <label>
                                <i class="fas fa-user"></i>
                                Pendonor
                            </label>

                            <div class="select-wrapper">

                                <select
                                    name="id_pendonor"
                                    class="donor-input"
                                    required
                                >

                                    <option value="">
                                        Pilih Pendonor
                                    </option>

                                    @foreach ($pendonor as $item)

                                        <option
                                            value="{{ $item->id_pendonor }}"
                                            {{ old('id_pendonor') == $item->id_pendonor ? 'selected' : '' }}
                                        >
                                            {{ $item->user->nama ?? 'Pendonor' }}
                                        </option>

                                    @endforeach

                                </select>

                                <i class="fas fa-chevron-down"></i>

                            </div>

                        </div>


                        {{-- Kegiatan --}}

                        <div class="form-group">

                            <label>
                                <i class="fas fa-calendar-alt"></i>
                                Kegiatan
                            </label>

                            <div class="select-wrapper">

                                <select
                                    name="id_kegiatan"
                                    class="donor-input"
                                    required
                                >

                                    <option value="">
                                        Pilih Kegiatan
                                    </option>

                                    @foreach ($kegiatan as $item)

                                        <option
                                            value="{{ $item->id_kegiatan }}"
                                            {{ old('id_kegiatan') == $item->id_kegiatan ? 'selected' : '' }}
                                        >
                                            {{ $item->nama_kegiatan }}
                                        </option>

                                    @endforeach

                                </select>

                                <i class="fas fa-chevron-down"></i>

                            </div>

                        </div>


                        {{-- Tanggal dan jumlah --}}

                        <div class="two-column">

                            <div class="form-group">

                                <label>
                                    <i class="fas fa-calendar-day"></i>
                                    Tanggal Donor
                                </label>

                                <div class="input-icon">

                                    <input
                                        type="date"
                                        name="tanggal_donor"
                                        value="{{ old('tanggal_donor') }}"
                                        class="donor-input"
                                        required
                                    >

                                    <i class="fas fa-calendar-alt"></i>

                                </div>

                            </div>


                            <div class="form-group">

                                <label>
                                    <i class="fas fa-tint"></i>
                                    Jumlah Kantong (ml)
                                </label>

                                <div class="input-icon">

                                    <input
                                        type="number"
                                        name="jumlah_kantong"
                                        value="{{ old('jumlah_kantong', 450) }}"
                                        class="donor-input"
                                        min="1"
                                        required
                                    >

                                    <span class="ml-label">
                                        ml
                                    </span>

                                </div>

                            </div>

                        </div>


                        {{-- Keterangan --}}

                        <div class="form-group">

                            <label>
                                <i class="fas fa-clipboard-check"></i>
                                Keterangan
                            </label>

                            <textarea
                                name="keterangan"
                                class="donor-input textarea-input"
                                rows="3"
                                placeholder="Contoh: Sehat"
                            >{{ old('keterangan') }}</textarea>

                        </div>


                        {{-- Tombol --}}

                        <div class="form-actions">

                            <button
                                type="submit"
                                class="btn-save"
                            >
                                <i class="fas fa-save"></i>
                                SIMPAN HASIL
                            </button>

                            <a
                                href="{{ route('dashboard.petugas') }}"
                                class="btn-cancel"
                            >
                                BATAL
                            </a>

                        </div>

                    </form>

                </div>

            </div>


            {{-- Ilustrasi --}}

            <div class="illustration-column">

                <div class="illustration-card">

                    <div class="decor-heart heart-one">
                        ♥
                    </div>

                    <div class="decor-heart heart-two">
                        ♥
                    </div>

                    <div class="decor-drop drop-one">
                        <i class="fas fa-tint"></i>
                    </div>


                    <div class="illustration-circle">

                        <div class="clipboard">

                            <div class="clipboard-clip"></div>

                            <div class="clipboard-top">

                                <div class="clipboard-icon">
                                    <i class="fas fa-heartbeat"></i>
                                </div>

                                <div>
                                    <strong>DONORCONNECT</strong>
                                    <span>HASIL DONOR</span>
                                </div>

                            </div>


                            <div class="clipboard-check">

                                <div class="check-circle">
                                    <i class="fas fa-check"></i>
                                </div>

                                <div class="check-lines">
                                    <span></span>
                                    <span></span>
                                </div>

                            </div>


                            <div class="clipboard-check">

                                <div class="check-circle">
                                    <i class="fas fa-check"></i>
                                </div>

                                <div class="check-lines">
                                    <span></span>
                                    <span></span>
                                </div>

                            </div>


                            <div class="clipboard-check">

                                <div class="check-circle">
                                    <i class="fas fa-check"></i>
                                </div>

                                <div class="check-lines">
                                    <span></span>
                                    <span></span>
                                </div>

                            </div>

                        </div>

                    </div>


                    <div class="illustration-title">

                        <span>
                            CATAT DENGAN TELITI
                        </span>

                        <strong>
                            Setiap Data Itu Berarti
                        </strong>

                        <p>
                            Pastikan hasil donor sudah sesuai
                            sebelum disimpan ke sistem.
                        </p>

                    </div>


                    <div class="illustration-status">

                        <div class="status-icon">
                            <i class="fas fa-check"></i>
                        </div>

                        <div>

                            <strong>
                                Data siap dicatat
                            </strong>

                            <span>
                                Lengkapi form di samping
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection