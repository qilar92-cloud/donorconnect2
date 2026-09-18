@extends('layouts.app')

@section('title', 'Detail Kegiatan Donor - DonorConnect')

@push('styles')
    @vite('resources/css/kegiatan-donor/show-pendonor.css')
@endpush

@section('content')

    <div class="detail-page">

        {{-- Heading --}}

        <div class="detail-heading">

            <div class="heading-label">
                <span></span>
                KEGIATAN DONOR
            </div>

            <h1>
                Detail Kegiatan Donor
            </h1>

            <p>
                Informasi lengkap mengenai kegiatan donor yang tersedia.
            </p>

        </div>


        @if (session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif


        @if (session('error'))

            <div class="alert alert-warning">
                {{ session('error') }}
            </div>

        @endif


        {{-- Detail --}}

        <div class="detail-card">

            <div class="detail-card-header">

                <div class="header-icon">
                    <i class="fas fa-tint"></i>
                </div>

                <div>

                    <h2>
                        {{ $kegiatan->nama_kegiatan }}
                    </h2>

                    <span>
                        Kegiatan Donor
                    </span>

                </div>

            </div>


            <div class="detail-card-body">

                <div class="detail-row">

                    <div class="detail-label">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Tanggal</span>
                    </div>

                    <div class="detail-value">
                        {{ $kegiatan->tanggal->format('d M Y') }}
                    </div>

                </div>


                <div class="detail-row">

                    <div class="detail-label">
                        <i class="fas fa-clock"></i>
                        <span>Waktu</span>
                    </div>

                    <div class="detail-value">
                        {{ $kegiatan->waktu }}
                    </div>

                </div>


                <div class="detail-row">

                    <div class="detail-label">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Lokasi</span>
                    </div>

                    <div class="detail-value">
                        {{ $kegiatan->lokasi }}
                    </div>

                </div>


                <div class="detail-row">

                    <div class="detail-label">
                        <i class="fas fa-info-circle"></i>
                        <span>Keterangan</span>
                    </div>

                    <div class="detail-value">
                        {{ $kegiatan->keterangan ?? '-' }}
                    </div>

                </div>


                <div class="detail-row">

                    <div class="detail-label">
                        <i class="fas fa-check-circle"></i>
                        <span>Status</span>
                    </div>

                    <div class="detail-value">

                        <span class="status-badge">
                            <span></span>
                            Tersedia
                        </span>

                    </div>

                </div>

            </div>


            {{-- Pendaftaran --}}

            <div class="register-section">

                <div class="register-icon">
                    <i class="fas fa-heart"></i>
                </div>

                <div class="register-content">

                    <h3>
                        Ingin mengikuti kegiatan ini?
                    </h3>

                    <p>
                        Daftarkan diri kamu untuk mengikuti kegiatan donor.
                    </p>

                    <a
                        href="{{ route('pendaftaran-donor.create', $kegiatan->id_kegiatan) }}"
                        class="register-button"
                    >
                        <i class="fas fa-tint"></i>
                        Daftar Donor
                        <i class="fas fa-arrow-right"></i>
                    </a>

                </div>

            </div>


            {{-- Footer --}}

            <div class="detail-card-footer">

                <a
                    href="{{ route('pendonor.kegiatan') }}"
                    class="back-button"
                >
                    <i class="fas fa-arrow-left"></i>
                    Kembali ke Kegiatan
                </a>

            </div>

        </div>

    </div>

@endsection