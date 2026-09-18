@extends('layouts.app')

@section('title', 'Status Pendaftaran - DonorConnect')

@push('styles')
    @vite('resources/css/pendonor/status.css')
@endpush

@section('content')

<div class="status-page">

    {{-- Header --}}
    <div class="status-hero">

        <div class="hero-content">

            <div class="hero-label">
                <span class="hero-line"></span>
                PENDAFTARAN DONOR
            </div>

            <h1>
                Status Pendaftaran
            </h1>

            <p>
                Pantau kegiatan donor yang sudah kamu daftarkan.
            </p>

        </div>


        <div class="hero-visual">

            <div class="hero-circle hero-circle-one"></div>
            <div class="hero-circle hero-circle-two"></div>

            <div class="hero-drop">
                <i class="fas fa-heart"></i>
            </div>

            <div class="hero-stat">

                <div class="hero-stat-icon">
                    <i class="fas fa-clipboard-check"></i>
                </div>

                <div class="hero-stat-text">

                    <span>Total</span>

                    <strong>
                        {{ $pendaftaran->count() }}
                    </strong>

                    <small>
                        Pendaftaran
                    </small>

                </div>

            </div>

        </div>

    </div>


    {{-- Pesan --}}
    @if(session('success'))

        <div class="status-alert success-alert">

            <div class="alert-icon">
                <i class="fas fa-check"></i>
            </div>

            <div>
                <strong>Berhasil</strong>
                <span>{{ session('success') }}</span>
            </div>

        </div>

    @endif


    @if(session('error'))

        <div class="status-alert error-alert">

            <div class="alert-icon">
                <i class="fas fa-exclamation"></i>
            </div>

            <div>
                <strong>Perhatian</strong>
                <span>{{ session('error') }}</span>
            </div>

        </div>

    @endif


    @if($pendaftaran->isEmpty())

        {{-- Empty --}}
        <div class="empty-card">

            <div class="empty-visual">

                <div class="empty-ring">

                    <div class="empty-icon">
                        <i class="fas fa-clipboard-list"></i>
                    </div>

                </div>

                <span class="empty-dot dot-one"></span>
                <span class="empty-dot dot-two"></span>
                <span class="empty-dot dot-three"></span>

            </div>


            <div class="empty-content">

                <span class="empty-small-title">
                    BELUM ADA DATA
                </span>

                <h2>
                    Belum Ada Pendaftaran
                </h2>

                <p>
                    Kamu belum mendaftar pada kegiatan donor mana pun.
                    Yuk, cari kegiatan donor yang tersedia dan pilih kegiatan
                    yang ingin kamu ikuti.
                </p>

                <a
                    href="{{ route('pendonor.kegiatan') }}"
                    class="btn-kegiatan"
                >

                    <span>
                        <i class="fas fa-calendar-alt"></i>
                        Lihat Kegiatan Donor
                    </span>

                    <i class="fas fa-arrow-right"></i>

                </a>

            </div>

        </div>

    @else

        {{-- Daftar Pendaftaran --}}
        <div class="status-card">

            <div class="card-header">

                <div class="card-header-content">

                    <span class="card-label">
                        AKTIVITAS DONOR
                    </span>

                    <h2>
                        Daftar Pendaftaran
                    </h2>

                    <p>
                        Kegiatan donor yang sudah kamu daftarkan.
                    </p>

                </div>

                <div class="total-badge">

                    <div class="badge-icon">
                        <i class="fas fa-clipboard-check"></i>
                    </div>

                    <div>

                        <strong>
                            {{ $pendaftaran->count() }}
                        </strong>

                        <span>
                            Pendaftaran
                        </span>

                    </div>

                </div>

            </div>


            <div class="status-list">

                @foreach($pendaftaran as $item)

                    <div class="status-item">

                        <div class="activity-icon">

                            <div class="drop-shape">
                                <i class="fas fa-tint"></i>
                            </div>

                        </div>


                        <div class="activity-info">

                            <h3>
                                {{ $item->kegiatanDonor->nama_kegiatan ?? 'Kegiatan Donor' }}
                            </h3>

                            @if($item->kegiatanDonor)

                                <div class="activity-detail">

                                    <span>
                                        <i class="fas fa-calendar-alt"></i>

                                        {{ \Carbon\Carbon::parse($item->kegiatanDonor->tanggal)->format('d M Y') }}
                                    </span>

                                    <span>
                                        <i class="fas fa-clock"></i>

                                        {{ $item->kegiatanDonor->waktu ?? '-' }}
                                    </span>

                                    <span>
                                        <i class="fas fa-map-marker-alt"></i>

                                        {{ $item->kegiatanDonor->lokasi ?? '-' }}
                                    </span>

                                </div>

                            @endif

                        </div>


                        @php

                            $status = strtolower(
                                $item->status_pendaftaran ?? 'terdaftar'
                            );

                        @endphp


                        <div class="status-area">

                            @if($status === 'terdaftar')

                                <span class="status-badge registered">
                                    <span class="status-dot"></span>
                                    Terdaftar
                                </span>

                            @elseif($status === 'diterima')

                                <span class="status-badge accepted">
                                    <span class="status-dot"></span>
                                    Diterima
                                </span>

                            @elseif($status === 'ditolak')

                                <span class="status-badge rejected">
                                    <span class="status-dot"></span>
                                    Ditolak
                                </span>

                            @elseif($status === 'selesai')

                                <span class="status-badge completed">
                                    <span class="status-dot"></span>
                                    Selesai
                                </span>

                            @else

                                <span class="status-badge pending">
                                    <span class="status-dot"></span>

                                    {{ ucfirst($item->status_pendaftaran ?? 'Terdaftar') }}

                                </span>

                            @endif

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    @endif

</div>

@endsection