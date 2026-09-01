@extends('layouts.app')

@section('content')

<div class="container-fluid donor-page">

    <div class="donor-header">
        <div>
            <div class="donor-small-title">DONORCONNECT</div>

            <h1>Riwayat Donor Saya</h1>

            <p>
                Lihat riwayat kegiatan donor yang telah kamu ikuti.
            </p>
        </div>

        <div class="donor-header-icon">
            <i class="fas fa-history"></i>
        </div>
    </div>

    <div class="donor-card">

        <div class="card-title-area">
            <div class="title-icon">
                <i class="fas fa-history"></i>
            </div>

            <div>
                <h3>Riwayat Donor</h3>
                <p>Daftar riwayat donor kamu</p>
            </div>
        </div>

        <div class="table-responsive">

            <table class="table donor-table">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kegiatan</th>
                        <th>Tanggal Donor</th>
                        <th>Jumlah Kantong</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($riwayat as $item)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            <div class="activity-name">

                                <div class="activity-icon">
                                    <i class="fas fa-tint"></i>
                                </div>

                                <span>
                                    {{ $item->hasilDonor->kegiatanDonor->nama_kegiatan
                                        ?? $item->kegiatanDonor->nama_kegiatan
                                        ?? '-' }}
                                </span>

                            </div>
                        </td>

                        <td>
                            {{ $item->hasilDonor->tanggal_donor
                                ?? $item->tanggal_donor
                                ?? '-' }}
                        </td>

                        <td>
                            <span class="blood-bag">
                                <i class="fas fa-tint"></i>

                                {{ $item->hasilDonor->jumlah_kantong
                                    ?? $item->jumlah_kantong
                                    ?? 0 }}

                                kantong
                            </span>
                        </td>

                        <td>
                            <span class="status-sehat">
                                {{ $item->hasilDonor->keterangan
                                    ?? $item->keterangan
                                    ?? 'Sehat' }}
                            </span>
                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="5">

                            <div class="empty-state">

                                <div class="empty-icon">
                                    <i class="fas fa-history"></i>
                                </div>

                                <h4>Belum Ada Riwayat Donor</h4>

                                <p>
                                    Riwayat donor kamu akan muncul
                                    setelah kamu melakukan donor.
                                </p>

                                <a href="{{ route('pendonor.kegiatan') }}"
                                   class="btn-donor">

                                    <i class="fas fa-calendar-alt"></i>
                                    Lihat Kegiatan Donor

                                </a>

                            </div>

                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

<style>

.donor-page {
    padding: 25px 28px;
    background: #fffaf7;
    min-height: calc(100vh - 72px);
}

.donor-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: linear-gradient(135deg, #fff5f3, #fffdfb);
    border: 1px solid #f1dddd;
    border-radius: 16px;
    padding: 22px 25px;
    margin-bottom: 20px;
    box-shadow: 0 5px 18px rgba(185, 91, 91, 0.06);
}

.donor-small-title {
    color: #c9364e;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.5px;
    margin-bottom: 4px;
}

.donor-header h1 {
    margin: 0;
    color: #3f3437;
    font-size: 23px;
    font-weight: 800;
}

.donor-header p {
    margin: 6px 0 0;
    color: #9b898c;
    font-size: 11px;
}

.donor-header-icon {
    width: 52px;
    height: 52px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 14px;
    background: #fde3e5;
    color: #c9364e;
    font-size: 21px;
}

.donor-card {
    background: #ffffff;
    border: 1px solid #f0dddd;
    border-radius: 16px;
    padding: 22px;
    box-shadow: 0 5px 20px rgba(185, 91, 91, 0.06);
}

.card-title-area {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 20px;
}

.title-icon {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    background: #fde7e8;
    color: #c9364e;
    font-size: 15px;
}

.card-title-area h3 {
    margin: 0;
    color: #493d40;
    font-size: 15px;
    font-weight: 800;
}

.card-title-area p {
    margin: 3px 0 0;
    color: #a18e91;
    font-size: 10px;
}

.donor-table {
    width: 100%;
    margin: 0;
    border-collapse: separate;
    border-spacing: 0;
    overflow: hidden;
    border: 1px solid #f1e4e2;
    border-radius: 12px;
}

.donor-table thead th {
    background: #fff3f2;
    color: #a64755;
    border: none;
    padding: 13px 12px;
    font-size: 10px;
    font-weight: 800;
    white-space: nowrap;
}

.donor-table tbody td {
    padding: 14px 12px;
    border-top: 1px solid #f4e9e7;
    color: #5d5154;
    font-size: 10px;
    vertical-align: middle;
}

.donor-table tbody tr:hover {
    background: #fffafa;
}

.activity-name {
    display: flex;
    align-items: center;
    gap: 9px;
    min-width: 190px;
}

.activity-icon {
    width: 31px;
    height: 31px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    background: #fde6e8;
    color: #c9364e;
    font-size: 11px;
}

.activity-name span {
    color: #4a3e41;
    font-weight: 700;
    line-height: 1.4;
}

.blood-bag {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    background: #fff0f0;
    color: #c9364e;
    padding: 6px 9px;
    border-radius: 7px;
    font-size: 9px;
    font-weight: 700;
}

.blood-bag i {
    font-size: 9px;
}

.status-sehat {
    display: inline-block;
    padding: 6px 10px;
    border-radius: 7px;
    background: #eaf7ed;
    color: #39814c;
    font-size: 9px;
    font-weight: 700;
}

.empty-state {
    text-align: center;
    padding: 45px 20px;
}

.empty-icon {
    width: 60px;
    height: 60px;
    margin: 0 auto 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: #fde7e8;
    color: #c9364e;
    font-size: 22px;
}

.empty-state h4 {
    margin: 0 0 6px;
    color: #514548;
    font-size: 14px;
    font-weight: 800;
}

.empty-state p {
    margin: 0 auto 17px;
    max-width: 350px;
    color: #a28f92;
    font-size: 10px;
    line-height: 1.6;
}

.btn-donor {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 9px 15px;
    border-radius: 8px;
    background: #d92b45;
    color: #ffffff !important;
    font-size: 10px;
    font-weight: 700;
    text-decoration: none;
}

.btn-donor:hover {
    background: #c6203a;
    color: #ffffff !important;
    text-decoration: none;
}

@media (max-width: 768px) {

    .donor-page {
        padding: 15px;
    }

    .donor-header {
        padding: 18px;
    }

    .donor-header h1 {
        font-size: 19px;
    }

    .donor-card {
        padding: 15px;
    }

    .donor-table {
        min-width: 700px;
    }

}

</style>

@endsection