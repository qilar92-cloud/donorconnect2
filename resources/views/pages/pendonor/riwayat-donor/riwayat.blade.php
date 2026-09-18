@extends('layouts.app')

@section('content')

@push('styles')
    @vite('resources/css/pendonor/riwayat-donor.css')
@endpush

<div class="container-fluid donor-page">

    <!-- Header -->
    <div class="donor-header">

        <div class="header-content">

            <div class="donor-small-title">
                DONORCONNECT
            </div>

            <h1>Riwayat Donor Saya</h1>

            <p>
                Lihat riwayat kegiatan donor yang telah kamu ikuti.
            </p>

        </div>

        <div class="donor-header-decoration">

            <div class="decoration-circle circle-one"></div>
            <div class="decoration-circle circle-two"></div>

            <div class="header-icon">
                <i class="fas fa-history"></i>
            </div>

        </div>

    </div>


    <!-- Statistik -->
    <div class="donor-stat-row">

        <div class="donor-stat-card">

            <div class="stat-icon donor-stat-icon">
                <i class="fas fa-heartbeat"></i>
            </div>

            <div class="stat-content">

                <span class="stat-label">
                    Total Donor
                </span>

                <strong>
                    {{ $riwayat->count() }}
                </strong>

                <small>
                    Kali donor
                </small>

            </div>

        </div>


        <div class="donor-stat-card">

            <div class="stat-icon blood-stat-icon">
                <i class="fas fa-tint"></i>
            </div>

            <div class="stat-content">

                <span class="stat-label">
                    Total Kantong
                </span>

                <strong>
                    {{ $riwayat->sum(function ($item) {
                        return $item->hasilDonor->jumlah_kantong ?? 0;
                    }) }}
                </strong>

                <small>
                    Kantong darah
                </small>

            </div>

        </div>

    </div>


    <!-- Card Riwayat -->
    <div class="donor-card">

        <div class="card-title-area">

            <div class="title-icon">
                <i class="fas fa-history"></i>
            </div>

            <div>

                <h3>Riwayat Donor</h3>

                <p>
                    Daftar kegiatan donor yang telah kamu lakukan
                </p>

            </div>

        </div>


        @if($riwayat->count() > 0)

        <div class="history-list">

            @foreach($riwayat as $item)

                <div class="history-item">

                    <!-- Nomor -->
                    <div class="history-number">
                        {{ $loop->iteration }}
                    </div>


                    <!-- Icon -->
                    <div class="activity-icon">

                        <i class="fas fa-tint"></i>

                    </div>


                    <!-- Informasi -->
                    <div class="history-main">

                        <div class="history-title">

                            <h4>
                                {{ $item->hasilDonor->kegiatanDonor->nama_kegiatan ?? '-' }}
                            </h4>

                        </div>


                        <div class="history-info">

                            <span>
                                <i class="fas fa-calendar-alt"></i>

                                {{ $item->hasilDonor->tanggal_donor
                                    ? $item->hasilDonor->tanggal_donor->format('d M Y')
                                    : '-' }}
                            </span>


                            <span>
                                <i class="fas fa-map-marker-alt"></i>

                                {{ $item->hasilDonor->kegiatanDonor->lokasi ?? '-' }}
                            </span>

                        </div>

                    </div>


                    <!-- Jumlah -->
                    <div class="history-amount">

                        <span class="amount-label">
                            Jumlah Donor
                        </span>

                        <span class="blood-bag">

                            <i class="fas fa-tint"></i>

                            {{ $item->hasilDonor->jumlah_kantong ?? 0 }}

                            <small>kantong</small>

                        </span>

                    </div>


                    <!-- Status -->
                    <div class="history-status">

                        <span class="status-sehat">

                            <i class="fas fa-check-circle"></i>

                            {{ $item->hasilDonor->keterangan ?? 'Sehat' }}

                        </span>

                    </div>

                </div>

            @endforeach

        </div>

        @else

        <!-- Empty -->
        <div class="empty-state">

            <div class="empty-illustration">

                <div class="empty-circle">

                    <i class="fas fa-history"></i>

                </div>

                <span class="empty-dot dot-one"></span>
                <span class="empty-dot dot-two"></span>
                <span class="empty-dot dot-three"></span>

            </div>


            <h4>
                Belum Ada Riwayat Donor
            </h4>

            <p>
                Riwayat donor kamu akan muncul setelah kamu
                melakukan donor dan hasilnya dicatat oleh petugas.
            </p>


            <a
                href="{{ route('pendonor.kegiatan') }}"
                class="btn-donor"
            >

                <i class="fas fa-calendar-alt"></i>

                Lihat Kegiatan Donor

            </a>

        </div>

        @endif

    </div>

</div>

@endsection