@extends('layouts.app')

@section('title', 'Kegiatan Donor - DonorConnect')

@push('styles')
    @vite('resources/css/pendonor/kegiatan.css')
@endpush

@section('content')

<div class="kegiatan-page">

    <!-- Header -->
    <div class="kegiatan-header">

        <div class="kegiatan-header-content">

            <h1 class="kegiatan-title">
                Kegiatan Donor
            </h1>

            <p class="kegiatan-subtitle">
                Temukan kegiatan donor darah dan pilih kegiatan yang ingin kamu ikuti.
            </p>

            <div class="header-total">
                <i class="fas fa-calendar-check mr-1"></i>
                {{ $kegiatan->count() }} kegiatan tersedia
            </div>

        </div>

    </div>

    <!-- Search -->
    <div class="search-card">

        <div class="search-box">

            <div class="search-icon">
                <i class="fas fa-search"></i>
            </div>

            <div class="search-content">

                <label for="searchKegiatan" class="search-label">
                    Cari Kegiatan
                </label>

                <input
                    type="text"
                    id="searchKegiatan"
                    class="search-input"
                    placeholder="Cari nama kegiatan atau lokasi..."
                >

            </div>

        </div>

    </div>

    <!-- Section -->
    <div class="section-header">

        <div>
            <h2 class="section-title">
                Kegiatan Donor Tersedia
            </h2>

            <p class="section-subtitle">
                Pilih kegiatan donor yang ingin kamu ikuti.
            </p>
        </div>

        <div class="jumlah-badge">
            <i class="fas fa-calendar-alt"></i>
            <span id="jumlahKegiatan">
                {{ $kegiatan->count() }}
            </span>
            kegiatan
        </div>

    </div>

    <!-- Cards -->
    <div class="event-grid" id="eventGrid">

        @forelse ($kegiatan as $item)

            <div
                class="event-card"
                data-search="{{ strtolower($item->nama_kegiatan . ' ' . $item->lokasi) }}"
            >

                <div class="event-top">

                    <div class="event-icon">
                        <i class="fas fa-tint"></i>
                    </div>

                    <div class="status-badge">
                        <span class="status-dot"></span>
                        Tersedia
                    </div>

                </div>

                <div class="event-name">
                    {{ $item->nama_kegiatan }}
                </div>

                <div class="event-description">
                    {{ $item->keterangan ?: 'Kegiatan donor darah DonorConnect.' }}
                </div>

                <div class="event-info">

                    <div class="info-box">

                        <div class="info-label">
                            <i class="fas fa-calendar-alt"></i>
                            Tanggal
                        </div>

                        <div class="info-value">
                            {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                        </div>

                    </div>

                    <div class="info-box">

                        <div class="info-label">
                            <i class="fas fa-clock"></i>
                            Waktu
                        </div>

                        <div class="info-value">
                            {{ $item->waktu }}
                        </div>

                    </div>

                    <div class="info-box location">

                        <div class="info-label">
                            <i class="fas fa-map-marker-alt"></i>
                            Lokasi
                        </div>

                        <div class="info-value">
                            {{ $item->lokasi }}
                        </div>

                    </div>

                </div>

                <a
                    href="{{ route('pendonor.kegiatan.show', $item->id_kegiatan) }}"
                    class="detail-button"
                >
                    <span>
                        Lihat Detail Kegiatan
                    </span>

                    <i class="fas fa-arrow-right"></i>
                </a>

            </div>

        @empty

            <div class="empty-state">

                <div class="empty-icon">
                    <i class="fas fa-calendar-times"></i>
                </div>

                <h5>
                    Belum Ada Kegiatan
                </h5>

                <p>
                    Saat ini belum ada kegiatan donor yang tersedia.
                </p>

            </div>

        @endforelse

    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        const searchInput = document.getElementById('searchKegiatan');
        const cards = document.querySelectorAll('.event-card');
        const jumlahKegiatan = document.getElementById('jumlahKegiatan');

        searchInput.addEventListener('input', function () {

            const keyword = this.value.toLowerCase().trim();
            let jumlah = 0;

            cards.forEach(function (card) {

                const data = card.dataset.search;

                if (data.includes(keyword)) {
                    card.style.display = '';
                    jumlah++;
                } else {
                    card.style.display = 'none';
                }

            });

            jumlahKegiatan.textContent = jumlah;
        });

    });
</script>

@endsection