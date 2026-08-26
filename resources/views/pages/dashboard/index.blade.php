@extends('layouts.app')

@section('title', 'Dashboard DonorConnect')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                    Pendonor
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                    0
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                    Kegiatan Donor
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                    0
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                    Riwayat Donor
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                    0
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                    Laporan Donor
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                    0
                </div>
            </div>
        </div>
    </div>

</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Selamat Datang di DonorConnect
        </h6>
    </div>

    <div class="card-body">
        <p class="mb-0">
            Selamat datang, {{ Auth::user()->nama }}!
        </p>
    </div>
</div>

@endsection