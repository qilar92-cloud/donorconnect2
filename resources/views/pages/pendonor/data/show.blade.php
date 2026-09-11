@extends('layouts.app')

@section('title', 'Detail Pendonor')

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

    .detail-card {
        background: #fff;
        border: 1px solid #f0e5e9;
        border-radius: 22px;
        padding: 30px;
        box-shadow: 0 8px 25px rgba(120, 45, 70, .07);
        max-width: 1000px;
    }

    .profile-top {
        display: flex;
        align-items: center;
        gap: 18px;
        padding-bottom: 25px;
        margin-bottom: 25px;
        border-bottom: 1px solid #f1e8eb;
    }

    .profile-icon {
        width: 68px;
        height: 68px;
        border-radius: 18px;
        background: linear-gradient(135deg, #ed5573, #d93659);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 27px;
        font-weight: 800;
        flex-shrink: 0;
    }

    .profile-top h2 {
        margin: 0 0 5px;
        color: #30313f;
        font-size: 21px;
        font-weight: 800;
    }

    .profile-top span {
        color: #9a9aa4;
        font-size: 13px;
    }

    .detail-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 16px;
    }

    .detail-item {
        background: #fff9fb;
        border: 1px solid #f4e7eb;
        border-radius: 15px;
        padding: 17px 18px;
    }

    .detail-item label {
        display: block;
        color: #a0a0aa;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 7px;
    }

    .detail-item p {
        margin: 0;
        color: #383946;
        font-size: 14px;
        font-weight: 600;
        word-break: break-word;
    }

    .blood {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 42px;
        padding: 7px 12px;
        border-radius: 10px;
        background: #fde9ef;
        color: #c9365c;
        font-weight: 800;
    }

    .status {
        display: inline-block;
        padding: 7px 13px;
        border-radius: 20px;
        background: #fde9ef;
        color: #c9365c;
        font-size: 12px;
        font-weight: 700;
    }

    .action-area {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 25px;
        padding-top: 22px;
        border-top: 1px solid #f1e8eb;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        min-height: 42px;
        padding: 0 18px;
        border-radius: 11px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
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

    .btn-edit {
        background: linear-gradient(135deg, #ed5573, #d93659);
        color: #fff;
        box-shadow: 0 5px 14px rgba(217, 54, 89, .2);
    }

    .btn-edit:hover {
        transform: translateY(-1px);
        color: #fff;
    }

    @media (max-width: 700px) {
        .pendonor-page {
            padding: 20px 15px;
        }

        .page-header h1 {
            font-size: 25px;
        }

        .detail-card {
            padding: 20px;
            border-radius: 18px;
        }

        .detail-grid {
            grid-template-columns: 1fr;
        }

        .action-area {
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
        <h1>Detail Pendonor</h1>
        <p>Informasi lengkap mengenai data pendonor.</p>
    </div>

    <div class="detail-card">

        {{-- Profil --}}
        <div class="profile-top">

            <div class="profile-icon">
                {{ strtoupper(substr($pendonor->user->nama ?? 'P', 0, 1)) }}
            </div>

            <div>
                <h2>{{ $pendonor->user->nama ?? '-' }}</h2>
                <span>{{ $pendonor->user->email ?? '-' }}</span>
            </div>

        </div>

        {{-- Data --}}
        <div class="detail-grid">

            <div class="detail-item">
                <label>Nama Lengkap</label>
                <p>{{ $pendonor->user->nama ?? '-' }}</p>
            </div>

            <div class="detail-item">
                <label>Username</label>
                <p>{{ $pendonor->user->username ?? '-' }}</p>
            </div>

            <div class="detail-item">
                <label>Email</label>
                <p>{{ $pendonor->user->email ?? '-' }}</p>
            </div>

            <div class="detail-item">
                <label>Status</label>
                <p>
                    @if($pendonor->status)
                        <span class="status">{{ $pendonor->status }}</span>
                    @else
                        -
                    @endif
                </p>
            </div>

            <div class="detail-item">
                <label>Kelas / Jabatan</label>
                <p>{{ $pendonor->kelas_jabatan ?? '-' }}</p>
            </div>

            <div class="detail-item">
                <label>Tanggal Lahir</label>
                <p>
                    {{ $pendonor->tanggal_lahir ? $pendonor->tanggal_lahir->format('d M Y') : '-' }}
                </p>
            </div>

            <div class="detail-item">
                <label>Golongan Darah</label>
                <p>
                    @if($pendonor->golongan_darah)
                        <span class="blood">{{ $pendonor->golongan_darah }}</span>
                    @else
                        -
                    @endif
                </p>
            </div>

            <div class="detail-item">
                <label>No. Telepon</label>
                <p>{{ $pendonor->nomor_telepon ?? '-' }}</p>
            </div>

            <div class="detail-item" style="grid-column: 1 / -1;">
                <label>Informasi Kesehatan</label>
                <p>{{ $pendonor->informasi_kesehatan ?? '-' }}</p>
            </div>

        </div>

        {{-- Tombol --}}
        <div class="action-area">

            <a href="{{ route('pendonor.index') }}" class="btn btn-back">
                ← Kembali
            </a>

            <a href="{{ route('pendonor.edit', $pendonor->id_pendonor) }}"
               class="btn btn-edit">
                ✎ Edit Data
            </a>

        </div>

    </div>

</div>

@endsection