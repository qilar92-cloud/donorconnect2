@extends('layouts.app')

@section('title', 'Kegiatan Donor - DonorConnect')

@section('content')

<!-- Bagian Judul -->

<div class="d-sm-flex align-items-center justify-content-between mb-4">

    <div>
        <h1 class="h3 mb-1 text-gray-800">
            Kegiatan Donor
        </h1>

        <p class="mb-0 text-muted">
            Lihat informasi kegiatan donor yang tersedia.
        </p>
    </div>

</div>


<!-- Bagian Daftar Kegiatan -->

<div class="card shadow mb-4">

    <div class="card-header py-3">

        <h5 class="mb-0 font-weight-bold text-danger">
            Kegiatan Donor Tersedia
        </h5>

    </div>


    <div class="card-body">

        <!-- Bagian Pencarian -->

        <div class="mb-4">

            <input
                type="text"
                id="searchKegiatan"
                class="form-control"
                placeholder="Cari kegiatan donor..."
            >

        </div>


        <!-- Bagian Tabel -->

        <div class="table-responsive">

            <table class="table table-hover" id="tabelKegiatan">

                <thead>

                    <tr>

                        <th>No</th>

                        <th>Nama Kegiatan</th>

                        <th>Tanggal</th>

                        <th>Waktu</th>

                        <th>Lokasi</th>

                        <th>Status</th>

                        <th>Aksi</th>

                    </tr>

                </thead>


                <tbody>

                    @forelse ($kegiatan as $item)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>


                            <td>

                                <strong>
                                    {{ $item->nama_kegiatan }}
                                </strong>

                            </td>


                            <td>

                                {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}

                            </td>


                            <td>

                                {{ $item->waktu }}

                            </td>


                            <td>

                                {{ $item->lokasi }}

                            </td>


                            <td>

                                <span class="badge badge-success">
                                    Tersedia
                                </span>

                            </td>


                            <td>

                                <!-- Bagian Tombol Lihat Detail -->

                                <a
                                    href="{{ route('pendonor.kegiatan.show', $item->id_kegiatan) }}"
                                    class="btn btn-sm btn-danger">

                                    Lihat Detail

                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="7"
                                class="text-center text-muted py-4"
                            >

                                Belum ada kegiatan donor tersedia.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection


@push('styles')

<style>

    /* Bagian Tampilan */

    .card {
        border: none;
        border-radius: 12px;
    }


    .card-header {
        background: #ffffff;
        border-bottom: 1px solid #f1dfe2;
    }


    #searchKegiatan {
        border-radius: 8px;
        border: 1px solid #ead7da;
        height: 42px;
    }


    #searchKegiatan:focus {
        border-color: #d91e36;
        box-shadow: 0 0 0 0.15rem rgba(217, 30, 54, 0.10);
    }


    .table thead th {
        border-top: none;
        font-size: 13px;
        color: #555;
    }


    .table tbody td {
        vertical-align: middle;
        font-size: 13px;
    }


    .badge-success {
        background: #e8f7ee;
        color: #198754;
        padding: 7px 10px;
        border-radius: 20px;
        font-weight: 600;
    }


    .btn-danger {
        background: #d91e36;
        border-color: #d91e36;
        border-radius: 7px;
        font-size: 12px;
        font-weight: 600;
    }


    .btn-danger:hover {
        background: #c91830;
        border-color: #c91830;
    }

</style>

@endpush


@push('scripts')

<script>

    // Bagian Pencarian Kegiatan

    $('#searchKegiatan').on('keyup', function () {

        let value = $(this).val().toLowerCase();

        $('#tabelKegiatan tbody tr').filter(function () {

            $(this).toggle(
                $(this).text().toLowerCase().indexOf(value) > -1
            );

        });

    });

</script>

@endpush