@extends('layouts.app')

@section('title', 'Riwayat Donor')

@push('styles')
    @vite('resources/css/pendonor/riwayat-donor.css')
@endpush

@section('content')

<div class="donor-history-page">

    {{-- Header --}}
    <div class="history-top">

        <div class="history-heading">

            <span class="history-label">
                RIWAYAT DONOR
            </span>

            <h1>Perjalanan Kebaikanmu</h1>

            <p>
                Catatan kegiatan donor yang pernah kamu lakukan.
            </p>

        </div>

        <div class="history-total">
            <span>Total</span>
            <strong>{{ $riwayat->count() }}</strong>
            <small>donor</small>
        </div>

    </div>


    {{-- Statistik --}}
    <div class="history-summary">

        <div class="summary-card">

            <div class="summary-icon">
                <i class="fas fa-heart"></i>
            </div>

            <div class="summary-text">
                <span>KALI BERDONOR</span>

                <strong>
                    {{ $riwayat->count() }}
                </strong>
            </div>

        </div>


        <div class="summary-card">

            <div class="summary-icon blood">
                <i class="fas fa-tint"></i>
            </div>

            <div class="summary-text">
                <span>KANTONG TERKUMPUL</span>

                <strong>
                    {{ $riwayat->sum(function ($item) {
                        return $item->hasilDonor->jumlah_kantong ?? 0;
                    }) }}
                </strong>
            </div>

        </div>

    </div>


    {{-- Riwayat --}}
    <section class="history-box">

        <div class="history-box-head">

            <div>
                <span>CATATAN DONOR</span>

                <h2>Donor yang Sudah Dilakukan</h2>
            </div>

            <div class="record-count">
                {{ $riwayat->count() }} data
            </div>

        </div>


        @if($riwayat->count() > 0)

            <div class="history-scroll">

                <div class="history-list">

                    @foreach($riwayat as $item)

                        @php
                            $hasil = $item->hasilDonor;
                            $kegiatan = $hasil?->kegiatanDonor;
                            $tanggal = $hasil?->tanggal_donor;
                        @endphp

                        <article class="donor-record">

                            {{-- Icon --}}
                            <div class="record-symbol">

                                <div class="drop-icon">
                                    <i class="fas fa-tint"></i>
                                </div>

                                <span class="mini-heart">
                                    <i class="fas fa-heart"></i>
                                </span>

                            </div>


                            {{-- Informasi --}}
                            <div class="record-content">

                                <span class="record-category">
                                    KEGIATAN DONOR
                                </span>

                                <h3>
                                    {{ $kegiatan->nama_kegiatan ?? 'Kegiatan Donor' }}
                                </h3>

                                <div class="record-meta">

                                    <span>
                                        <i class="far fa-calendar-alt"></i>

                                        {{ $tanggal
                                            ? $tanggal->format('d F Y')
                                            : 'Tanggal tidak tersedia' }}
                                    </span>

                                    <span>
                                        <i class="fas fa-map-marker-alt"></i>

                                        {{ $kegiatan->lokasi ?? 'Lokasi tidak tersedia' }}
                                    </span>

                                </div>

                                <div class="record-status">

                                    <span class="status-done">
                                        <i class="fas fa-check"></i>
                                        Donor selesai
                                    </span>

                                    @if(!empty($hasil?->keterangan))

                                        <span class="health-status">
                                            <i class="fas fa-heart"></i>
                                            {{ $hasil->keterangan }}
                                        </span>

                                    @endif

                                </div>

                            </div>


                            {{-- Jumlah --}}
                            <div class="record-amount">

                                <span>
                                    DONOR
                                </span>

                                <strong>
                                    {{ $hasil->jumlah_kantong ?? 0 }}
                                </strong>

                                <small>
                                    kantong
                                </small>

                            </div>

                        </article>

                    @endforeach

                </div>

            </div>

        @else

            <div class="history-empty">

                <div class="empty-symbol">
                    <i class="fas fa-tint"></i>
                </div>

                <h3>Belum Ada Riwayat</h3>

                <p>
                    Belum ada kegiatan donor yang tercatat di akunmu.
                </p>

                <a href="{{ route('pendonor.kegiatan') }}">
                    <i class="fas fa-calendar-alt"></i>
                    Lihat Kegiatan Donor
                </a>

            </div>

        @endif

    </section>

</div>

@endsection