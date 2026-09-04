@extends('layouts.app')

@section('title', 'Ubah Profil - DonorConnect')

@section('content')

<div class="edit-page">

    <div class="page-title">
        <h1>Ubah Profil</h1>

        @if(isset($pendonor))
            <p>Perbarui informasi profil pendonor.</p>
        @elseif(isset($petugas))
            <p>Perbarui informasi profil petugas PMR.</p>
        @endif
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-circle"></i>

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="edit-card">

        <div class="edit-card-header">

            <div class="header-icon">
                <i class="fas fa-user-edit"></i>
            </div>

            <div>
                <h2>Ubah Profil</h2>

                @if(isset($pendonor))
                    <span>Perbarui data pribadi pendonor.</span>
                @elseif(isset($petugas))
                    <span>Perbarui data akun petugas PMR.</span>
                @endif
            </div>

        </div>

        <form action="{{ route('profile.update') }}" method="POST">

            @csrf
            @method('PUT')

            <div class="edit-body">

                @if(isset($pendonor))

                    <!-- Status -->
                    <div class="form-row">
                        <label>Status</label>

                        <input
                            type="text"
                            name="status"
                            value="{{ old('status', $pendonor->status) }}"
                            required
                        >
                    </div>

                    <!-- Kelas / Jabatan -->
                    <div class="form-row">
                        <label>Kelas / Jabatan</label>

                        <input
                            type="text"
                            name="kelas_jabatan"
                            value="{{ old('kelas_jabatan', $pendonor->kelas_jabatan) }}"
                            required
                        >
                    </div>

                    <!-- Tanggal Lahir -->
                    <div class="form-row">
                        <label>Tanggal Lahir</label>

                        <input
                            type="date"
                            name="tanggal_lahir"
                            value="{{ old('tanggal_lahir', optional($pendonor->tanggal_lahir)->format('Y-m-d')) }}"
                            required
                        >
                    </div>

                    <!-- Golongan Darah -->
                    <div class="form-row">
                        <label>Golongan Darah</label>

                        <input
                            type="text"
                            name="golongan_darah"
                            value="{{ old('golongan_darah', $pendonor->golongan_darah) }}"
                            required
                        >
                    </div>

                    <!-- No. Telepon -->
                    <div class="form-row">
                        <label>No. Telepon</label>

                        <input
                            type="text"
                            name="nomor_telepon"
                            value="{{ old('nomor_telepon', $pendonor->nomor_telepon) }}"
                            required
                        >
                    </div>

                    <!-- Informasi Kesehatan -->
                    <div class="form-row">
                        <label>Informasi Kesehatan</label>

                        <input
                            type="text"
                            name="informasi_kesehatan"
                            value="{{ old('informasi_kesehatan', $pendonor->informasi_kesehatan) }}"
                            required
                        >
                    </div>

                @elseif(isset($petugas))

                    <!-- Nama -->
                    <div class="form-row">
                        <label>Nama Lengkap</label>

                        <input
                            type="text"
                            name="nama"
                            value="{{ old('nama', $petugas->user->nama ?? '') }}"
                            required
                        >
                    </div>

                    <!-- Email -->
                    <div class="form-row">
                        <label>Email</label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email', $petugas->user->email ?? '') }}"
                            required
                        >
                    </div>

                @endif

            </div>

            <div class="edit-footer">

                <button type="submit" class="save-button">
                    <i class="fas fa-save"></i>
                    Simpan Perubahan
                </button>

                <a
                    href="{{ route('profile') }}"
                    class="cancel-button"
                >
                    Batal
                </a>

            </div>

        </form>

    </div>

</div>

@push('styles')

<style>

.edit-page {
    width: 100%;
    min-height: calc(100vh - 80px);
    padding: 25px 28px 35px;
    background: #fffafa;
}

.page-title {
    margin-bottom: 20px;
}

.page-title h1 {
    margin: 0 0 5px;
    color: #292733;
    font-size: 30px;
    font-weight: 800;
}

.page-title p {
    margin: 0;
    color: #8a8588;
    font-size: 13px;
}

.edit-card {
    width: 100%;
    background: #ffffff;
    border: 1px solid #f1e0e2;
    border-radius: 15px;
    box-shadow: 0 5px 18px rgba(168, 14, 44, 0.07);
    overflow: hidden;
}

.edit-card-header {
    padding: 22px 30px;
    display: flex;
    align-items: center;
    gap: 14px;
    border-bottom: 1px solid #f3e1e2;
}

.header-icon {
    width: 45px;
    height: 45px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(
        135deg,
        #a80e2c,
        #d94b91
    );
    color: #ffffff;
    border-radius: 10px;
}

.edit-card-header h2 {
    margin: 0 0 3px;
    color: #302e38;
    font-size: 17px;
    font-weight: 800;
}

.edit-card-header span {
    color: #999195;
    font-size: 10px;
}

.edit-body {
    padding: 25px 35px 10px;
}

.form-row {
    display: flex;
    align-items: center;
    min-height: 55px;
    border-bottom: 1px solid #f4eeee;
}

.form-row:last-child {
    border-bottom: none;
}

.form-row label {
    width: 210px;
    margin: 0;
    color: #575157;
    font-size: 12px;
    font-weight: 700;
}

.form-row input {
    flex: 1;
    height: 38px;
    padding: 8px 12px;
    border: 1px solid #eadfe1;
    border-radius: 7px;
    outline: none;
    background: #ffffff;
    color: #302e38;
    font-size: 12px;
}

.form-row input:focus {
    border-color: #d91e36;
    box-shadow: 0 0 0 2px rgba(217, 30, 54, 0.08);
}

.edit-footer {
    padding: 20px 35px 25px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.save-button,
.cancel-button {
    min-height: 39px;
    padding: 9px 20px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    border-radius: 7px;
    font-size: 11px;
    font-weight: 700;
    text-decoration: none !important;
    cursor: pointer;
}

.save-button {
    border: none;
    background: linear-gradient(
        135deg,
        #c9183b,
        #d94b91
    );
    color: #ffffff;
}

.save-button:hover {
    background: linear-gradient(
        135deg,
        #a80e2c,
        #c91859
    );
    color: #ffffff;
}

.cancel-button {
    border: 1px solid #ded7d8;
    background: #ffffff;
    color: #666064 !important;
}

.cancel-button:hover {
    background: #f5f3f3;
    color: #444044 !important;
}

.alert {
    margin-bottom: 20px;
    padding: 11px 15px;
    display: flex;
    align-items: flex-start;
    gap: 8px;
    border-radius: 8px;
    font-size: 12px;
}

.alert ul {
    margin: 0;
    padding-left: 18px;
}

.alert-danger {
    background: #fff0f1;
    border: 1px solid #f1cdd1;
    color: #a80e2c;
}

@media (max-width: 768px) {

    .edit-page {
        padding: 20px 15px 30px;
    }

    .page-title h1 {
        font-size: 25px;
    }

    .edit-body {
        padding: 20px;
    }

    .form-row {
        display: block;
        padding: 12px 0;
    }

    .form-row label {
        width: 100%;
        display: block;
        margin-bottom: 7px;
    }

    .form-row input {
        width: 100%;
    }

    .edit-footer {
        padding: 18px 20px 20px;
    }

}

@media (max-width: 480px) {

    .edit-page {
        padding: 18px 12px 25px;
    }

    .page-title h1 {
        font-size: 22px;
    }

    .edit-card-header {
        padding: 18px;
    }

    .edit-footer {
        flex-direction: column;
    }

    .save-button,
    .cancel-button {
        width: 100%;
    }

}

</style>

@endpush

@endsection