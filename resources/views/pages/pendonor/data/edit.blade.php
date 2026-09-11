@extends('layouts.app')

@section('title', 'Edit Pendonor')

@section('content')

<style>
    .pendonor-page {
        padding: 30px;
        background: #fff9f6;
        min-height: 100vh;
    }

    .page-header {
        margin-bottom: 25px;
    }

    .page-header small {
        display: block;
        color: #c9365c;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: .8px;
        text-transform: uppercase;
        margin-bottom: 6px;
    }

    .page-header h1 {
        margin: 0;
        color: #2f3040;
        font-size: 30px;
        font-weight: 800;
    }

    .page-header p {
        margin: 7px 0 0;
        color: #888894;
        font-size: 14px;
    }

    .form-card {
        background: #fff;
        border: 1px solid #f0e5e9;
        border-radius: 22px;
        padding: 30px;
        box-shadow: 0 8px 25px rgba(120, 45, 70, .07);
        max-width: 1000px;
    }

    .form-title {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 25px;
        padding-bottom: 22px;
        border-bottom: 1px solid #f1e8eb;
    }

    .form-icon {
        width: 50px;
        height: 50px;
        border-radius: 14px;
        background: #fde9ef;
        color: #c9365c;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
    }

    .form-title h2 {
        margin: 0 0 4px;
        color: #30313f;
        font-size: 19px;
        font-weight: 800;
    }

    .form-title p {
        margin: 0;
        color: #9999a3;
        font-size: 12px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }

    .form-group label {
        margin-bottom: 8px;
        color: #454653;
        font-size: 13px;
        font-weight: 700;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        box-sizing: border-box;
        border: 1px solid #e8dfe3;
        border-radius: 12px;
        background: #fff;
        color: #383946;
        padding: 12px 14px;
        font-family: inherit;
        font-size: 13px;
        outline: none;
        transition: .2s;
    }

    .form-group input,
    .form-group select {
        height: 45px;
    }

    .form-group textarea {
        min-height: 105px;
        resize: vertical;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        border-color: #ed5573;
        box-shadow: 0 0 0 3px rgba(237, 85, 115, .1);
    }

    .readonly {
        background: #f8f5f6 !important;
        color: #888894 !important;
        cursor: not-allowed;
    }

    .readonly-info {
        margin-top: 6px;
        color: #aaa;
        font-size: 11px;
    }

    .error {
        margin-top: 6px;
        color: #d93659;
        font-size: 12px;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 28px;
        padding-top: 22px;
        border-top: 1px solid #f1e8eb;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 43px;
        padding: 0 19px;
        border-radius: 11px;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
        border: none;
        cursor: pointer;
        transition: .2s;
    }

    .btn-back {
        background: #f5f1f2;
        color: #666673;
    }

    .btn-back:hover {
        background: #ebe5e7;
    }

    .btn-save {
        background: linear-gradient(135deg, #ed5573, #d93659);
        color: #fff;
        box-shadow: 0 5px 14px rgba(217, 54, 89, .2);
    }

    .btn-save:hover {
        transform: translateY(-1px);
    }

    @media (max-width: 700px) {
        .pendonor-page {
            padding: 20px 15px;
        }

        .page-header h1 {
            font-size: 25px;
        }

        .form-card {
            padding: 20px;
            border-radius: 18px;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full {
            grid-column: auto;
        }

        .form-actions {
            flex-direction: column;
        }

        .btn {
            width: 100%;
        }
    }
</style>

<div class="pendonor-page">

    {{-- Header --}}
    <div class="page-header">
        <small>Data Pendonor</small>
        <h1>Edit Pendonor</h1>
        <p>Perbarui informasi data pendonor dengan benar.</p>
    </div>

    <div class="form-card">

        {{-- Judul Form --}}
        <div class="form-title">
            <div class="form-icon">
                ✎
            </div>

            <div>
                <h2>Edit Data Pendonor</h2>
                <p>Ubah informasi pendonor yang diperlukan.</p>
            </div>
        </div>

        <form
            action="{{ route('pendonor.update', $pendonor->id_pendonor) }}"
            method="POST"
        >

            @csrf
            @method('PUT')

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
                        Nama akun tidak diubah dari halaman ini.
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
                        Email akun tidak diubah dari halaman ini.
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
                        placeholder="Contoh: XII IPA 1"
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
                            Pilih Golongan Darah
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


                {{-- Informasi Kesehatan --}}
                <div class="form-group full">

                    <label for="informasi_kesehatan">
                        Informasi Kesehatan
                    </label>

                    <textarea
                        name="informasi_kesehatan"
                        id="informasi_kesehatan"
                        placeholder="Masukkan informasi kesehatan pendonor"
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


            {{-- Tombol --}}
            <div class="form-actions">

                <a
                    href="{{ route('pendonor.show', $pendonor->id_pendonor) }}"
                    class="btn btn-back"
                >
                    ← Batal
                </a>

                <button
                    type="submit"
                    class="btn btn-save"
                >
                    ✓ Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection