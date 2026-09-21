@extends('layouts.app')

@section('content')

@push('styles')
    @vite('resources/css/pendonor/riwayat-donor.css')
@endpush

<div class="donor-history-page">

    {{-- Header --}}
    <div class="history-header">

        <div class="history-header-content">

            <span class="history-eyebrow">
                DONORCONNECT
            </span>

            <h1>
                Riwayat Donor
            </h1>

            <p>
                Catatan donor kamu, dari satu kebaikan
                ke kebaikan berikutnya.
            </p>

        </div>

        <div class="history-header-icon">
            <i class="fas fa-heart"></i>
        </div>

    </div>


    {{-- Statistik --}}
    <div class="history-stats">

        <div class="history-stat">

            <div class="history-stat-icon donor">
                <i class="fas fa-heartbeat"></i>
            </div>

            <div class="history-stat-content">
                <span>Total Donor</span>

                <strong>
                    {{ $riwayat->count() }}
                </strong>

                <small>
                    Kali berdonor
                </small>
            </div>

        </div>


        <div class="history-stat">

            <div class="history-stat-icon blood">
                <i class="fas fa-tint"></i>
            </div>

            <div class="history-stat-content">
                <span>Total Kantong</span>

                <strong>
                    {{ $riwayat->sum(function ($item) {
                        return $item->hasilDonor->jumlah_kantong ?? 0;
                    }) }}
                </strong>

                <small>
                    Kantong darah terkumpul
                </small>
            </div>

        </div>

    </div>


    {{-- Riwayat --}}
    <div class="history-card">

        <div class="history-card-header">

            <div class="history-card-title">

                <div class="title-icon">
                    <i class="fas fa-history"></i>
                </div>

                <div>
                    <span>PERJALANAN DONORMU</span>

                    <h2>
                        Riwayat Donormu
                    </h2>

                    <p>
                        Setiap donor adalah bentuk kepedulian yang berarti.
                    </p>
                </div>

            </div>

        </div>


        @if($riwayat->count() > 0)

            <div class="history-timeline">

                @foreach($riwayat as $item)

                    <div class="timeline-item">

                        {{-- Timeline --}}
                        <div class="timeline-side">

                            <div class="timeline-dot">
                                <i class="fas fa-tint"></i>
                            </div>

                            @if(!$loop->last)
                                <div class="timeline-line"></div>
                            @endif

                        </div>


                        {{-- Isi --}}
                        <div class="history-item">

                            <div class="history-item-top">

                                <div class="history-item-date">

                                    <span>
                                        {{ $item->hasilDonor->tanggal_donor
                                            ? $item->hasilDonor->tanggal_donor->format('d')
                                            : '-' }}
                                    </span>

                                    <small>
                                        {{ $item->hasilDonor->tanggal_donor
                                            ? $item->hasilDonor->tanggal_donor->format('M Y')
                                            : '-' }}
                                    </small>

                                </div>


                                <div class="history-item-main">

                                    <span class="history-label">
                                        KEGIATAN DONOR
                                    </span>

                                    <h3>
                                        {{ $item->hasilDonor->kegiatanDonor->nama_kegiatan ?? 'Kegiatan Donor' }}
                                    </h3>

                                    <div class="history-location">

                                        <span>
                                            <i class="fas fa-map-marker-alt"></i>

                                            {{ $item->hasilDonor->kegiatanDonor->lokasi ?? 'Lokasi tidak tersedia' }}
                                        </span>

                                    </div>

                                </div>


                                <div class="history-result">

                                    <span>
                                        Jumlah Donor
                                    </span>

                                    <strong>
                                        <i class="fas fa-tint"></i>

                                        {{ $item->hasilDonor->jumlah_kantong ?? 0 }}

                                        <small>
                                            kantong
                                        </small>
                                    </strong>

                                </div>

                            </div>


                            <div class="history-item-bottom">

                                <span class="completed-badge">
                                    <i class="fas fa-check-circle"></i>
                                    Donor selesai
                                </span>

                                @if(!empty($item->hasilDonor->keterangan))
                                    <span class="health-note">
                                        <i class="fas fa-heart"></i>
                                        {{ $item->hasilDonor->keterangan }}
                                    </span>
                                @endif

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            {{-- Empty --}}
            <div class="history-empty">

                <div class="empty-visual">

                    <div class="empty-circle">
                        <i class="fas fa-tint"></i>
                    </div>

                    <span class="empty-dot dot-one"></span>
                    <span class="empty-dot dot-two"></span>
                    <span class="empty-dot dot-three"></span>

                </div>

                <span class="empty-label">
                    PERJALANAN DONORMU
                </span>

                <h3>
                    Belum Ada Riwayat Donor
                </h3>

                <p>
                    Belum ada kegiatan donor yang tercatat di akunmu.
                    Yuk, temukan kegiatan donor dan mulai perjalanan kebaikanmu.
                </p>

                <a
                    href="{{ route('pendonor.kegiatan') }}"
                    class="history-button"
                >
                    <i class="fas fa-calendar-alt"></i>
                    Lihat Kegiatan Donor
                </a>

            </div>

        @endif

    </div>

</div>

@endsection