@extends('layouts.app')

@section('title', 'Ubah Profil - DonorConnect')

@section('content')

<div class="edit-profile-page">

    <div class="edit-card">

        {{-- Header --}}
        <div class="edit-header">

            <div class="header-icon">
                <i class="fas fa-user-edit"></i>
            </div>

            <div>
                <h1>Ubah Profil</h1>
                <p>Perbarui informasi akun kamu</p>
            </div>

        </div>

        <div class="edit-body">

            <form action="{{ route('profile.update') }}" method="POST">

                @csrf
                @method('PUT')

                {{-- Data Pendonor --}}
                @if(isset($pendonor))

                    <div class="form-section">

                        {{-- Nama --}}
                        <div class="form-group">

                            <label>Nama Lengkap</label>

                            <div class="input-box">
                                <i class="fas fa-user"></i>

                                <input
                                    type="text"
                                    value="{{ $pendonor->user->nama ?? '' }}"
                                    disabled
                                >
                            </div>

                        </div>

                        {{-- Status --}}
                        <div class="form-group">

                            <label>Status</label>

                            <div class="input-box">
                                <i class="fas fa-user-tag"></i>

                                <input
                                    type="text"
                                    name="status"
                                    value="{{ old('status', $pendonor->status) }}"
                                    placeholder="Masukkan status"
                                    required
                                >
                            </div>

                            @error('status')
                                <small class="error-text">{{ $message }}</small>
                            @enderror

                        </div>

                        {{-- Kelas / Jabatan --}}
                        <div class="form-group">

                            <label>Kelas / Jabatan</label>

                            <div class="input-box">
                                <i class="fas fa-briefcase"></i>

                                <input
                                    type="text"
                                    name="kelas_jabatan"
                                    value="{{ old('kelas_jabatan', $pendonor->kelas_jabatan) }}"
                                    placeholder="Masukkan kelas atau jabatan"
                                    required
                                >
                            </div>

                            @error('kelas_jabatan')
                                <small class="error-text">{{ $message }}</small>
                            @enderror

                        </div>

                        {{-- Tanggal Lahir --}}
                        <div class="form-group">

                            <label>Tanggal Lahir</label>

                            <div class="input-box">
                                <i class="fas fa-calendar-alt"></i>

                                <input
                                    type="date"
                                    name="tanggal_lahir"
                                    value="{{ old('tanggal_lahir', $pendonor->tanggal_lahir) }}"
                                    required
                                >
                            </div>

                            @error('tanggal_lahir')
                                <small class="error-text">{{ $message }}</small>
                            @enderror

                        </div>

                        {{-- Golongan Darah --}}
                        <div class="form-group">

                            <label>Golongan Darah</label>

                            <div class="input-box">
                                <i class="fas fa-tint"></i>

                                <input
                                    type="text"
                                    name="golongan_darah"
                                    value="{{ old('golongan_darah', $pendonor->golongan_darah) }}"
                                    placeholder="Contoh: A+"
                                    required
                                >
                            </div>

                            @error('golongan_darah')
                                <small class="error-text">{{ $message }}</small>
                            @enderror

                        </div>

                        {{-- Nomor Telepon --}}
                        <div class="form-group">

                            <label>Nomor Telepon</label>

                            <div class="input-box">
                                <i class="fas fa-phone"></i>

                                <input
                                    type="text"
                                    name="nomor_telepon"
                                    value="{{ old('nomor_telepon', $pendonor->nomor_telepon) }}"
                                    placeholder="Masukkan nomor telepon"
                                    required
                                >
                            </div>

                            @error('nomor_telepon')
                                <small class="error-text">{{ $message }}</small>
                            @enderror

                        </div>

                        {{-- Informasi Kesehatan --}}
                        <div class="form-group">

                            <label>Informasi Kesehatan</label>

                            <div class="textarea-box">
                                <i class="fas fa-notes-medical"></i>

                                <textarea
                                    name="informasi_kesehatan"
                                    rows="4"
                                    placeholder="Masukkan informasi kesehatan"
                                    required
                                >{{ old('informasi_kesehatan', $pendonor->informasi_kesehatan) }}</textarea>
                            </div>

                            @error('informasi_kesehatan')
                                <small class="error-text">{{ $message }}</small>
                            @enderror

                        </div>

                    </div>

                {{-- Data Petugas --}}
                @elseif(isset($petugas))

                    <div class="form-section">

                        {{-- Nama --}}
                        <div class="form-group">

                            <label>Nama Lengkap</label>

                            <div class="input-box">
                                <i class="fas fa-user"></i>

                                <input
                                    type="text"
                                    name="nama"
                                    value="{{ old('nama', $user->nama) }}"
                                    placeholder="Masukkan nama lengkap"
                                    required
                                >
                            </div>

                            @error('nama')
                                <small class="error-text">{{ $message }}</small>
                            @enderror

                        </div>

                        {{-- Email --}}
                        <div class="form-group">

                            <label>Email</label>

                            <div class="input-box">
                                <i class="fas fa-envelope"></i>

                                <input
                                    type="email"
                                    name="email"
                                    value="{{ old('email', $user->email) }}"
                                    placeholder="Masukkan email"
                                    required
                                >
                            </div>

                            @error('email')
                                <small class="error-text">{{ $message }}</small>
                            @enderror

                        </div>

                    </div>

                @endif

                {{-- Tombol --}}
                <div class="form-footer">

                    <a href="{{ route('profile') }}" class="cancel-button">
                        <i class="fas fa-arrow-left"></i>
                        Kembali
                    </a>

                    <button type="submit" class="save-button">
                        <i class="fas fa-check"></i>
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection


@push('styles')

<style>

.edit-profile-page {
    width: 100%;
    padding: 30px 20px;
}

.edit-card {
    width: 100%;
    max-width: 680px;
    margin: 0 auto;
    background: #ffffff;
    border: 1px solid #f0d8e1;
    border-radius: 22px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(201, 24, 91, 0.06);
}


/* Header */

.edit-header {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 25px 30px;
    background: #fff0f4;
    border-bottom: 1px solid #f3dce4;
}

.header-icon {
    width: 48px;
    height: 48px;
    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #d4145a;
    color: #ffffff;

    border-radius: 14px;
    font-size: 18px;

    box-shadow: 0 5px 12px rgba(212, 20, 90, 0.18);
}

.edit-header h1 {
    margin: 0;
    color: #292929;
    font-size: 23px;
    font-weight: 600;
}

.edit-header p {
    margin: 4px 0 0;
    color: #9a7d86;
    font-size: 12px;
}


/* Body */

.edit-body {
    padding: 30px;
}

.form-section {
    display: flex;
    flex-direction: column;
    gap: 20px;
}


/* Form */

.form-group {
    display: flex;
    flex-direction: column;
    gap: 7px;
}

.form-group label {
    color: #444444;
    font-size: 12px;
    font-weight: 600;
}

.input-box,
.textarea-box {
    display: flex;
    align-items: center;
    gap: 11px;

    padding: 0 14px;

    background: #fff8fa;
    border: 1px solid #edcfd9;
    border-radius: 12px;

    transition: 0.2s;
}

.input-box:hover,
.textarea-box:hover {
    border-color: #df3973;
}

.input-box:focus-within,
.textarea-box:focus-within {
    background: #ffffff;
    border-color: #d4145a;
    box-shadow: 0 0 0 3px rgba(212, 20, 90, 0.08);
}

.input-box i,
.textarea-box i {
    width: 17px;
    flex-shrink: 0;

    color: #d4145a;
    font-size: 13px;
    text-align: center;
}

.input-box input {
    width: 100%;
    height: 44px;

    border: none;
    outline: none;

    background: transparent;

    color: #444444;
    font-size: 13px;
}

.input-box input:disabled {
    color: #777777;
    cursor: not-allowed;
}

.input-box input::placeholder,
.textarea-box textarea::placeholder {
    color: #b99da6;
}

.textarea-box {
    align-items: flex-start;
    padding-top: 12px;
    padding-bottom: 12px;
}

.textarea-box textarea {
    width: 100%;
    min-height: 80px;

    padding: 0;

    border: none;
    outline: none;

    background: transparent;

    color: #444444;
    font-family: inherit;
    font-size: 13px;

    resize: vertical;
}


/* Error */

.error-text {
    color: #d4145a;
    font-size: 11px;
}


/* Footer */

.form-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;

    margin-top: 28px;
    padding-top: 22px;

    border-top: 1px solid #f1dfe5;
}

.cancel-button,
.save-button {
    height: 41px;
    padding: 0 17px;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    gap: 7px;

    border-radius: 11px;

    font-size: 12px;
    font-weight: 600;

    text-decoration: none;

    transition: 0.2s;
}

.cancel-button {
    color: #666666;
    background: #f7f7f7;
    border: 1px solid #e5e5e5;
}

.cancel-button:hover {
    background: #eeeeee;
}

.save-button {
    color: #ffffff;
    background: #d4145a;
    border: none;

    cursor: pointer;

    box-shadow: 0 5px 12px rgba(212, 20, 90, 0.18);
}

.save-button:hover {
    background: #b90f4d;
    transform: translateY(-1px);
}


/* Mobile */

@media (max-width: 600px) {

    .edit-profile-page {
        padding: 18px 12px;
    }

    .edit-card {
        border-radius: 18px;
    }

    .edit-header {
        padding: 21px 18px;
    }

    .header-icon {
        width: 43px;
        height: 43px;
        border-radius: 12px;
        font-size: 16px;
    }

    .edit-header h1 {
        font-size: 20px;
    }

    .edit-header p {
        font-size: 11px;
    }

    .edit-body {
        padding: 24px 18px;
    }

    .form-section {
        gap: 17px;
    }

    .form-footer {
        gap: 10px;
    }

    .cancel-button,
    .save-button {
        flex: 1;
    }

}

</style>

@endpush