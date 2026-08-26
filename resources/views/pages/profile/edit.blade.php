@extends('layouts.app')

@section('title', 'Ubah Profil - DonorConnect')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Ubah Profil</h1>
</div>

<div class="row">
    <div class="col-lg-8">

        <div class="card shadow mb-4">

            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-user-edit mr-2"></i>
                    Edit Profil Pendonor
                </h5>
            </div>

            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card-body">

                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text"
                               name="status"
                               id="status"
                               value="{{ old('status', $pendonor->status) }}"
                               class="form-control @error('status') is-invalid @enderror">

                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="kelas_jabatan">Kelas / Jabatan</label>
                        <input type="text"
                               name="kelas_jabatan"
                               id="kelas_jabatan"
                               value="{{ old('kelas_jabatan', $pendonor->kelas_jabatan) }}"
                               class="form-control @error('kelas_jabatan') is-invalid @enderror">

                        @error('kelas_jabatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date"
                               name="tanggal_lahir"
                               id="tanggal_lahir"
                               value="{{ old('tanggal_lahir', $pendonor->tanggal_lahir) }}"
                               class="form-control @error('tanggal_lahir') is-invalid @enderror">

                        @error('tanggal_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="golongan_darah">Golongan Darah</label>
                        <input type="text"
                               name="golongan_darah"
                               id="golongan_darah"
                               value="{{ old('golongan_darah', $pendonor->golongan_darah) }}"
                               class="form-control @error('golongan_darah') is-invalid @enderror">

                        @error('golongan_darah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nomor_telepon">Nomor Telepon</label>
                        <input type="text"
                               name="nomor_telepon"
                               id="nomor_telepon"
                               value="{{ old('nomor_telepon', $pendonor->nomor_telepon) }}"
                               class="form-control @error('nomor_telepon') is-invalid @enderror">

                        @error('nomor_telepon')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mb-0">
                        <label for="informasi_kesehatan">
                            Informasi Kesehatan
                        </label>

                        <textarea name="informasi_kesehatan"
                                  id="informasi_kesehatan"
                                  rows="4"
                                  class="form-control @error('informasi_kesehatan') is-invalid @enderror">{{ old('informasi_kesehatan', $pendonor->informasi_kesehatan) }}</textarea>

                        @error('informasi_kesehatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>

                <div class="card-footer">

                    <button type="submit" class="btn btn-primary">
                        <span class="fa fa-save mr-1"></span>
                        Simpan Perubahan
                    </button>

                    <a href="{{ route('profile') }}"
                       class="btn btn-secondary">
                        <span class="fa fa-times-circle mr-1"></span>
                        Batal
                    </a>

                </div>

            </form>

        </div>

    </div>
</div>

@endsection