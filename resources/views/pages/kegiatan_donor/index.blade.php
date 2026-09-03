@extends('layouts.app')

@section('title', 'Kegiatan Donor - DonorConnect')

@section('content')

    <div class="kegiatan-page">

        <!-- Header -->

        <div class="hero-card">

            <div class="hero-content">

                <span class="hero-label">DONORCONNECT</span>

                <h1>Kegiatan Donor</h1>

                <p>
                    Kelola seluruh kegiatan donor darah yang tersedia.
                </p>

                <div class="hero-stats">

                    <div class="hero-stat">
                        <i class="fas fa-calendar-alt"></i>
                        <div>
                            <strong>{{ $kegiatan->count() }}</strong>
                            <span>Total Kegiatan</span>
                        </div>
                    </div>

                </div>

            </div>

            <div class="hero-right">

                <div class="hero-circle"></div>

                <div class="hero-icon">
                    <i class="fas fa-heart"></i>
                </div>

            </div>

        </div>


        <!-- Tombol tambah -->

        <div class="top-action">

            <a href="{{ route('kegiatan-donor.create') }}" class="btn-add">

                <i class="fas fa-plus-circle"></i>

                Tambah Kegiatan

            </a>

        </div>


        <!-- Card -->

        <div class="table-card">

            <div class="table-header">

                <div>

                    <h3>Daftar Kegiatan Donor</h3>

                    <p>Data kegiatan yang sudah dibuat.</p>

                </div>

            </div>


            @if (session('success'))
                <div class="alert alert-success mx-4 mt-3">
                    {{ session('success') }}
                </div>
            @endif


            <div class="table-responsive p-4">

                <table class="table donor-table datatable">

                    <thead>

                        <tr>

                            <th>No</th>

                            <th>Nama Kegiatan</th>

                            <th>Tanggal</th>

                            <th>Waktu</th>

                            <th>Lokasi</th>

                            <th>Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($kegiatan as $item)
                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td>

                                    <div class="activity">

                                        <div class="activity-icon">
                                            <i class="fas fa-tint"></i>
                                        </div>

                                        <div>

                                            <strong>{{ $item->nama_kegiatan }}</strong>

                                            <small>Kegiatan donor darah</small>

                                        </div>

                                    </div>

                                </td>

                                <td>

                                    <span class="badge-date">

                                        <i class="fas fa-calendar-day"></i>

                                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}

                                    </span>

                                </td>

                                <td>

                                    <span class="badge-time">

                                        <i class="fas fa-clock"></i>

                                        {{ $item->waktu }}

                                    </span>

                                </td>

                                <td>

                                    <span class="badge-location">

                                        <i class="fas fa-map-marker-alt"></i>

                                        {{ $item->lokasi }}

                                    </span>

                                </td>

                                <td>

                                    <div class="action-group">

                                        <a href="{{ route('kegiatan-donor.show', $item->id_kegiatan) }}"
                                            class="btn-action detail">

                                            <i class="fas fa-eye"></i>

                                        </a>

                                        <a href="{{ route('kegiatan-donor.edit', $item->id_kegiatan) }}"
                                            class="btn-action edit">

                                            <i class="fas fa-edit"></i>

                                        </a>

                                        <button class="btn-action delete"
                                            onclick="actionDestroy('{{ route('kegiatan-donor.destroy', $item->id_kegiatan) }}')">

                                            <i class="fas fa-trash"></i>

                                        </button>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6">

                                    <div class="empty-state">

                                        <i class="fas fa-calendar-times"></i>

                                        <h4>Belum ada kegiatan donor</h4>

                                        <p>
                                            Tambahkan kegiatan donor pertama.
                                        </p>

                                    </div>

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>


    <form id="form-destroy" method="POST" style="display:none;">

        @csrf
        @method('DELETE')

    </form>

@endsection


@push('styles')
    <link rel="stylesheet" href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}">

    <style>
        .kegiatan-page {
            padding: 10px;
        }

        /* Header */

        .hero-card {

            background: linear-gradient(135deg, #7f1026, #b11736, #d81f45);

            border-radius: 24px;

            padding: 35px;

            color: white;

            display: flex;

            justify-content: space-between;

            align-items: center;

            overflow: hidden;

            position: relative;

            box-shadow: 0 18px 35px rgba(145, 22, 45, .25);

        }

        .hero-label {

            display: inline-block;

            background: rgba(255, 255, 255, .18);

            padding: 6px 12px;

            border-radius: 999px;

            font-size: 11px;

            letter-spacing: 1px;

            margin-bottom: 12px;

            font-weight: 800;

        }

        .hero-card h1 {

            font-size: 34px;

            font-weight: 900;

            margin-bottom: 8px;

        }

        .hero-card p {

            color: #ffe9ef;

            font-size: 15px;

        }

        .hero-stats {

            margin-top: 22px;

        }

        .hero-stat {

            display: inline-flex;

            align-items: center;

            gap: 12px;

            background: rgba(255, 255, 255, .14);

            padding: 12px 16px;

            border-radius: 16px;

        }

        .hero-stat i {

            font-size: 22px;

        }

        .hero-stat strong {

            display: block;

            font-size: 22px;

        }

        .hero-stat span {

            font-size: 12px;

        }

        .hero-right {

            position: relative;

            width: 170px;

            height: 170px;

        }

        .hero-circle {

            position: absolute;

            width: 170px;

            height: 170px;

            border-radius: 50%;

            background: rgba(255, 255, 255, .08);

        }

        .hero-icon {

            position: absolute;

            inset: 25px;

            background: white;

            border-radius: 50%;

            display: flex;

            align-items: center;

            justify-content: center;

            color: #c01839;

            font-size: 55px;

        }

        /* Tombol */

        .top-action {

            display: flex;

            justify-content: flex-end;

            margin: 22px 0;

        }

        .btn-add {

            background: #c01839;

            color: white !important;

            text-decoration: none;

            padding: 13px 20px;

            border-radius: 12px;

            font-weight: 800;

            box-shadow: 0 8px 18px rgba(192, 24, 57, .25);

        }

        .btn-add:hover {

            background: #9d1430;

        }

        /* Card */

        .table-card {

            background: white;

            border-radius: 22px;

            overflow: hidden;

            box-shadow: 0 10px 28px rgba(60, 40, 45, .08);

        }

        .table-header {

            padding: 24px;

            background: #fff5f6;

            border-bottom: 1px solid #f3d7dc;

        }

        .table-header h3 {

            font-size: 24px;

            font-weight: 900;

            color: #3a2b30;

        }

        .table-header p {

            margin: 0;

            color: #846b72;

        }

        /* Table */

        .donor-table {

            margin: 0;

        }

        .donor-table thead th {

            background: #c01839;

            color: white;

            border: none;

            padding: 16px;

            font-size: 13px;

            font-weight: 800;

        }

        .donor-table tbody td {

            padding: 18px 16px;

            border-top: 1px solid #f3e6e8;

            vertical-align: middle;

            font-size: 14px;

            color: #3a2b30;

        }

        .donor-table tbody tr:hover {

            background: #fff8f9;

        }

        /* Activity */

        .activity {

            display: flex;

            align-items: center;

            gap: 14px;

        }

        .activity-icon {

            width: 46px;

            height: 46px;

            border-radius: 14px;

            background: #ffe7eb;

            display: flex;

            align-items: center;

            justify-content: center;

            color: #c01839;

            font-size: 18px;

        }

        .activity strong {

            display: block;

            font-size: 15px;

        }

        .activity small {

            color: #8d737a;

        }

        /* Badge */

        .badge-date,
        .badge-time,
        .badge-location {

            display: inline-flex;

            align-items: center;

            gap: 8px;

            padding: 9px 12px;

            border-radius: 999px;

            font-size: 13px;

            font-weight: 700;

        }

        .badge-date {

            background: #fff0f2;

            color: #c01839;

        }

        .badge-time {

            background: #eef8ff;

            color: #1565c0;

        }

        .badge-location {

            background: #eef9f0;

            color: #2e7d32;

        }

        /* Aksi */

        .action-group {

            display: flex;

            gap: 8px;

        }

        .btn-action {

            width: 38px;

            height: 38px;

            border: none;

            border-radius: 10px;

            display: flex;

            align-items: center;

            justify-content: center;

            cursor: pointer;

            transition: .2s;

        }

        .detail {

            background: #fff0f2;

            color: #c01839;

        }

        .edit {

            background: #fff5df;

            color: #b77700;

        }

        .delete {

            background: #ffe7eb;

            color: #c01839;

        }

        .btn-action:hover {

            transform: translateY(-2px);

        }

        /* Empty */

        .empty-state {

            text-align: center;

            padding: 55px 20px;

        }

        .empty-state i {

            font-size: 45px;

            color: #d7a3af;

        }

        .empty-state h4 {

            margin-top: 14px;

            font-weight: 900;

            color: #4b383d;

        }

        .empty-state p {

            color: #8a757a;

        }

        /* DataTables */

        .dataTables_filter input {

            border-radius: 12px !important;

            border: 1px solid #e5cfd4 !important;

            padding: 8px 12px !important;

        }

        .dataTables_length select {

            border-radius: 10px !important;

        }

        .dataTables_wrapper .paginate_button.current {

            background: #c01839 !important;

            border-color: #c01839 !important;

            color: white !important;

        }

        @media(max-width:768px) {

            .hero-card {

                flex-direction: column;

                text-align: center;

            }

            .hero-right {

                margin-top: 25px;

            }

            .top-action {

                justify-content: stretch;

            }

            .btn-add {

                width: 100%;

                text-align: center;

            }

        }
    </style>
@endpush


@push('scripts')
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>

    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script>
        $(function() {

            $('.datatable').DataTable({

                language: {

                    search: "Cari:",

                    lengthMenu: "Tampilkan _MENU_ data",

                    zeroRecords: "Data tidak ditemukan",

                    info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",

                    paginate: {

                        first: "Awal",

                        last: "Akhir",

                        next: "›",

                        previous: "‹"

                    }

                }

            });

        });

        // Hapus kegiatan

        function actionDestroy(url) {

            Swal.fire({

                title: 'Hapus kegiatan?',

                text: 'Data tidak bisa dikembalikan.',

                icon: 'warning',

                showCancelButton: true,

                confirmButtonColor: '#c01839',

                cancelButtonText: 'Batal',

                confirmButtonText: 'Ya, hapus'

            }).then((result) => {

                if (result.isConfirmed) {

                    $('#form-destroy').attr('action', url).submit();

                }

            });

        }
    </script>
@endpush
