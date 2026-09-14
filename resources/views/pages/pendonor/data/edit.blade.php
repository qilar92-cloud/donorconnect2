@extends('layouts.app')

@section('title', 'Edit Pendonor')

@section('content')

<style>
    .pendonor-page {
        min-height: 100vh;
        padding: 25px 30px 35px;
        background: #fff9f6;
    }

    /* Header */
    .page-header {
        max-width: 1050px;
        margin: 0 auto 18px;
    }

    .page-header small {
        display: flex;
        align-items: center;
        gap: 7px;
        margin-bottom: 5px;
        color: #c9365c;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 1.3px;
        text-transform: uppercase;
    }

    .page-header small i {
        font-size: 10px;
    }

    .page-header h1 {
        margin: 0;
        color: #30313f;
        font-size: 28px;
        font-weight: 800;
    }

    .page-header p {
        margin: 5px 0 0;
        color: #94919a;
        font-size: 12px;
    }

    /* Card */
    .form-card {
        max-width: 1050px;
        margin: 0 auto;
        overflow: hidden;
        background: #fff;
        border: 1px solid #f0e2e7;
        border-radius: 20px;
        box-shadow: 0 8px 28px rgba(120, 45, 70, .06);
    }

    /* Account */
    .account-info {
        display: flex;
        align-items: center;
        gap: 13px;
        padding: 19px 25px;
        background: linear-gradient(
            135deg,
            #fff5f7,
            #fff
        );
        border-bottom: 1px solid #f2e6e9;
    }

    .avatar {
        width: 53px;
        height: 53px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 15px;
        background: linear-gradient(135deg, #ed5573, #d93659);
        color: #fff;
        font-size: 21px;
        font-weight: 800;
        box-shadow: 0 6px 15px rgba(217, 54, 89, .15);
    }

    .account-text {
        min-width: 0;
    }

    .account-text span {
        display: block;
        margin-bottom: 3px;
        color: #c9365c;
        font-size: 8px;
        font-weight: 800;
        letter-spacing: 1.2px;
        text-transform: uppercase;
    }

    .account-text h2 {
        overflow: hidden;
        margin: 0 0 3px;
        color: #34323e;
        font-size: 16px;
        font-weight: 800;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .account-text p {
        overflow: hidden;
        margin: 0;
        color: #9a969e;
        font-size: 10px;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    /* Form */
    .form-body {
        padding: 20px 25px 21px;
    }

    .form-heading {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 13px;
    }

    .form-heading h3 {
        margin: 0;
        color: #393744;
        font-size: 14px;
        font-weight: 800;
    }

    .form-heading span {
        color: #aaa5ab;
        font-size: 9px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
    }

    .form-group {
        min-width: 0;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }

    .form-group label {
        display: block;
        margin: 0 0 5px 2px;
        color: #55525c;
        font-size: 9px;
        font-weight: 800;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        box-sizing: border-box;
        border: 1px solid #eadfe3;
        border-radius: 10px;
        outline: none;
        background: #fff;
        color: #3c3a45;
        font-family: inherit;
        font-size: 10px;
        transition: .2s ease;
    }

    .form-group input,
    .form-group select {
        height: 38px;
        padding: 0 11px;
    }

    .form-group textarea {
        min-height: 65px;
        padding: 10px 11px;
        resize: vertical;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        border-color: #ed5573;
        box-shadow: 0 0 0 3px rgba(237, 85, 115, .08);
    }

    .readonly {
        background: #f8f5f6 !important;
        color: #99949a !important;
        cursor: not-allowed;
    }

    .readonly-info {
        display: block;
        margin: 4px 0 0 2px;
        color: #aaa5aa;
        font-size: 7px;
    }

    .error {
        display: block;
        margin: 4px 0 0 2px;
        color: #d93659;
        font-size: 8px;
    }

    /* Footer */
    .form-footer {
        display: flex;
        justify-content: flex-end;
        gap: 9px;
        padding: 13px 25px;
        border-top: 1px solid #f1e6e9;
        background: #fffafa;
    }

    .btn {
        height: 37px;
        padding: 0 14px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        border: none;
        border-radius: 10px;
        font-size: 10px;
        font-weight: 800;
        text-decoration: none !important;
        cursor: pointer;
        transition: .2s ease;
    }

    .btn-back {
        background: #f4f0f1;
        color: #77737a !important;
    }

    .btn-back:hover {
        background: #ebe5e7;
    }

    .btn-save {
        background: linear-gradient(135deg, #ed5573, #d93659);
        color: #fff !important;
        box-shadow: 0 5px 13px rgba(217, 54, 89, .15);
    }

    .btn-save:hover {
        transform: translateY(-1px);
        color: #fff !important;
    }

    /* Tablet */
    @media (max-width: 850px) {
        .pendonor-page {
            padding: 20px;
        }

        .account-info {
            padding: 17px 20px;
        }

        .form-body {
            padding: 18px 20px;
        }

        .form-footer {
            padding: 12px 20px;
        }
    }

    /* HP */
    @media (max-width: 600px) {
        .pendonor-page {
            padding: 14px 12px 25px;
        }

        .page-header {
            margin-bottom: 13px;
        }

        .page-header small {
            font-size: 9px;
            letter-spacing: 1px;
        }

        .page-header h1 {
            font-size: 21px;
        }

        .page-header p {
            font-size: 10px;
        }

        .form-card {
            border-radius: 16px;
        }

        .account-info {
            padding: 14px 16px;
            gap: 10px;
        }

        .avatar {
            width: 46px;
            height: 46px;
            border-radius: 13px;
            font-size: 18px;
        }

        .account-text span {
            font-size: 6.5px;
        }

        .account-text h2 {
            font-size: 14px;
        }

        .account-text p {
            font-size: 8.5px;
        }

        .form-body {
            padding: 15px 16px 16px;
        }

        .form-heading {
            margin-bottom: 9px;
        }

        .form-heading h3 {
            font-size: 12px;
        }

        .form-heading span {
            font-size: 7px;
        }

        .form-grid {
            gap: 8px;
        }

        .form-group label {
            margin-bottom: 4px;
            font-size: 7.5px;
        }

        .form-group input,
        .form-group select {
            height: 36px;
            padding: 0 9px;
            border-radius: 9px;
            font-size: 9px;
        }

        .form-group textarea {
            min-height: 58px;
            padding: 8px 9px;
            border-radius: 9px;
            font-size: 9px;
        }

        .readonly-info {
            font-size: 6px;
        }

        .error {
            font-size: 7px;
        }

        .form-footer {
            padding: 10px 16px;
        }

        .btn {
            height: 35px;
            padding: 0 11px;
            font-size: 9px;
        }
    }

    /* HP kecil */
    @media (max-width: 380px) {
        .pendonor-page {
            padding: 12px 10px 20px;
        }

        .account-info {
            padding: 13px;
        }

        .avatar {
            width: 43px;
            height: 43px;
            font-size: 17px;
        }

        .account-text h2 {
            font-size: 13px;
        }

        .form-body {
            padding: 14px 13px;
        }

        .form-grid {
            gap: 7px;
        }

        .form-footer {
            padding: 9px 13px;
        }
    }
</style>

<div class="pendonor-page">

    {{-- Header --}}
    <div class="page-header">

        <small>
            <i class="fas fa-users"></i>
            Data Pendonor
        </small>

        <h1>Edit Pendonor</h1>

        <p>Perbarui informasi pendonor yang diperlukan.</p>

    </div>

    <div class="form-card">

        {{-- Akun --}}
        <div class="account-info">

            <div class="avatar">
                {{ strtoupper(substr($pendonor->user->nama ?? 'P', 0, 1)) }}
            </div>

            <div class="account-text">

                <span>Pendonor</span>

                <h2>
                    {{ $pendonor->user->nama ?? '-' }}
                </h2>

                <p>
                    {{ $pendonor->user->email ?? '-' }}
                </p>

            </div>

        </div>

        <form
            action="{{ route('pendonor.update', $pendonor->id_pendonor) }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            {{-- Form --}}
            <div class="form-body">

                <div class="form-heading">
                    <h3>Informasi Pendonor</h3>
                    <span>ID #{{ $pendonor->id_pendonor }}</span>
                </div>

                <div class="form-grid">

                    {{-- Nama --}}
                    <div class="form-group">

                        <label>Nama Lengkap</label>

                        <input
                            type="text"
                            value="{{ $pendonor->user->nama ?? '' }}"
                            class="readonly"
                            disabled
                        >

                        <span class="readonly-info">
                            Nama akun tidak diubah di sini.
                        </span>

                    </div>

                    {{-- Email --}}
                    <div class="form-group">

                        <label>Email</label>

                        <input
                            type="email"
                            value="{{ $pendonor->user->email ?? '' }}"
                            class="readonly"
                            disabled
                        >

                        <span class="readonly-info">
                            Email akun tidak diubah di sini.
                        </span>

                    </div>

                    {{-- Status --}}
                    <div class="form-group">

                        <label for="status">Status</label>

                        <select name="status" id="status">

                            <option value="">
                                Pilih Status
                            </option>

                            <option
                                value="Siswa"
                                {{ old('status', $pendonor->status) == 'Siswa' ? 'selected' : '' }}
                            >
                                Siswa
                            </option>

                            <option
                                value="Mahasiswa"
                                {{ old('status', $pendonor->status) == 'Mahasiswa' ? 'selected' : '' }}
                            >
                                Mahasiswa
                            </option>

                            <option
                                value="Umum"
                                {{ old('status', $pendonor->status) == 'Umum' ? 'selected' : '' }}
                            >
                                Umum
                            </option>

                        </select>

                        @error('status')
                            <span class="error">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>

                    {{-- Kelas --}}
                    <div class="form-group">

                        <label for="kelas_jabatan">
                            Kelas / Jabatan
                        </label>

                        <input
                            type="text"
                            name="kelas_jabatan"
                            id="kelas_jabatan"
                            value="{{ old('kelas_jabatan', $pendonor->kelas_jabatan) }}"
                            placeholder="Contoh: XII PPLG 2"
                        >

                        @error('kelas_jabatan')
                            <span class="error">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>

                    {{-- Tanggal Lahir --}}
                    <div class="form-group">

                        <label for="tanggal_lahir">
                            Tanggal Lahir
                        </label>

                        <input
                            type="date"
                            name="tanggal_lahir"
                            id="tanggal_lahir"
                            value="{{ old(
                                'tanggal_lahir',
                                $pendonor->tanggal_lahir
                                    ? $pendonor->tanggal_lahir->format('Y-m-d')
                                    : ''
                            ) }}"
                        >

                        @error('tanggal_lahir')
                            <span class="error">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>

                    {{-- Golongan Darah --}}
                    <div class="form-group">

                        <label for="golongan_darah">
                            Golongan Darah
                        </label>

                        <select
                            name="golongan_darah"
                            id="golongan_darah"
                        >

                            <option value="">
                                Pilih Golongan
                            </option>

                            @foreach(['A', 'B', 'AB', 'O'] as $golongan)

                                <option
                                    value="{{ $golongan }}"
                                    {{ old(
                                        'golongan_darah',
                                        $pendonor->golongan_darah
                                    ) == $golongan ? 'selected' : '' }}
                                >
                                    {{ $golongan }}
                                </option>

                            @endforeach

                        </select>

                        @error('golongan_darah')
                            <span class="error">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>

                    {{-- Telepon --}}
                    <div class="form-group">

                        <label for="nomor_telepon">
                            No. Telepon
                        </label>

                        <input
                            type="text"
                            name="nomor_telepon"
                            id="nomor_telepon"
                            value="{{ old(
                                'nomor_telepon',
                                $pendonor->nomor_telepon
                            ) }}"
                            placeholder="Contoh: 081234567890"
                        >

                        @error('nomor_telepon')
                            <span class="error">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>

                    {{-- Kesehatan --}}
                    <div class="form-group full">

                        <label for="informasi_kesehatan">
                            Informasi Kesehatan
                        </label>

                        <textarea
                            name="informasi_kesehatan"
                            id="informasi_kesehatan"
                            placeholder="Contoh: Sehat"
                        >{{ old(
                            'informasi_kesehatan',
                            $pendonor->informasi_kesehatan
                        ) }}</textarea>

                        @error('informasi_kesehatan')
                            <span class="error">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>

                </div>

            </div>

            {{-- Tombol --}}
            <div class="form-footer">

                <a
                    href="{{ route('pendonor.show', $pendonor->id_pendonor) }}"
                    class="btn btn-back"
                >
                    <i class="fas fa-arrow-left"></i>
                    Batal
                </a>

                <button
                    type="submit"
                    class="btn btn-save"
                >
                    <i class="fas fa-check"></i>
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection