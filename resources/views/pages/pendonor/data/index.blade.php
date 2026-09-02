@extends('layouts.app')

@section('title', 'Data Pendonor')

@section('content')

<style>
    .page-title {
        color: #3b3436;
        font-weight: 800;
        font-size: 24px;
        margin-bottom: 5px;
    }

    .page-subtitle {
        color: #8b7d80;
        font-size: 13px;
        margin-bottom: 25px;
    }

    /* Card total */
    .total-card {
        background: linear-gradient(135deg, #d91e36, #ed4055);
        border-radius: 16px;
        padding: 20px 24px;
        color: white;
        box-shadow: 0 6px 18px rgba(217, 30, 54, 0.16);
        margin-bottom: 22px;
        position: relative;
        overflow: hidden;
    }

    .total-card::after {
        content: '';
        position: absolute;
        width: 110px;
        height: 110px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.10);
        right: -30px;
        top: -35px;
    }

    .total-label {
        font-size: 12px;
        font-weight: 700;
        opacity: 0.9;
        margin-bottom: 5px;
    }

    .total-number {
        font-size: 30px;
        font-weight: 900;
        line-height: 1;
    }

    .total-icon {
        position: absolute;
        right: 25px;
        bottom: 18px;
        font-size: 35px;
        opacity: 0.85;
    }

    /* Card tabel */
    .data-card {
        background: #ffffff;
        border: 1px solid #f1dddd;
        border-radius: 16px;
        box-shadow: 0 5px 18px rgba(90, 55, 60, 0.05);
        overflow: hidden;
    }

    .data-card-header {
        padding: 20px 22px;
        border-bottom: 1px solid #f4e4e5;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        flex-wrap: wrap;
    }

    .data-card-title {
        font-size: 16px;
        font-weight: 800;
        color: #3b3436;
        margin: 0;
    }

    .data-card-title i {
        color: #d91e36;
        margin-right: 7px;
    }

    /* Search */
    .search-box {
        position: relative;
        width: 280px;
    }

    .search-box i {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #b69da1;
        font-size: 13px;
    }

    .search-box input {
        width: 100%;
        height: 38px;
        border: 1px solid #ead8da;
        border-radius: 10px;
        padding: 0 14px 0 38px;
        font-size: 12px;
        color: #4a4244;
        outline: none;
        transition: 0.2s;
    }

    .search-box input:focus {
        border-color: #d91e36;
        box-shadow: 0 0 0 3px rgba(217, 30, 54, 0.08);
    }

    /* Tabel */
    .table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    .pendonor-table {
        width: 100%;
        min-width: 900px;
        border-collapse: collapse;
    }

    .pendonor-table thead th {
        background: #fff5f5;
        color: #806f72;
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        padding: 14px 15px;
        border-bottom: 1px solid #f1dddd;
        white-space: nowrap;
    }

    .pendonor-table tbody td {
        padding: 15px;
        font-size: 12px;
        color: #51484a;
        border-bottom: 1px solid #f4e9e9;
        vertical-align: middle;
    }

    .pendonor-table tbody tr {
        transition: 0.2s;
    }

    .pendonor-table tbody tr:hover {
        background: #fffafa;
    }

    .nomor {
        color: #9a898c;
        font-weight: 700;
        width: 50px;
    }

    .nama-pendonor {
        font-weight: 800;
        color: #3f3739;
        white-space: nowrap;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 10px;
        font-weight: 800;
        background: #fff0f1;
        color: #d91e36;
        white-space: nowrap;
    }

    .darah-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 38px;
        height: 30px;
        border-radius: 9px;
        background: #d91e36;
        color: #ffffff;
        font-size: 11px;
        font-weight: 900;
    }

    .empty-state {
        text-align: center;
        padding: 45px 20px !important;
        color: #a49396 !important;
    }

    .empty-state i {
        display: block;
        font-size: 38px;
        color: #e8cacc;
        margin-bottom: 12px;
    }

    .empty-state strong {
        display: block;
        color: #6f6063;
        font-size: 14px;
        margin-bottom: 4px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .page-title {
            font-size: 21px;
        }

        .data-card-header {
            align-items: stretch;
        }

        .search-box {
            width: 100%;
        }

        .total-card {
            padding: 18px 20px;
        }
    }
</style>


<!-- Judul halaman -->
<div class="mb-2">
    <h1 class="page-title">
        Data Pendonor
    </h1>

    <p class="page-subtitle">
        Kelola dan lihat data pendonor yang terdaftar di DonorConnect.
    </p>
</div>


<!-- Total pendonor -->
<div class="total-card">
    <div class="total-label">
        TOTAL PENDONOR
    </div>

    <div class="total-number">
        {{ $pendonor->count() }}
    </div>

    <div class="total-icon">
        <i class="fas fa-users"></i>
    </div>
</div>


<!-- Data pendonor -->
<div class="data-card">

    <div class="data-card-header">

        <h2 class="data-card-title">
            <i class="fas fa-user-friends"></i>
            Daftar Pendonor
        </h2>

        <div class="search-box">
            <i class="fas fa-search"></i>

            <input
                type="text"
                id="searchPendonor"
                placeholder="Cari nama, status, golongan darah..."
            >
        </div>

    </div>


    <div class="table-wrapper">

        <table class="pendonor-table">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pendonor</th>
                    <th>Status</th>
                    <th>Kelas / Jabatan</th>
                    <th>Gol. Darah</th>
                    <th>No. Telepon</th>
                    <th>Informasi Kesehatan</th>
                </tr>
            </thead>

            <tbody id="pendonorTable">

                @forelse ($pendonor as $index => $item)

                    <tr>

                        <td class="nomor">
                            {{ $index + 1 }}
                        </td>

                        <td>
                            <div class="nama-pendonor">
                                {{ $item->user->nama ?? '-' }}
                            </div>
                        </td>

                        <td>
                            <span class="status-badge">
                                {{ $item->status ?? '-' }}
                            </span>
                        </td>

                        <td>
                            {{ $item->kelas_jabatan ?? '-' }}
                        </td>

                        <td>
                            <span class="darah-badge">
                                {{ $item->golongan_darah ?? '-' }}
                            </span>
                        </td>

                        <td>
                            {{ $item->nomor_telepon ?? '-' }}
                        </td>

                        <td>
                            {{ $item->informasi_kesehatan ?? '-' }}
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="7" class="empty-state">

                            <i class="fas fa-user-slash"></i>

                            <strong>
                                Belum ada data pendonor
                            </strong>

                            Belum terdapat pendonor yang terdaftar.

                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>


<!-- Pencarian -->
@push('scripts')
<script>
    document.getElementById('searchPendonor').addEventListener('keyup', function () {

        const keyword = this.value.toLowerCase();
        const rows = document.querySelectorAll('#pendonorTable tr');

        rows.forEach(function (row) {

            const text = row.innerText.toLowerCase();

            if (text.includes(keyword)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }

        });

    });
</script>
@endpush

@endsection@extends('layouts.app')

@section('title', 'Data Pendonor')

@section('content')

<style>
    .page-title {
        color: #3b3436;
        font-weight: 800;
        font-size: 24px;
        margin-bottom: 5px;
    }

    .page-subtitle {
        color: #8b7d80;
        font-size: 13px;
        margin-bottom: 25px;
    }

    /* Card total */
    .total-card {
        background: linear-gradient(135deg, #d91e36, #ed4055);
        border-radius: 16px;
        padding: 20px 24px;
        color: white;
        box-shadow: 0 6px 18px rgba(217, 30, 54, 0.16);
        margin-bottom: 22px;
        position: relative;
        overflow: hidden;
    }

    .total-card::after {
        content: '';
        position: absolute;
        width: 110px;
        height: 110px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.10);
        right: -30px;
        top: -35px;
    }

    .total-label {
        font-size: 12px;
        font-weight: 700;
        opacity: 0.9;
        margin-bottom: 5px;
    }

    .total-number {
        font-size: 30px;
        font-weight: 900;
        line-height: 1;
    }

    .total-icon {
        position: absolute;
        right: 25px;
        bottom: 18px;
        font-size: 35px;
        opacity: 0.85;
    }

    /* Card tabel */
    .data-card {
        background: #ffffff;
        border: 1px solid #f1dddd;
        border-radius: 16px;
        box-shadow: 0 5px 18px rgba(90, 55, 60, 0.05);
        overflow: hidden;
    }

    .data-card-header {
        padding: 20px 22px;
        border-bottom: 1px solid #f4e4e5;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        flex-wrap: wrap;
    }

    .data-card-title {
        font-size: 16px;
        font-weight: 800;
        color: #3b3436;
        margin: 0;
    }

    .data-card-title i {
        color: #d91e36;
        margin-right: 7px;
    }

    /* Search */
    .search-box {
        position: relative;
        width: 280px;
    }

    .search-box i {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: #b69da1;
        font-size: 13px;
    }

    .search-box input {
        width: 100%;
        height: 38px;
        border: 1px solid #ead8da;
        border-radius: 10px;
        padding: 0 14px 0 38px;
        font-size: 12px;
        color: #4a4244;
        outline: none;
        transition: 0.2s;
    }

    .search-box input:focus {
        border-color: #d91e36;
        box-shadow: 0 0 0 3px rgba(217, 30, 54, 0.08);
    }

    /* Tabel */
    .table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    .pendonor-table {
        width: 100%;
        min-width: 900px;
        border-collapse: collapse;
    }

    .pendonor-table thead th {
        background: #fff5f5;
        color: #806f72;
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        padding: 14px 15px;
        border-bottom: 1px solid #f1dddd;
        white-space: nowrap;
    }

    .pendonor-table tbody td {
        padding: 15px;
        font-size: 12px;
        color: #51484a;
        border-bottom: 1px solid #f4e9e9;
        vertical-align: middle;
    }

    .pendonor-table tbody tr {
        transition: 0.2s;
    }

    .pendonor-table tbody tr:hover {
        background: #fffafa;
    }

    .nomor {
        color: #9a898c;
        font-weight: 700;
        width: 50px;
    }

    .nama-pendonor {
        font-weight: 800;
        color: #3f3739;
        white-space: nowrap;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 10px;
        font-weight: 800;
        background: #fff0f1;
        color: #d91e36;
        white-space: nowrap;
    }

    .darah-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 38px;
        height: 30px;
        border-radius: 9px;
        background: #d91e36;
        color: #ffffff;
        font-size: 11px;
        font-weight: 900;
    }

    .empty-state {
        text-align: center;
        padding: 45px 20px !important;
        color: #a49396 !important;
    }

    .empty-state i {
        display: block;
        font-size: 38px;
        color: #e8cacc;
        margin-bottom: 12px;
    }

    .empty-state strong {
        display: block;
        color: #6f6063;
        font-size: 14px;
        margin-bottom: 4px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .page-title {
            font-size: 21px;
        }

        .data-card-header {
            align-items: stretch;
        }

        .search-box {
            width: 100%;
        }

        .total-card {
            padding: 18px 20px;
        }
    }
</style>


<!-- Judul halaman -->
<div class="mb-2">
    <h1 class="page-title">
        Data Pendonor
    </h1>

    <p class="page-subtitle">
        Kelola dan lihat data pendonor yang terdaftar di DonorConnect.
    </p>
</div>


<!-- Total pendonor -->
<div class="total-card">
    <div class="total-label">
        TOTAL PENDONOR
    </div>

    <div class="total-number">
        {{ $pendonor->count() }}
    </div>

    <div class="total-icon">
        <i class="fas fa-users"></i>
    </div>
</div>


<!-- Data pendonor -->
<div class="data-card">

    <div class="data-card-header">

        <h2 class="data-card-title">
            <i class="fas fa-user-friends"></i>
            Daftar Pendonor
        </h2>

        <div class="search-box">
            <i class="fas fa-search"></i>

            <input
                type="text"
                id="searchPendonor"
                placeholder="Cari nama, status, golongan darah..."
            >
        </div>

    </div>


    <div class="table-wrapper">

        <table class="pendonor-table">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pendonor</th>
                    <th>Status</th>
                    <th>Kelas / Jabatan</th>
                    <th>Gol. Darah</th>
                    <th>No. Telepon</th>
                    <th>Informasi Kesehatan</th>
                </tr>
            </thead>

            <tbody id="pendonorTable">

                @forelse ($pendonor as $index => $item)

                    <tr>

                        <td class="nomor">
                            {{ $index + 1 }}
                        </td>

                        <td>
                            <div class="nama-pendonor">
                                {{ $item->user->nama ?? '-' }}
                            </div>
                        </td>

                        <td>
                            <span class="status-badge">
                                {{ $item->status ?? '-' }}
                            </span>
                        </td>

                        <td>
                            {{ $item->kelas_jabatan ?? '-' }}
                        </td>

                        <td>
                            <span class="darah-badge">
                                {{ $item->golongan_darah ?? '-' }}
                            </span>
                        </td>

                        <td>
                            {{ $item->nomor_telepon ?? '-' }}
                        </td>

                        <td>
                            {{ $item->informasi_kesehatan ?? '-' }}
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="7" class="empty-state">

                            <i class="fas fa-user-slash"></i>

                            <strong>
                                Belum ada data pendonor
                            </strong>

                            Belum terdapat pendonor yang terdaftar.

                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>


<!-- Pencarian -->
@push('scripts')
<script>
    document.getElementById('searchPendonor').addEventListener('keyup', function () {

        const keyword = this.value.toLowerCase();
        const rows = document.querySelectorAll('#pendonorTable tr');

        rows.forEach(function (row) {

            const text = row.innerText.toLowerCase();

            if (text.includes(keyword)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }

        });

    });
</script>
@endpush

@endsection