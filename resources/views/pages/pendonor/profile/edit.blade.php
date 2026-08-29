@extends('layouts.app')

@section('title', 'Ubah Profil - DonorConnect')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <h1 class="h3 mb-1 text-gray-800">Ubah Profil</h1>
        <p class="mb-0 text-muted">
            Perbarui informasi profil pendonor.
        </p>
    </div>
</div>

<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h5 class="mb-0 font-weight-bold text-danger">
            <i class="fas fa-user-edit mr-2"></i>
            Form Ubah Profil
        </h5>
    </div>

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card-body">

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

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
                       name="status"
                       class="form-control"
                       value="{{ old('status', $pendonor->status) }}"
                       required>
            </div>

            <div class="form-group">
                <label>Kelas / Jabatan</label>
                <input type="text"
                       name="kelas_jabatan"
                       class="form-control"
                       value="{{ old('kelas_jabatan', $pendonor->kelas_jabatan) }}"
                       required>
            </div>

            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date"
                       name="tanggal_lahir"
                       class="form-control"
                       value="{{ old('tanggal_lahir', $pendonor->tanggal_lahir) }}"
                       required>
            </div>

            <div class="form-group">
                <label>Golongan Darah</label>
                <input type="text"
                       name="golongan_darah"
                       class="form-control"
                       value="{{ old('golongan_darah', $pendonor->golongan_darah) }}"
                       required>
            </div>

            <div class="form-group">
                <label>Nomor Telepon</label>
                <input type="text"
                       name="nomor_telepon"
                       class="form-control"
                       value="{{ old('nomor_telepon', $pendonor->nomor_telepon) }}"
                       required>
            </div>

            <div class="form-group">
                <label>Informasi Kesehatan</label>
                <textarea name="informasi_kesehatan"
                          class="form-control"
                          rows="3"
                          required>{{ old('informasi_kesehatan', $pendonor->informasi_kesehatan) }}</textarea>
            </div>

        </div>

        <div class="card-footer">

            <a href="{{ route('profile') }}"
               class="btn btn-secondary">
                <span class="fa fa-arrow-left mr-1"></span>
                Kembali
            </a>

            <button type="submit" class="btn btn-primary">
                <span class="fa fa-save mr-1"></span>
                Simpan Perubahan
            </button>

        </div>

    </form>

</div>

@endsection