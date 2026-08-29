@extends('layouts.app')

@section('title', 'Detail Kegiatan Donor - DonorConnect')

@section('content')

<div class="detail-page">

    <div class="detail-heading">

        <div>
            <h1>Detail Kegiatan Donor</h1>

            <p>
                Informasi lengkap kegiatan donor.
            </p>
        </div>

    </div>


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
                        Tersedia
                    </span>

                </div>

            </div>

        </div>


        <div class="register-section">

            <h3>
                Daftar Kegiatan Donor
            </h3>

            <p>
                Silakan melakukan pendaftaran jika ingin mengikuti kegiatan donor ini.
            </p>


            <form action="{{ route('pendaftaran-donor.store') }}"
                  method="POST">

                @csrf

                <input type="hidden"
                       name="id_kegiatan"
                       value="{{ $kegiatan->id_kegiatan }}">


                <button type="submit"
                        class="register-button">

                    <i class="fas fa-heart"></i>

                    Daftar Donor

                </button>

            </form>

        </div>


        <div class="detail-card-footer">

            <a href="{{ route('pendonor.kegiatan') }}"
               class="back-button">

                <i class="fas fa-arrow-left"></i>

                Kembali

            </a>

        </div>

    </div>

</div>


@push('styles')

<style>

.detail-page {
    width: 100%;
    min-height: calc(100vh - 80px);
    padding: 25px 28px 35px;
    background: #fffafa;
}

.detail-heading {
    margin-bottom: 20px;
}

.detail-heading h1 {
    margin: 0 0 5px;
    color: #292733;
    font-size: 30px;
    font-weight: 800;
}

.detail-heading p {
    margin: 0;
    color: #8a8588;
    font-size: 13px;
}

.detail-card {
    width: 100%;
    background: #ffffff;
    border: 1px solid #f1e0e2;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(217, 30, 54, 0.05);
    overflow: hidden;
}

.detail-card-header {
    padding: 22px 25px;
    display: flex;
    align-items: center;
    gap: 15px;
    border-bottom: 1px solid #f3e1e2;
}

.header-icon {
    width: 48px;
    height: 48px;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #fff0f1;
    color: #d91e36;
    border-radius: 11px;
    font-size: 18px;
}

.detail-card-header h2 {
    margin: 0 0 4px;
    color: #302e38;
    font-size: 18px;
    font-weight: 800;
}

.detail-card-header span {
    color: #999195;
    font-size: 10px;
}

.detail-card-body {
    padding: 10px 25px;
}

.detail-row {
    min-height: 65px;
    display: flex;
    align-items: center;
    border-bottom: 1px solid #f4eeee;
}

.detail-row:last-child {
    border-bottom: none;
}

.detail-label {
    width: 35%;
    display: flex;
    align-items: center;
    gap: 9px;
    color: #716b70;
    font-size: 12px;
    font-weight: 700;
}

.detail-label i {
    width: 18px;
    color: #d91e36;
    text-align: center;
}

.detail-value {
    width: 65%;
    color: #302e38;
    font-size: 12px;
}

.status-badge {
    display: inline-block;
    padding: 5px 10px;
    background: #e8f7ee;
    color: #218838;
    border-radius: 6px;
    font-size: 10px;
    font-weight: 700;
}

.register-section {
    margin: 0 25px 20px;
    padding: 20px;
    background: #fff5f6;
    border: 1px solid #f3dadd;
    border-radius: 11px;
}

.register-section h3 {
    margin: 0 0 6px;
    color: #302e38;
    font-size: 15px;
    font-weight: 800;
}

.register-section p {
    margin: 0 0 15px;
    color: #858085;
    font-size: 11px;
}

.register-button {
    padding: 10px 18px;
    border: none;
    border-radius: 7px;
    background: #e51f3b;
    color: #ffffff;
    font-size: 11px;
    font-weight: 700;
    cursor: pointer;
}

.register-button:hover {
    background: #c91830;
}

.register-button i {
    margin-right: 6px;
}

.detail-card-footer {
    padding: 18px 25px;
    background: #fffafa;
    border-top: 1px solid #f3e3e4;
}

.back-button {
    padding: 9px 16px;
    display: inline-flex;
    align-items: center;
    gap: 7px;
    background: #6c757d;
    color: #ffffff !important;
    border-radius: 7px;
    font-size: 11px;
    font-weight: 700;
    text-decoration: none !important;
}

.back-button:hover {
    background: #5a6268;
}

@media (max-width: 768px) {

    .detail-page {
        padding: 20px 15px 30px;
    }

    .detail-heading h1 {
        font-size: 25px;
    }

    .detail-card-header {
        padding: 20px;
    }

    .detail-card-body {
        padding: 5px 20px;
    }

    .detail-row {
        display: block;
        padding: 14px 0;
    }

    .detail-label,
    .detail-value {
        width: 100%;
    }

    .detail-label {
        margin-bottom: 7px;
    }

    .register-section {
        margin: 0 20px 20px;
    }

    .detail-card-footer {
        padding: 15px 20px;
    }

    .register-button {
        width: 100%;
    }
}

@media (max-width: 480px) {

    .detail-page {
        padding: 18px 12px 25px;
    }

    .detail-heading h1 {
        font-size: 22px;
    }

    .detail-card-header h2 {
        font-size: 15px;
    }

}

</style>

@endpush

@endsection