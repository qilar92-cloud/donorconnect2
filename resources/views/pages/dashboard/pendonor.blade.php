@extends('layouts.app')

@section('title', 'Dashboard Pendonor - DonorConnect')

@push('styles')
    @vite('resources/css/dashboard/pendonor.css')
@endpush

@section('content')

@php
    use App\Models\KegiatanDonor;
    use App\Models\PendaftaranDonor;
    use App\Models\HasilDonor;
    use App\Models\RiwayatDonor;
    use App\Models\Pendonor;
    use App\Models\DokumentasiDonor;

    $pendonor = Pendonor::where(
        'id_user',
        session('id_user')
    )->first();

    $jumlahKegiatan = KegiatanDonor::count();

    $jumlahPendaftaran = $pendonor
        ? PendaftaranDonor::where(
            'id_pendonor',
            $pendonor->id_pendonor
        )
        ->where(
            'status_pendaftaran',
            '!=',
            'dibatalkan'
        )
        ->count()
        : 0;

    $jumlahRiwayat = $pendonor
        ? RiwayatDonor::where(
            'id_pendonor',
            $pendonor->id_pendonor
        )->count()
        : 0;

    $totalDonor = $jumlahRiwayat;

    $kantongDonor = $pendonor
        ? HasilDonor::where(
            'id_pendonor',
            $pendonor->id_pendonor
        )->sum('jumlah_kantong')
        : 0;

    $pendaftaranTerakhir = $pendonor
        ? PendaftaranDonor::where(
            'id_pendonor',
            $pendonor->id_pendonor
        )
        ->with('kegiatanDonor')
        ->latest('id_pendaftaran')
        ->first()
        : null;

    $statusDonor = $pendaftaranTerakhir
        ? $pendaftaranTerakhir->status_pendaftaran
        : 'Belum Terdaftar';

    $kegiatanTerdekat = KegiatanDonor::whereDate(
        'tanggal',
        '>=',
        now()
    )
        ->orderBy('tanggal')
        ->orderBy('waktu')
        ->first();

    $dokumentasi = DokumentasiDonor::with('kegiatanDonor')
        ->latest()
        ->get();

    $fotoDashboard = $dokumentasi->take(6);
@endphp


<div class="pendonor-dashboard">

    {{-- HERO --}}

    <section class="dashboard-hero">

        <div class="hero-background-shape shape-one"></div>
        <div class="hero-background-shape shape-two"></div>

        <div class="hero-content">

            <div class="hero-brand">

                <span class="brand-icon">
                    <i class="fas fa-heart"></i>
                </span>

                <span>DONORCONNECT</span>

            </div>


            <span class="hero-badge">

                <i class="fas fa-tint"></i>

                PENDONOR

            </span>


            <h1>

                Karena kamu,<br>

                <span>dunia jadi lebih sehat</span>

                <i class="fas fa-heart"></i>

            </h1>


            <p>
                Terima kasih telah menjadi bagian dari perubahan
                melalui donor darah.
            </p>


            <div class="hero-date">

                <i class="fas fa-calendar-alt"></i>

                {{ now()->translatedFormat('l, d F Y') }}

            </div>

        </div>


        <div class="hero-visual">

            <div class="visual-glow"></div>


            <div class="blood-bag">

                <div class="blood-bag-top"></div>

                <div class="blood-bag-body">

                    <div class="blood-label">
                        <i class="fas fa-heartbeat"></i>
                    </div>

                    <div class="blood-level"></div>

                </div>

                <div class="blood-tube"></div>

            </div>


            <div class="heart-line">

                <i class="fas fa-heart"></i>

            </div>


            <div class="hand-shape hand-left">

                <i class="fas fa-hand-holding-heart"></i>

            </div>


            <div class="hero-message">

                <span>Setetes darah</span>

                <strong>sejuta harapan</strong>

                <i class="fas fa-heart"></i>

            </div>


            <span class="spark spark-one">✦</span>
            <span class="spark spark-two">✦</span>
            <span class="spark spark-three">•</span>

        </div>

    </section>


    {{-- STATISTIK --}}

    <section class="stats-grid">


        {{-- Kegiatan --}}

        <a
            href="{{ route('pendonor.kegiatan') }}"
            class="stat-card"
        >

            <div class="stat-top">

                <span class="stat-label">
                    KEGIATAN TERSEDIA
                </span>

                <div class="stat-icon pink">
                    <i class="fas fa-calendar-alt"></i>
                </div>

            </div>


            <div class="stat-number">
                {{ $jumlahKegiatan }}
            </div>


            <div class="stat-bottom">

                <span>
                    Kegiatan donor
                </span>

                <i class="fas fa-arrow-right"></i>

            </div>

        </a>


        {{-- Pendaftaran --}}

        <a
            href="{{ route('pendonor.status') }}"
            class="stat-card"
        >

            <div class="stat-top">

                <span class="stat-label">
                    PENDAFTARAN AKTIF
                </span>

                <div class="stat-icon blue">
                    <i class="fas fa-clipboard-check"></i>
                </div>

            </div>


            <div class="stat-number">
                {{ $jumlahPendaftaran }}
            </div>


            <div class="stat-bottom">

                <span>
                    Pendaftaran kamu
                </span>

                <i class="fas fa-arrow-right"></i>

            </div>

        </a>


        {{-- Riwayat --}}

        <a
            href="{{ route('pendonor.riwayat') }}"
            class="stat-card"
        >

            <div class="stat-top">

                <span class="stat-label">
                    RIWAYAT DONOR
                </span>

                <div class="stat-icon lavender">
                    <i class="fas fa-history"></i>
                </div>

            </div>


            <div class="stat-number">
                {{ $jumlahRiwayat }}
            </div>


            <div class="stat-bottom">

                <span>
                    Riwayat tersimpan
                </span>

                <i class="fas fa-arrow-right"></i>

            </div>

        </a>


        {{-- Total donor --}}

        <a
            href="{{ route('pendonor.riwayat') }}"
            class="stat-card"
        >

            <div class="stat-top">

                <span class="stat-label">
                    TOTAL DONOR
                </span>

                <div class="stat-icon red">
                    <i class="fas fa-tint"></i>
                </div>

            </div>


            <div class="stat-number">
                {{ $totalDonor }}
            </div>


            <div class="stat-bottom">

                <span>
                    Kantong: {{ $kantongDonor }}
                </span>

                <i class="fas fa-arrow-right"></i>

            </div>

        </a>

    </section>


    {{-- BAGIAN BAWAH --}}

    <section class="dashboard-sections">


        {{-- KEGIATAN TERDEKAT --}}

        <div class="dashboard-panel">

            <div class="panel-header">

                <div class="panel-title">

                    <div class="panel-icon pink-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>


                    <div>

                        <span>
                            AGENDA
                        </span>

                        <h2>
                            Kegiatan Terdekat
                        </h2>

                        <p>
                            Kegiatan donor yang akan datang
                        </p>

                    </div>

                </div>


                <a
                    href="{{ route('pendonor.kegiatan') }}"
                    class="see-all"
                >

                    Lihat semua

                    <i class="fas fa-arrow-right"></i>

                </a>

            </div>


            @if($kegiatanTerdekat)

                <div class="event-card">


                    <div class="event-date">

                        <strong>
                            {{ $kegiatanTerdekat->tanggal->format('d') }}
                        </strong>

                        <span>
                            {{ $kegiatanTerdekat->tanggal->translatedFormat('M') }}
                        </span>

                    </div>


                    <div class="event-info">

                        <h3>
                            {{ $kegiatanTerdekat->nama_kegiatan }}
                        </h3>


                        <div class="event-detail">

                            <span>

                                <i class="fas fa-clock"></i>

                                {{ $kegiatanTerdekat->waktu }}

                            </span>


                            <span>

                                <i class="fas fa-map-marker-alt"></i>

                                {{ $kegiatanTerdekat->lokasi }}

                            </span>

                        </div>

                    </div>


                    <a
                        href="{{ route(
                            'pendonor.kegiatan.show',
                            $kegiatanTerdekat->id_kegiatan
                        ) }}"
                        class="event-button"
                    >

                        <i class="fas fa-arrow-right"></i>

                    </a>

                </div>

            @else

                <div class="empty-state">

                    <div class="empty-icon">
                        <i class="fas fa-calendar-times"></i>
                    </div>

                    <h3>
                        Belum ada kegiatan
                    </h3>

                    <p>
                        Belum ada kegiatan donor yang tersedia.
                    </p>

                </div>

            @endif

        </div>


        {{-- STATUS DONOR --}}

        <div class="dashboard-panel activity-panel">

            <div class="panel-header">


                <div class="panel-title">

                    <div class="panel-icon blue-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>


                    <div>

                        <span>
                            AKTIVITAS
                        </span>

                        <h2>
                            Status Donor
                        </h2>

                        <p>
                            Ringkasan aktivitas donor kamu
                        </p>

                    </div>

                </div>


                <a
                    href="{{ route('pendonor.status') }}"
                    class="see-all"
                >

                    Detail

                    <i class="fas fa-arrow-right"></i>

                </a>

            </div>


            <div class="activity-content">


                <div class="activity-item">

                    <div class="activity-icon">

                        <i class="fas fa-clipboard-check"></i>

                    </div>


                    <div class="activity-text">

                        <strong>
                            Status Donor
                        </strong>

                        <span>
                            {{ $statusDonor }}
                        </span>

                    </div>


                    <div class="activity-value">
                        {{ $statusDonor }}
                    </div>

                </div>


                <div class="activity-item">

                    <div class="activity-icon history">

                        <i class="fas fa-history"></i>

                    </div>


                    <div class="activity-text">

                        <strong>
                            Riwayat Donor
                        </strong>

                        <span>
                            {{ $jumlahRiwayat }} riwayat tersimpan
                        </span>

                    </div>


                    <div class="activity-value">
                        {{ $jumlahRiwayat }}
                    </div>

                </div>


                <div class="activity-item">

                    <div class="activity-icon blood">

                        <i class="fas fa-tint"></i>

                    </div>


                    <div class="activity-text">

                        <strong>
                            Total Kantong
                        </strong>

                        <span>
                            Darah yang telah didonorkan
                        </span>

                    </div>


                    <div class="activity-value">
                        {{ $kantongDonor }}
                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- DOKUMENTASI --}}

    <section class="donor-gallery">


        <div class="donor-gallery-header">


            <div class="donor-gallery-title">

                <div class="donor-gallery-icon">
                    <i class="fas fa-images"></i>
                </div>


                <div>

                    <span>
                        DOKUMENTASI
                    </span>

                    <h2>
                        Dokumentasi Donor Darah
                    </h2>

                    <p>
                        Momen kegiatan donor darah DONORCONNECT.
                    </p>

                </div>

            </div>


            {{-- Lihat semua foto --}}

            <a
                href="{{ route('pendonor.dokumentasi') }}"
                class="donor-gallery-see-all"
            >

                Lihat semua foto

                <i class="fas fa-arrow-right"></i>

            </a>

        </div>


        @if($fotoDashboard->count() > 0)


            <div class="donor-gallery-grid">


                @foreach($fotoDashboard as $foto)


                    <button
                        type="button"
                        class="donor-gallery-photo {{ $loop->first ? 'donor-gallery-main' : '' }}"
                        data-index="{{ $loop->index }}"
                        aria-label="Buka foto dokumentasi"
                    >


                        <img
                            src="{{ asset('storage/' . $foto->foto) }}"
                            alt="{{ $foto->judul ?: 'Dokumentasi donor darah' }}"
                            loading="lazy"
                        >


                        <div class="donor-gallery-overlay">


                            @if($loop->first)

                                <div>

                                    <i class="fas fa-search-plus"></i>

                                    <span>
                                        Dokumentasi donor darah
                                    </span>

                                </div>

                            @else

                                <i class="fas fa-search-plus"></i>

                            @endif


                        </div>


                    </button>


                @endforeach


            </div>


        @else


            <div class="donor-gallery-empty">


                <div class="donor-gallery-empty-icon">

                    <i class="fas fa-images"></i>

                </div>


                <h3>
                    Belum ada dokumentasi
                </h3>


                <p>
                    Dokumentasi kegiatan donor akan tampil di sini.
                </p>


            </div>


        @endif


    </section>

</div>


{{-- LIGHTBOX --}}

@if($fotoDashboard->count() > 0)


    <div
        class="photo-lightbox"
        id="photoLightbox"
        aria-hidden="true"
    >


        {{-- Tutup --}}

        <button
            type="button"
            class="lightbox-close"
            id="lightboxClose"
            aria-label="Tutup foto"
        >

            <i class="fas fa-times"></i>

        </button>


        {{-- Sebelumnya --}}

        <button
            type="button"
            class="lightbox-arrow lightbox-prev"
            id="lightboxPrev"
            aria-label="Foto sebelumnya"
        >

            <i class="fas fa-chevron-left"></i>

        </button>


        <div class="lightbox-content">


            <img
                id="lightboxImage"
                src=""
                alt="Dokumentasi donor darah"
            >


            <div class="lightbox-counter">

                <span id="lightboxCurrent">
                    1
                </span>

                /

                <span id="lightboxTotal">
                    {{ $fotoDashboard->count() }}
                </span>

            </div>


        </div>


        {{-- Berikutnya --}}

        <button
            type="button"
            class="lightbox-arrow lightbox-next"
            id="lightboxNext"
            aria-label="Foto berikutnya"
        >

            <i class="fas fa-chevron-right"></i>

        </button>


    </div>

@endif


{{-- LIGHTBOX SCRIPT --}}

@if($fotoDashboard->count() > 0)

<script>

document.addEventListener('DOMContentLoaded', function () {


    const photos = document.querySelectorAll(
        '.donor-gallery-photo'
    );


    const lightbox = document.getElementById(
        'photoLightbox'
    );


    const image = document.getElementById(
        'lightboxImage'
    );


    const closeButton = document.getElementById(
        'lightboxClose'
    );


    const prevButton = document.getElementById(
        'lightboxPrev'
    );


    const nextButton = document.getElementById(
        'lightboxNext'
    );


    const currentNumber = document.getElementById(
        'lightboxCurrent'
    );


    if (
        !photos.length ||
        !lightbox ||
        !image ||
        !closeButton ||
        !prevButton ||
        !nextButton ||
        !currentNumber
    ) {
        return;
    }


    let currentIndex = 0;

    let touchStartX = 0;

    let touchEndX = 0;


    function showPhoto(index) {


        if (index < 0) {

            index = photos.length - 1;

        }


        if (index >= photos.length) {

            index = 0;

        }


        const photo =
            photos[index].querySelector('img');


        if (!photo) {

            return;

        }


        currentIndex = index;


        image.src = photo.src;

        image.alt = photo.alt;


        currentNumber.textContent =
            index + 1;

    }


    function openLightbox(index) {


        showPhoto(index);


        lightbox.classList.add('show');


        lightbox.setAttribute(
            'aria-hidden',
            'false'
        );


        document.body.classList.add(
            'lightbox-open'
        );

    }


    function closeLightbox() {


        lightbox.classList.remove(
            'show'
        );


        lightbox.setAttribute(
            'aria-hidden',
            'true'
        );


        document.body.classList.remove(
            'lightbox-open'
        );


        image.src = '';

    }


    photos.forEach(function (photo, index) {


        photo.addEventListener(
            'click',
            function () {

                openLightbox(index);

            }
        );


    });


    closeButton.addEventListener(
        'click',
        function () {

            closeLightbox();

        }
    );


    prevButton.addEventListener(
        'click',
        function () {

            showPhoto(
                currentIndex - 1
            );

        }
    );


    nextButton.addEventListener(
        'click',
        function () {

            showPhoto(
                currentIndex + 1
            );

        }
    );


    lightbox.addEventListener(
        'click',
        function (event) {


            if (
                event.target === lightbox
            ) {

                closeLightbox();

            }


        }
    );


    document.addEventListener(
        'keydown',
        function (event) {


            if (
                !lightbox.classList.contains(
                    'show'
                )
            ) {

                return;

            }


            if (
                event.key === 'Escape'
            ) {

                closeLightbox();

                return;

            }


            if (
                event.key === 'ArrowLeft'
            ) {

                showPhoto(
                    currentIndex - 1
                );

            }


            if (
                event.key === 'ArrowRight'
            ) {

                showPhoto(
                    currentIndex + 1
                );

            }


        }
    );


    image.addEventListener(
        'touchstart',
        function (event) {


            touchStartX =
                event.changedTouches[0].screenX;


        },
        {
            passive: true
        }
    );


    image.addEventListener(
        'touchend',
        function (event) {


            touchEndX =
                event.changedTouches[0].screenX;


            const distance =
                touchStartX - touchEndX;


            if (
                Math.abs(distance) < 50
            ) {

                return;

            }


            if (distance > 0) {


                showPhoto(
                    currentIndex + 1
                );


            } else {


                showPhoto(
                    currentIndex - 1
                );


            }


        },
        {
            passive: true
        }
    );


});

</script>

@endif

@endsection