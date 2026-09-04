@extends('layouts.app')

@section('title', 'Edit Kegiatan Donor - DonorConnect')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Kegiatan Donor</h1>
</div>

<div class="row">
    <div class="col-md-8">

        <div class="card shadow mb-4">

            <div class="card-header">
                <h5 class="card-title mb-0">Edit Kegiatan Donor</h5>
            </div>

            <form action="{{ route('kegiatan-donor.update', $kegiatan->id_kegiatan) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card-body">

                    <!-- Nama kegiatan -->
                    <div class="form-group mb-3">
                        <label for="nama_kegiatan">Nama Kegiatan</label>

                        <input
                            type="text"
                            name="nama_kegiatan"
                            id="nama_kegiatan"
                            value="{{ old('nama_kegiatan', $kegiatan->nama_kegiatan) }}"
                            class="form-control @error('nama_kegiatan') is-invalid @enderror"
                            placeholder="Masukkan nama kegiatan donor"
                            required
                        >

                        @error('nama_kegiatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Tanggal -->
                    <div class="form-group mb-3">
                        <label for="tanggal">Tanggal</label>

                        <input
                            type="date"
                            name="tanggal"
                            id="tanggal"
                            value="{{ old('tanggal', optional($kegiatan->tanggal)->format('Y-m-d')) }}"
                            class="form-control @error('tanggal') is-invalid @enderror"
                            required
                        >

                        @error('tanggal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Waktu -->
                    <div class="form-group mb-3">
                        <label for="waktu">Waktu</label>

                        <input
                            type="text"
                            name="waktu"
                            id="waktu"
                            value="{{ old('waktu', $kegiatan->waktu) }}"
                            class="form-control @error('waktu') is-invalid @enderror"
                            placeholder="Contoh: 08:00 - 12:00"
                            required
                        >

                        @error('waktu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Lokasi -->
                    <div class="form-group mb-3">
                        <label for="lokasi">Lokasi</label>

                        <input
                            type="text"
                            name="lokasi"
                            id="lokasi"
                            value="{{ old('lokasi', $kegiatan->lokasi) }}"
                            class="form-control @error('lokasi') is-invalid @enderror"
                            placeholder="Masukkan lokasi kegiatan"
                            required
                        >

                        @error('lokasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Keterangan -->
                    <div class="form-group mb-0">
                        <label for="keterangan">Keterangan</label>

                        <textarea
                            name="keterangan"
                            id="keterangan"
                            rows="4"
                            class="form-control @error('keterangan') is-invalid @enderror"
                            placeholder="Masukkan keterangan kegiatan (opsional)"
                        >{{ old('keterangan', $kegiatan->keterangan) }}</textarea>

                        @error('keterangan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>

                <div class="card-footer">

                    <button type="submit" class="btn btn-primary">
                        <span class="fa fa-save mr-1"></span>
                        Update
                    </button>

                    <a
                        href="{{ route('kegiatan-donor.index') }}"
                        class="btn btn-secondary"
                    >
                        <span class="fa fa-times-circle mr-1"></span>
                        Batal
                    </a>

                </div>

            </form>

        </div>

    </div>
</div>

@endsection