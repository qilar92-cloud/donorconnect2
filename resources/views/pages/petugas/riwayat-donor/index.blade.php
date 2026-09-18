@extends('layouts.app')

@section('title', 'Riwayat Donor - DonorConnect')

@push('styles')
    @vite('resources/css/petugas/riwayat-donor.css')
@endpush

@section('content')

<div class="history-page">

    {{-- Header --}}
    <div class="history-header">

        <div class="header-content">

            <span class="eyebrow">
                <i class="fas fa-heart"></i>
                DONORCONNECT
            </span>

            <h1>Riwayat Donor</h1>

            <p>
                Catatan hasil donor yang telah tersimpan dalam sistem.
            </p>

        </div>

        <div class="header-icon">
            <i class="fas fa-tint"></i>
        </div>

    </div>


    {{-- Statistik --}}
    <div class="stats-grid">

        <div class="stat-card">

            <div class="stat-icon pink">
                <i class="fas fa-users"></i>
            </div>

            <div class="stat-info">

                <span>Total Pendonor</span>

                <strong>
                    {{ $riwayat->pluck('id_pendonor')->filter()->unique()->count() }}
                </strong>

            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon purple">
                <i class="fas fa-history"></i>
            </div>

            <div class="stat-info">

                <span>Total Riwayat</span>

                <strong>
                    {{ $riwayat->count() }}
                </strong>

            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon red">
                <i class="fas fa-tint"></i>
            </div>

            <div class="stat-info">

                <span>Total Kantong</span>

                <strong>
                    {{ $riwayat->sum(function ($item) {
                        return $item->hasilDonor->jumlah_kantong ?? 0;
                    }) }}
                </strong>

            </div>

        </div>

    </div>


    {{-- History --}}
    <div class="history-card-wrapper">

        <div class="section-title">

            <div>

                <span class="section-label">
                    DONOR JOURNEY
                </span>

                <h2>Perjalanan Donor</h2>

                <p>
                    Semua hasil donor yang sudah tercatat.
                </p>

            </div>

            <div class="history-count">

                <i class="fas fa-heart"></i>

                {{ $riwayat->count() }} Riwayat

            </div>

        </div>


        @if($riwayat->count())

            <div class="timeline">

                @foreach($riwayat as $index => $item)

                    @php

                        $hasil = $item->hasilDonor;

                        $pendonor = $item->pendonor;

                        $kegiatan = $hasil?->kegiatanDonor;

                        $tanggal = $hasil?->tanggal_donor;

                    @endphp


                    <div class="timeline-item">

                        {{-- Timeline --}}
                        @if(!$loop->last)
                            <div class="timeline-line"></div>
                        @endif


                        <div class="timeline-icon">

                            <i class="fas fa-tint"></i>

                        </div>


                        <div class="donor-card">

                            {{-- Informasi Utama --}}
                            <div class="donor-main">

                                <div class="date-box">

                                    <span>
                                        {{ $tanggal ? $tanggal->format('M') : '-' }}
                                    </span>

                                    <strong>
                                        {{ $tanggal ? $tanggal->format('d') : '-' }}
                                    </strong>

                                    <small>
                                        {{ $tanggal ? $tanggal->format('Y') : '-' }}
                                    </small>

                                </div>


                                <div class="donor-info">

                                    <span class="info-label">
                                        PENDONOR
                                    </span>

                                    <h3>
                                        {{ $pendonor?->user?->nama ?? 'Data Pendonor' }}
                                    </h3>

                                    <small>
                                        ID Pendonor:
                                        {{ $pendonor?->id_pendonor ?? '-' }}
                                    </small>

                                </div>


                                <div class="blood-result">

                                    <span class="info-label">
                                        HASIL DONOR
                                    </span>

                                    <div class="blood-value">

                                        <i class="fas fa-tint"></i>

                                        <strong>
                                            {{ $hasil?->jumlah_kantong ?? 0 }}
                                        </strong>

                                        <span>
                                            kantong
                                        </span>

                                    </div>

                                </div>

                            </div>


                            {{-- Detail --}}
                            <div class="donor-details">

                                <div class="detail-item">

                                    <div class="detail-icon">
                                        <i class="fas fa-calendar-check"></i>
                                    </div>

                                    <div class="detail-content">

                                        <span>
                                            KEGIATAN
                                        </span>

                                        <strong>
                                            {{ $kegiatan?->nama_kegiatan ?? '-' }}
                                        </strong>

                                    </div>

                                </div>


                                <div class="detail-item">

                                    <div class="detail-icon">
                                        <i class="fas fa-comment-medical"></i>
                                    </div>

                                    <div class="detail-content">

                                        <span>
                                            KETERANGAN
                                        </span>

                                        <strong>
                                            {{ $hasil?->keterangan ?? 'Tidak ada keterangan' }}
                                        </strong>

                                    </div>

                                </div>

                            </div>


                            {{-- Footer --}}
                            <div class="donor-footer">

                                <span class="success">

                                    <i class="fas fa-check-circle"></i>

                                    Donor Tersimpan

                                </span>

                                <span>
                                    Riwayat #{{ $index + 1 }}
                                </span>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="empty-state">

                <div class="empty-icon">
                    <i class="fas fa-tint"></i>
                </div>

                <h3>
                    Belum Ada Riwayat
                </h3>

                <p>
                    Riwayat donor akan muncul di sini setelah hasil donor tersimpan.
                </p>

            </div>

        @endif

    </div>

</div>

@endsection