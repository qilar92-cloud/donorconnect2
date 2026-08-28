@extends('layouts.app')

@section('title', 'Detail Kegiatan Donor - DonorConnect')

@section('content')

<!-- Bagian Judul -->

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


<!-- Bagian Detail Kegiatan -->

<div class="card shadow mb-4">

    <div class="card-header py-3">

        <h5 class="mb-0 font-weight-bold text-danger">
            {{ $kegiatan->nama_kegiatan }}
        </h5>

    </div>


    <div class="card-body">

        <!-- Bagian Nama Kegiatan -->

        <div class="row mb-3">

            <div class="col-md-4">
                <strong>Nama Kegiatan</strong>
            </div>

            <div class="col-md-8">
                {{ $kegiatan->nama_kegiatan }}
            </div>

        </div>


        <!-- Bagian Tanggal -->

        <div class="row mb-3">

            <div class="col-md-4">
                <strong>Tanggal</strong>
            </div>

            <div class="col-md-8">
                {{ \Carbon\Carbon::parse($kegiatan->tanggal)->format('d M Y') }}
            </div>

        </div>


        <!-- Bagian Waktu -->

        <div class="row mb-3">

            <div class="col-md-4">
                <strong>Waktu</strong>
            </div>

            <div class="col-md-8">
                {{ $kegiatan->waktu }}
            </div>

        </div>


        <!-- Bagian Lokasi -->

        <div class="row mb-3">

            <div class="col-md-4">
                <strong>Lokasi</strong>
            </div>

            <div class="col-md-8">
                {{ $kegiatan->lokasi }}
            </div>

        </div>


        <!-- Bagian Keterangan -->

        <div class="row mb-3">

            <div class="col-md-4">
                <strong>Keterangan</strong>
            </div>

            <div class="col-md-8">
                {{ $kegiatan->keterangan ?? '-' }}
            </div>

        </div>


        <!-- Bagian Status -->

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


    <!-- Bagian Tombol -->

    <div class="card-footer">

        @if (Auth::user()->role === 'pendonor')

            <a href="{{ route('pendonor.kegiatan') }}"
               class="btn btn-secondary">

                <span class="fa fa-arrow-left mr-1"></span>
                Kembali

            </a>

        @elseif (Auth::user()->role === 'petugas')

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

        @endif

    </div>

</div>

@endsection