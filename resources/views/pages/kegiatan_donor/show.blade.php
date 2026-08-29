@extends('layouts.app')

@section('title', 'Detail Kegiatan Donor - DonorConnect')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <h1 class="h3 mb-1 text-gray-800">
            Detail Kegiatan Donor
        </h1>

        <p class="mb-0 text-muted">
            Informasi lengkap kegiatan donor.
        </p>
    </div>
</div>


<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h5 class="mb-0 font-weight-bold text-danger">
            {{ $kegiatan->nama_kegiatan }}
        </h5>
    </div>


    <div class="card-body">

        <div class="row mb-3">
            <div class="col-md-4">
                <strong>Nama Kegiatan</strong>
            </div>

            <div class="col-md-8">
                {{ $kegiatan->nama_kegiatan }}
            </div>
        </div>


        <div class="row mb-3">
            <div class="col-md-4">
                <strong>Tanggal</strong>
            </div>

            <div class="col-md-8">
                {{ $kegiatan->tanggal->format('d M Y') }}
            </div>
        </div>


        <div class="row mb-3">
            <div class="col-md-4">
                <strong>Waktu</strong>
            </div>

            <div class="col-md-8">
                {{ $kegiatan->waktu }}
            </div>
        </div>


        <div class="row mb-3">
            <div class="col-md-4">
                <strong>Lokasi</strong>
            </div>

            <div class="col-md-8">
                {{ $kegiatan->lokasi }}
            </div>
        </div>


        <div class="row mb-3">
            <div class="col-md-4">
                <strong>Keterangan</strong>
            </div>

            <div class="col-md-8">
                {{ $kegiatan->keterangan ?? '-' }}
            </div>
        </div>


        <div class="row mb-3">
            <div class="col-md-4">
                <strong>Status</strong>
            </div>

            <div class="col-md-8">
                <span class="badge badge-success">
                    Tersedia
                </span>
            </div>
        </div>

    </div>

</div>


<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h5 class="mb-0 font-weight-bold text-danger">
            Pendonor yang Mendaftar
        </h5>
    </div>


    <div class="card-body">

        @if ($kegiatan->pendaftaranDonor->count() > 0)

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pendonor</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($kegiatan->pendaftaranDonor as $pendaftaran)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{ $pendaftaran->pendonor->user->nama ?? '-' }}
                                </td>

                                <td>

                                    @if ($pendaftaran->status_pendaftaran == 'menunggu')
                                        <span class="badge badge-warning">
                                            Menunggu
                                        </span>

                                    @elseif ($pendaftaran->status_pendaftaran == 'diterima')
                                        <span class="badge badge-success">
                                            Diterima
                                        </span>

                                    @elseif ($pendaftaran->status_pendaftaran == 'ditolak')
                                        <span class="badge badge-danger">
                                            Ditolak
                                        </span>

                                    @else
                                        <span class="badge badge-secondary">
                                            {{ $pendaftaran->status_pendaftaran ?? '-' }}
                                        </span>
                                    @endif

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="text-center text-muted py-4">
                Belum ada pendonor yang mendaftar pada kegiatan ini.
            </div>

        @endif

    </div>

</div>


<div class="card shadow mb-4">

    <div class="card-footer">

        <a href="{{ route('kegiatan-donor.index') }}"
           class="btn btn-secondary">

            <span class="fa fa-arrow-left mr-1"></span>
            Kembali

        </a>

        <a href="{{ route('kegiatan-donor.edit', $kegiatan->id_kegiatan) }}"
           class="btn btn-primary">

            <span class="fa fa-edit mr-1"></span>
            Edit

        </a>

    </div>

</div>

@endsection