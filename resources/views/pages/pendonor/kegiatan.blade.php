@extends('layouts.app')

@section('title', 'Kegiatan Donor - DonorConnect')

@section('content')

<style>
    .page-header {
        margin-bottom: 24px;
    }

    .page-label {
        color: #a80e2c;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 6px;
    }

    .page-title {
        color: #18213d;
        font-weight: 800;
        font-size: 30px;
        margin-bottom: 6px;
    }

    .page-subtitle {
        color: #7c8194;
        margin: 0;
        font-size: 14px;
    }

    .search-card {
        background: #fff;
        border: 1px solid #f0e5e7;
        border-radius: 18px;
        padding: 16px 20px;
        margin-bottom: 28px;
        box-shadow: 0 5px 20px rgba(168, 14, 44, 0.05);
    }

    .search-wrapper {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .search-icon {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        background: #f9e9ef;
        color: #a80e2c;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        flex-shrink: 0;
    }

    .search-content {
        flex: 1;
    }

    .search-label {
        display: block;
        color: #18213d;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 4px;
    }

    .search-input {
        border: none;
        outline: none;
        width: 100%;
        color: #18213d;
        font-size: 14px;
        padding: 0;
        background: transparent;
    }

    .search-input::placeholder {
        color: #a0a4b3;
    }

    .section-heading {
        display: flex;
        align-items: end;
        justify-content: space-between;
        margin-bottom: 16px;
    }

    .section-title {
        color: #18213d;
        font-size: 20px;
        font-weight: 800;
        margin: 0 0 3px;
    }

    .section-subtitle {
        color: #8b8f9f;
        font-size: 13px;
        margin: 0;
    }

    .total-badge {
        background: #f9e9ef;
        color: #a80e2c;
        border-radius: 20px;
        padding: 8px 14px;
        font-size: 12px;
        font-weight: 700;
        white-space: nowrap;
    }

    .event-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 18px;
    }

    .event-card {
        position: relative;
        background: #fff;
        border: 1px solid #eee3e6;
        border-radius: 18px;
        padding: 20px;
        overflow: hidden;
        transition: all 0.2s ease;
        box-shadow: 0 5px 18px rgba(168, 14, 44, 0.04);
    }

    .event-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #a80e2c, #d94b91);
    }

    .event-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(168, 14, 44, 0.10);
        border-color: #e9cbd5;
    }

    .event-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 16px;
    }

    .event-icon {
        width: 44px;
        height: 44px;
        border-radius: 13px;
        background: linear-gradient(135deg, #a80e2c, #d94b91);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
    }

    .available-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #eef9f5;
        color: #218c70;
        border-radius: 20px;
        padding: 6px 10px;
        font-size: 11px;
        font-weight: 700;
    }

    .available-dot {
        width: 6px;
        height: 6px;
        background: #28a985;
        border-radius: 50%;
    }

    .event-name {
        color: #18213d;
        font-size: 17px;
        font-weight: 800;
        line-height: 1.4;
        margin-bottom: 5px;
    }

    .event-description {
        color: #8b8f9f;
        font-size: 12px;
        margin-bottom: 18px;
        min-height: 18px;
    }

    .event-info {
        display: grid;
        grid-template-columns: 1fr;
        gap: 9px;
        margin-bottom: 18px;
    }

    .info-item {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #64697c;
        font-size: 12px;
    }

    .info-item i {
        width: 25px;
        height: 25px;
        border-radius: 8px;
        background: #f9e9ef;
        color: #a80e2c;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
        flex-shrink: 0;
    }

    .info-item strong {
        color: #34394f;
        font-weight: 700;
    }

    .detail-button {
        width: 100%;
        border: none;
        border-radius: 11px;
        background: #a80e2c;
        color: #fff !important;
        padding: 10px 14px;
        font-size: 12px;
        font-weight: 700;
        text-align: center;
        display: block;
        transition: 0.2s ease;
    }

    .detail-button:hover {
        background: #8f0925;
        text-decoration: none;
        color: #fff;
    }

    .empty-state {
        grid-column: 1 / -1;
        background: #fff;
        border: 1px dashed #e5cfd5;
        border-radius: 18px;
        padding: 45px 20px;
        text-align: center;
    }

    .empty-icon {
        width: 55px;
        height: 55px;
        border-radius: 16px;
        background: #f9e9ef;
        color: #a80e2c;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 14px;
        font-size: 20px;
    }

    .empty-state h5 {
        color: #18213d;
        font-weight: 800;
        margin-bottom: 5px;
    }

    .empty-state p {
        color: #8b8f9f;
        font-size: 13px;
        margin: 0;
    }

    @media (max-width: 768px) {
        .event-grid {
            grid-template-columns: 1fr;
        }

        .page-title {
            font-size: 25px;
        }

        .section-heading {
            align-items: flex-start;
            gap: 10px;
        }
    }

    @media (max-width: 480px) {
        .section-heading {
            display: block;
        }

        .total-badge {
            display: inline-block;
            margin-top: 10px;
        }

        .search-card {
            padding: 14px;
        }

        .event-card {
            padding: 17px;
        }
    }
</style>



<div class="search-card">
    <div class="search-wrapper">

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

<div class="section-heading">

    <div>
        <h2 class="section-title">Kegiatan Donor Tersedia</h2>

        <p class="section-subtitle">
            Pilih kegiatan donor yang ingin kamu ikuti.
        </p>
    </div>

    <div class="total-badge">
        <i class="fas fa-calendar-check mr-1"></i>
        <span id="jumlahKegiatan">{{ $kegiatan->count() }}</span> kegiatan
    </div>

</div>

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

                <div class="available-badge">
                    <span class="available-dot"></span>
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

                <div class="info-item">
                    <i class="fas fa-calendar-alt"></i>
                    <span>
                        <strong>Tanggal:</strong>
                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                    </span>
                </div>

                <div class="info-item">
                    <i class="fas fa-clock"></i>
                    <span>
                        <strong>Waktu:</strong>
                        {{ $item->waktu }}
                    </span>
                </div>

                <div class="info-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>
                        <strong>Lokasi:</strong>
                        {{ $item->lokasi }}
                    </span>
                </div>

            </div>

            <a
                href="{{ route('pendonor.kegiatan.show', $item->id_kegiatan) }}"
                class="detail-button"
            >
                Lihat Detail
                <i class="fas fa-arrow-right ml-1"></i>
            </a>

        </div>

    @empty

        <div class="empty-state">

            <div class="empty-icon">
                <i class="fas fa-calendar-times"></i>
            </div>

            <h5>Belum Ada Kegiatan</h5>

            <p>
                Saat ini belum ada kegiatan donor yang tersedia.
            </p>

        </div>

    @endforelse

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