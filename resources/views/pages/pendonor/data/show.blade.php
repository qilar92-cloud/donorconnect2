@extends('layouts.app')

@section('title', 'Detail Pendonor')

@section('content')

<style>
    .pendonor-page {
        min-height: 100vh;
        padding: 25px 30px 35px;
        background: #fff9f6;
    }

    /* Header */
    .page-header {
        max-width: 1150px;
        margin: 0 auto 20px;
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

    /* Main */
    .detail-card {
        max-width: 1150px;
        margin: 0 auto;
        overflow: hidden;
        background: #fff;
        border: 1px solid #f0e2e7;
        border-radius: 20px;
        box-shadow: 0 8px 28px rgba(120, 45, 70, .06);
    }

    /* Profile */
    .profile-section {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        padding: 24px 27px;
        background: linear-gradient(
            135deg,
            #fff5f7 0%,
            #fff 75%
        );
        border-bottom: 1px solid #f2e6e9;
    }

    .profile-main {
        display: flex;
        align-items: center;
        gap: 15px;
        min-width: 0;
    }

    .avatar {
        width: 65px;
        height: 65px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 18px;
        background: linear-gradient(135deg, #ed5573, #d93659);
        color: #fff;
        font-size: 25px;
        font-weight: 800;
        box-shadow: 0 7px 17px rgba(217, 54, 89, .17);
    }

    .profile-info {
        min-width: 0;
    }

    .profile-label {
        display: block;
        margin-bottom: 4px;
        color: #c9365c;
        font-size: 9px;
        font-weight: 800;
        letter-spacing: 1.4px;
        text-transform: uppercase;
    }

    .profile-info h2 {
        overflow: hidden;
        margin: 0 0 4px;
        color: #30313f;
        font-size: 20px;
        font-weight: 800;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .profile-email {
        overflow: hidden;
        color: #99959d;
        font-size: 11px;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .profile-badges {
        display: flex;
        align-items: center;
        gap: 7px;
        flex-shrink: 0;
    }

    .badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 7px 10px;
        border-radius: 20px;
        font-size: 10px;
        font-weight: 700;
    }

    .badge-status {
        background: #eef8f5;
        color: #51947e;
    }

    .badge-blood {
        background: #fde9ef;
        color: #c9365c;
    }

    /* Information */
    .information {
        padding: 22px 27px 20px;
    }

    .section-title {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 13px;
    }

    .section-title h3 {
        margin: 0;
        color: #393744;
        font-size: 14px;
        font-weight: 800;
    }

    .section-title span {
        color: #aaa5ab;
        font-size: 9px;
    }

    .data-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 9px;
    }

    .data-item {
        min-width: 0;
        min-height: 57px;
        padding: 10px 12px;
        display: flex;
        align-items: center;
        gap: 10px;
        background: #fffafa;
        border: 1px solid #f2e7ea;
        border-radius: 12px;
    }

    .data-icon {
        width: 32px;
        height: 32px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 9px;
        background: #fdeaf0;
        color: #c9365c;
        font-size: 10px;
    }

    .data-content {
        min-width: 0;
    }

    .data-content label {
        display: block;
        margin-bottom: 3px;
        color: #aaa4aa;
        font-size: 8px;
        font-weight: 700;
        letter-spacing: .5px;
        text-transform: uppercase;
    }

    .data-content p {
        overflow: hidden;
        margin: 0;
        color: #3d3b46;
        font-size: 11px;
        font-weight: 700;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .health-item {
        grid-column: 1 / -1;
    }

    .health-item .data-content p {
        white-space: normal;
        word-break: break-word;
    }

    .empty {
        color: #aaa !important;
        font-weight: 500 !important;
    }

    /* Bottom */
    .card-footer {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 9px;
        padding: 14px 27px;
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

    .btn-edit {
        background: linear-gradient(135deg, #ed5573, #d93659);
        color: #fff !important;
        box-shadow: 0 5px 13px rgba(217, 54, 89, .15);
    }

    .btn-edit:hover {
        transform: translateY(-1px);
        color: #fff !important;
    }

    /* Tablet */
    @media (max-width: 850px) {
        .pendonor-page {
            padding: 20px;
        }

        .profile-section {
            padding: 20px;
        }

        .information {
            padding: 19px 20px;
        }

        .card-footer {
            padding: 13px 20px;
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

        .detail-card {
            border-radius: 16px;
        }

        .profile-section {
            padding: 16px;
            gap: 10px;
        }

        .profile-main {
            gap: 11px;
        }

        .avatar {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            font-size: 20px;
        }

        .profile-label {
            font-size: 7px;
            letter-spacing: 1px;
        }

        .profile-info h2 {
            max-width: 190px;
            font-size: 15px;
        }

        .profile-email {
            max-width: 190px;
            font-size: 9px;
        }

        .profile-badges {
            display: none;
        }

        .information {
            padding: 16px;
        }

        .section-title {
            margin-bottom: 9px;
        }

        .section-title h3 {
            font-size: 12px;
        }

        .section-title span {
            font-size: 8px;
        }

        .data-grid {
            gap: 7px;
        }

        .data-item {
            min-height: 53px;
            padding: 8px;
            gap: 8px;
            border-radius: 10px;
        }

        .data-icon {
            width: 28px;
            height: 28px;
            border-radius: 8px;
            font-size: 9px;
        }

        .data-content label {
            font-size: 6.5px;
        }

        .data-content p {
            font-size: 9px;
        }

        .card-footer {
            padding: 11px 16px;
        }

        .btn {
            height: 35px;
            padding: 0 12px;
            font-size: 9px;
        }
    }

    /* HP kecil */
    @media (max-width: 380px) {
        .pendonor-page {
            padding: 12px 10px 20px;
        }

        .profile-section {
            padding: 14px;
        }

        .avatar {
            width: 48px;
            height: 48px;
            font-size: 18px;
        }

        .profile-info h2 {
            max-width: 160px;
            font-size: 14px;
        }

        .profile-email {
            max-width: 160px;
        }

        .information {
            padding: 14px;
        }

        .data-item {
            min-height: 50px;
        }

        .data-icon {
            width: 26px;
            height: 26px;
        }

        .data-content p {
            font-size: 8.5px;
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

        <h1>Detail Pendonor</h1>

        <p>Informasi pendonor yang tersimpan dalam sistem.</p>
    </div>

    <div class="detail-card">

        {{-- Profil --}}
        <div class="profile-section">

            <div class="profile-main">

                <div class="avatar">
                    {{ strtoupper(substr($pendonor->user->nama ?? 'P', 0, 1)) }}
                </div>

                <div class="profile-info">

                    <span class="profile-label">
                        Pendonor
                    </span>

                    <h2>
                        {{ $pendonor->user->nama ?? '-' }}
                    </h2>

                    <div class="profile-email">
                        {{ $pendonor->user->email ?? '-' }}
                    </div>

                </div>

            </div>

            <div class="profile-badges">

                @if($pendonor->status)
                    <span class="badge badge-status">
                        <i class="fas fa-user"></i>
                        {{ $pendonor->status }}
                    </span>
                @endif

                @if($pendonor->golongan_darah)
                    <span class="badge badge-blood">
                        <i class="fas fa-tint"></i>
                        Gol. {{ $pendonor->golongan_darah }}
                    </span>
                @endif

            </div>

        </div>

        {{-- Informasi --}}
        <div class="information">

            <div class="section-title">
                <h3>Informasi Pendonor</h3>
                <span>ID #{{ $pendonor->id_pendonor }}</span>
            </div>

            <div class="data-grid">

                {{-- Nama --}}
                <div class="data-item">
                    <div class="data-icon">
                        <i class="fas fa-user"></i>
                    </div>

                    <div class="data-content">
                        <label>Nama Lengkap</label>
                        <p>
                            {{ $pendonor->user->nama ?? '-' }}
                        </p>
                    </div>
                </div>

                {{-- Username --}}
                <div class="data-item">
                    <div class="data-icon">
                        <i class="fas fa-at"></i>
                    </div>

                    <div class="data-content">
                        <label>Username</label>
                        <p>
                            {{ $pendonor->user->username ?? '-' }}
                        </p>
                    </div>
                </div>

                {{-- Email --}}
                <div class="data-item">
                    <div class="data-icon">
                        <i class="fas fa-envelope"></i>
                    </div>

                    <div class="data-content">
                        <label>Email</label>
                        <p>
                            {{ $pendonor->user->email ?? '-' }}
                        </p>
                    </div>
                </div>

                {{-- Status --}}
                <div class="data-item">
                    <div class="data-icon">
                        <i class="fas fa-user-check"></i>
                    </div>

                    <div class="data-content">
                        <label>Status</label>

                        <p class="{{ !$pendonor->status ? 'empty' : '' }}">
                            {{ $pendonor->status ?? '-' }}
                        </p>
                    </div>
                </div>

                {{-- Kelas --}}
                <div class="data-item">
                    <div class="data-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>

                    <div class="data-content">
                        <label>Kelas / Jabatan</label>

                        <p class="{{ !$pendonor->kelas_jabatan ? 'empty' : '' }}">
                            {{ $pendonor->kelas_jabatan ?? '-' }}
                        </p>
                    </div>
                </div>

                {{-- Tanggal --}}
                <div class="data-item">
                    <div class="data-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>

                    <div class="data-content">
                        <label>Tanggal Lahir</label>

                        <p class="{{ !$pendonor->tanggal_lahir ? 'empty' : '' }}">
                            {{ $pendonor->tanggal_lahir
                                ? $pendonor->tanggal_lahir->format('d M Y')
                                : '-'
                            }}
                        </p>
                    </div>
                </div>

                {{-- Golongan --}}
                <div class="data-item">
                    <div class="data-icon">
                        <i class="fas fa-tint"></i>
                    </div>

                    <div class="data-content">
                        <label>Golongan Darah</label>

                        <p class="{{ !$pendonor->golongan_darah ? 'empty' : '' }}">
                            {{ $pendonor->golongan_darah ?? '-' }}
                        </p>
                    </div>
                </div>

                {{-- Telepon --}}
                <div class="data-item">
                    <div class="data-icon">
                        <i class="fas fa-phone"></i>
                    </div>

                    <div class="data-content">
                        <label>No. Telepon</label>

                        <p class="{{ !$pendonor->nomor_telepon ? 'empty' : '' }}">
                            {{ $pendonor->nomor_telepon ?? '-' }}
                        </p>
                    </div>
                </div>

                {{-- Kesehatan --}}
                <div class="data-item health-item">
                    <div class="data-icon">
                        <i class="fas fa-heartbeat"></i>
                    </div>

                    <div class="data-content">
                        <label>Informasi Kesehatan</label>

                        <p class="{{ !$pendonor->informasi_kesehatan ? 'empty' : '' }}">
                            {{ $pendonor->informasi_kesehatan ?? '-' }}
                        </p>
                    </div>
                </div>

            </div>
        </div>

        {{-- Tombol --}}
        <div class="card-footer">

            <a
                href="{{ route('pendonor.index') }}"
                class="btn btn-back"
            >
                <i class="fas fa-arrow-left"></i>
                Kembali
            </a>

            <a
                href="{{ route('pendonor.edit', $pendonor->id_pendonor) }}"
                class="btn btn-edit"
            >
                <i class="fas fa-pen"></i>
                Edit Data
            </a>

        </div>

    </div>

</div>

@endsection