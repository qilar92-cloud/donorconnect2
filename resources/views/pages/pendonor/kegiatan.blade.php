@extends('layouts.app')

@section('title', 'Kegiatan Donor - DonorConnect')

@push('styles')
    @vite('resources/css/pendonor/kegiatan.css')
@endpush

@section('content')

<div class="donor-page">

    <div class="donor-banner">

        <div class="banner-main">

            <div class="banner-label">
                DONORCONNECT • PENDONOR
            </div>

            <h1>Kegiatan Donor</h1>

            <p>
                Pilih jadwal donor yang ingin kamu ikuti.
            </p>

            <div class="banner-meta">
                <i class="fas fa-calendar-check"></i>
                {{ $kegiatan->count() }} kegiatan tersedia
            </div>

        </div>

        <div class="banner-art">
            <div class="art-circle"></div>

            <div class="art-card">
                <i class="fas fa-tint"></i>
                <span>DONOR</span>
            </div>

            <div class="art-heart">
                <i class="fas fa-heart"></i>
            </div>
        </div>

    </div>


    <div class="quick-row">

        <div class="quick-card">
            <div class="quick-icon">
                <i class="fas fa-calendar-day"></i>
            </div>

            <div>
                <small>KEGIATAN</small>
                <strong>{{ $kegiatan->count() }}</strong>
                <span>Tersedia</span>
            </div>
        </div>


        <a
            href="{{ route('pendonor.status') }}"
            class="quick-card quick-link"
        >
            <div class="quick-icon">
                <i class="fas fa-clipboard-list"></i>
            </div>

            <div>
                <small>PENDAFTARAN</small>
                <strong>→</strong>
                <span>Lihat status</span>
            </div>

            <i class="fas fa-arrow-right quick-arrow"></i>
        </a>

    </div>


    <div class="search-card">

        <div class="search-icon">
            <i class="fas fa-search"></i>
        </div>

        <input
            type="text"
            id="searchKegiatan"
            placeholder="Cari kegiatan atau lokasi..."
        >

    </div>


    <div class="section-top">

        <div>
            <span class="section-label">
                JADWAL DONOR
            </span>

            <h2>Kegiatan yang tersedia</h2>
        </div>

        <span
            class="result-count"
            id="jumlahKegiatan"
        >
            {{ $kegiatan->count() }}
        </span>

    </div>


    <div
        class="event-list"
        id="eventGrid"
    >

        @forelse ($kegiatan as $item)

            <div
                class="event-card"
                data-search="{{ strtolower($item->nama_kegiatan . ' ' . $item->lokasi) }}"
            >

                <div class="date-box">

                    <span>
                        {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('M') }}
                    </span>

                    <strong>
                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d') }}
                    </strong>

                    <small>
                        {{ \Carbon\Carbon::parse($item->tanggal)->format('Y') }}
                    </small>

                </div>


                <div class="event-content">

                    <div class="event-heading">

                        <span class="available">
                            <i class="fas fa-circle"></i>
                            Tersedia
                        </span>

                        <h3>
                            {{ $item->nama_kegiatan }}
                        </h3>

                    </div>


                    <div class="event-details">

                        <span>
                            <i class="fas fa-clock"></i>
                            {{ $item->waktu }}
                        </span>

                        <span>
                            <i class="fas fa-map-marker-alt"></i>
                            {{ $item->lokasi }}
                        </span>

                    </div>


                    @if ($item->keterangan)
                        <div class="event-note">
                            {{ $item->keterangan }}
                        </div>
                    @endif


                    <div class="event-footer">

                        <span class="event-purpose">
                            <i class="fas fa-heart"></i>
                            Donor darah
                        </span>

                        <a
                            href="{{ route('pendonor.kegiatan.show', $item->id_kegiatan) }}"
                            class="detail-button"
                        >
                            Lihat Detail
                            <i class="fas fa-arrow-right"></i>
                        </a>

                    </div>

                </div>

            </div>

        @empty

            <div class="empty-state">

                <div class="empty-icon">
                    <i class="fas fa-calendar-times"></i>
                </div>

                <h3>Belum Ada Kegiatan</h3>

                <p>
                    Belum ada jadwal donor yang tersedia.
                </p>

            </div>

        @endforelse

    </div>

</div>


<script>
document.addEventListener('DOMContentLoaded', function () {

    const searchInput = document.getElementById('searchKegiatan');
    const cards = document.querySelectorAll('.event-card');
    const counter = document.getElementById('jumlahKegiatan');

    if (!searchInput) {
        return;
    }

    searchInput.addEventListener('input', function () {

        const keyword = this.value.toLowerCase().trim();

        let total = 0;

        cards.forEach(function (card) {

            const text = card.dataset.search || '';

            if (text.includes(keyword)) {
                card.style.display = '';
                total++;
            } else {
                card.style.display = 'none';
            }

        });

        counter.textContent = total;

    });

});
</script>

@endsection