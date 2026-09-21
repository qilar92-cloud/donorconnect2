@extends('layouts.app')

@section('title', 'Status Pendaftaran - DonorConnect')

@push('styles')
    @vite('resources/css/pendonor/status.css')
@endpush

@section('content')

<div class="status-page">

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="status-toast success-toast" id="statusToast">

            <div class="toast-icon">
                <i class="fas fa-check"></i>
            </div>

            <div class="toast-content">
                <strong>Berhasil!</strong>
                <span>{{ session('success') }}</span>
            </div>

            <button type="button" class="toast-close" onclick="closeToast()">
                <i class="fas fa-times"></i>
            </button>

        </div>
    @endif

    @if(session('error'))
        <div class="status-toast error-toast" id="statusToast">

            <div class="toast-icon">
                <i class="fas fa-exclamation"></i>
            </div>

            <div class="toast-content">
                <strong>Perhatian</strong>
                <span>{{ session('error') }}</span>
            </div>

            <button type="button" class="toast-close" onclick="closeToast()">
                <i class="fas fa-times"></i>
            </button>

        </div>
    @endif


    {{-- Header --}}
    <div class="status-hero">

        <div class="hero-content">

            <div class="hero-label">
                <span></span>
                PENDAFTARAN DONOR
            </div>

            <h1>Status Pendaftaran</h1>

            <p>
                Pantau kegiatan donor yang sudah kamu daftarkan.
            </p>

        </div>


        <div class="hero-decoration">

            <div class="hero-circle circle-one"></div>

            <div class="hero-circle circle-two"></div>

            <div class="hero-heart">
                <i class="fas fa-heart"></i>
            </div>

        </div>


        <div class="hero-total">

            <div class="total-icon">
                <i class="fas fa-clipboard-check"></i>
            </div>

            <div>
                <span>TOTAL</span>

                <strong>{{ $pendaftaran->count() }}</strong>

                <small>Pendaftaran</small>
            </div>

        </div>

    </div>


    {{-- Jika belum ada pendaftaran --}}
    @if($pendaftaran->isEmpty())

        <div class="empty-card">

            <div class="empty-icon">
                <i class="fas fa-clipboard-list"></i>
            </div>

            <div class="empty-content">

                <span>BELUM ADA DATA</span>

                <h2>Belum Ada Pendaftaran</h2>

                <p>
                    Kamu belum mendaftar pada kegiatan donor mana pun.
                    Yuk, lihat kegiatan donor yang tersedia.
                </p>

                <a
                    href="{{ route('pendonor.kegiatan') }}"
                    class="btn-kegiatan"
                >
                    <i class="fas fa-calendar-alt"></i>

                    Lihat Kegiatan Donor

                    <i class="fas fa-arrow-right"></i>
                </a>

            </div>

        </div>

    @else

        {{-- Tabel --}}
        <div class="registration-box">

            {{-- Judul tabel --}}
            <div class="table-heading">

                <div>

                    <span class="heading-label">
                        AKTIVITAS DONOR
                    </span>

                    <h2>
                        Daftar Pendaftaran
                    </h2>

                    <p>
                        Kegiatan donor yang sudah kamu daftarkan.
                    </p>

                </div>


                <div class="heading-decoration">

                    <span></span>

                    <i class="fas fa-tint"></i>

                    <span></span>

                </div>

            </div>


            {{-- Tabel --}}
            <div class="table-wrap">

                <table class="registration-table">

                    <thead>

                        <tr>

                            <th>No</th>

                            <th>
                                Kegiatan Donor
                            </th>

                            <th>
                                Tanggal
                            </th>

                            <th>
                                Waktu
                            </th>

                            <th>
                                Lokasi
                            </th>

                            <th>
                                Status
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach($pendaftaran as $index => $item)

                            @php

                                $status = strtolower(
                                    $item->status_pendaftaran ?? 'terdaftar'
                                );

                            @endphp


                            <tr>

                                {{-- Nomor --}}
                                <td
                                    class="number-cell"
                                    data-label="No"
                                >

                                    <span>
                                        {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                    </span>

                                </td>


                                {{-- Kegiatan --}}
                                <td
                                    class="activity-cell"
                                    data-label="Kegiatan"
                                >

                                    <div class="activity-icon">
                                        <i class="fas fa-tint"></i>
                                    </div>

                                    <div class="activity-name">

                                        <strong>
                                            {{ $item->kegiatanDonor->nama_kegiatan ?? 'Kegiatan Donor' }}
                                        </strong>

                                        <small>
                                            Pendaftaran donor
                                        </small>

                                    </div>

                                </td>


                                {{-- Tanggal --}}
                                <td data-label="Tanggal">

                                    @if($item->kegiatanDonor)

                                        <span class="table-info">

                                            <i class="far fa-calendar-alt"></i>

                                            {{ \Carbon\Carbon::parse($item->kegiatanDonor->tanggal)->format('d M Y') }}

                                        </span>

                                    @else

                                        -

                                    @endif

                                </td>


                                {{-- Waktu --}}
                                <td data-label="Waktu">

                                    @if($item->kegiatanDonor)

                                        <span class="table-info">

                                            <i class="far fa-clock"></i>

                                            {{ $item->kegiatanDonor->waktu ?? '-' }}

                                        </span>

                                    @else

                                        -

                                    @endif

                                </td>


                                {{-- Lokasi --}}
                                <td data-label="Lokasi">

                                    @if($item->kegiatanDonor)

                                        <span class="table-info location-info">

                                            <i class="fas fa-map-marker-alt"></i>

                                            {{ $item->kegiatanDonor->lokasi ?? '-' }}

                                        </span>

                                    @else

                                        -

                                    @endif

                                </td>


                                {{-- Status --}}
                                <td data-label="Status">

                                    @if($status === 'terdaftar')

                                        <span class="status-badge registered">

                                            <i class="fas fa-check"></i>

                                            Terdaftar

                                        </span>


                                    @elseif($status === 'diterima')

                                        <span class="status-badge accepted">

                                            <i class="fas fa-check-double"></i>

                                            Diterima

                                        </span>


                                    @elseif($status === 'ditolak')

                                        <span class="status-badge rejected">

                                            <i class="fas fa-times"></i>

                                            Ditolak

                                        </span>


                                    @elseif($status === 'selesai')

                                        <span class="status-badge completed">

                                            <i class="fas fa-heart"></i>

                                            Selesai

                                        </span>


                                    @else

                                        <span class="status-badge pending">

                                            <i class="fas fa-clock"></i>

                                            {{ ucfirst($item->status_pendaftaran ?? 'Terdaftar') }}

                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


            {{-- Footer --}}
            <div class="table-footer">

                

                <span>
                    {{ $pendaftaran->count() }} kegiatan terdaftar
                </span>

            </div>

        </div>

    @endif

</div>


<script>

    function closeToast() {

        const toast = document.getElementById('statusToast');

        if (!toast) return;

        toast.classList.add('hide');

        setTimeout(function () {

            toast.remove();

        }, 300);

    }


    document.addEventListener('DOMContentLoaded', function () {

        const toast =
            document.getElementById('statusToast');

        if (toast) {

            setTimeout(function () {

                closeToast();

            }, 4000);

        }

    });

</script>

@endsection