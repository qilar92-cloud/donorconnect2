@extends('layouts.app')

@section('title', 'Profil Saya - DonorConnect')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profil Saya</h1>
</div>

<div class="row">

    <div class="col-lg-8">

        <div class="card shadow mb-4">

            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-user mr-2"></i>
                    Data Profil Pendonor
                </h5>
            </div>

            <div class="card-body">

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text"
                           class="form-control"
                           value="{{ $pendonor->user->nama ?? '-' }}"
                           readonly>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <input type="text"
                           class="form-control"
                           value="{{ $pendonor->status }}"
                           readonly>
                </div>

                <div class="form-group">
                    <label>Kelas / Jabatan</label>
                    <input type="text"
                           class="form-control"
                           value="{{ $pendonor->kelas_jabatan }}"
                           readonly>
                </div>

                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="text"
                           class="form-control"
                           value="{{ $pendonor->tanggal_lahir }}"
                           readonly>
                </div>

                <div class="form-group">
                    <label>Golongan Darah</label>
                    <input type="text"
                           class="form-control"
                           value="{{ $pendonor->golongan_darah }}"
                           readonly>
                </div>

                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="text"
                           class="form-control"
                           value="{{ $pendonor->nomor_telepon }}"
                           readonly>
                </div>

                <div class="form-group mb-0">
                    <label>Informasi Kesehatan</label>
                    <textarea class="form-control"
                              rows="3"
                              readonly>{{ $pendonor->informasi_kesehatan }}</textarea>
                </div>

            </div>

            <div class="card-footer">

                <a href="{{ route('profile.edit') }}"
                   class="btn btn-primary">
                    <span class="fa fa-edit mr-1"></span>
                    Ubah Profil
                </a>

            </div>

        </div>

    </div>

</div>

@endsection