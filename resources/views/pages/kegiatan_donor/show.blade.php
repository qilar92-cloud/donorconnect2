@extends('layouts.app')

@section('title', 'Detail Kegiatan Donor - DonorConnect')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Kegiatan Donor</h1>
</div>

<div class="card shadow mb-4">

    <div class="card-header">
        <h5 class="card-title mb-0">
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

    </div>

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