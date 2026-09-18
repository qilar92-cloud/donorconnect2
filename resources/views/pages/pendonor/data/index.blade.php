@extends('layouts.app')

@section('title', 'Data Pendonor')

@push('styles')
    @vite('resources/css/pendonor/data-index.css')
@endpush

@section('content')

    <div class="pendonor-page">

        {{-- Banner --}}

        <div class="page-banner">

            <div class="banner-content">

                <div class="banner-icon">

                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M16 11a4 4 0 1 0-3.9-5h-.2A4 4 0 0 0 16 11Z"/>
                        <path d="M8 11a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Z"/>
                        <path d="M2.5 20a5.5 5.5 0 0 1 11 0"/>
                        <path d="M13 15.5a5.5 5.5 0 0 1 8.5 4.5"/>
                    </svg>

                </div>

                <div class="banner-text">

                    <span class="banner-label">
                        DATA PENDONOR
                    </span>

                    <h1>
                        Data Pendonor
                    </h1>

                    <p>
                        Kelola data pendonor DonorConnect dengan mudah.
                    </p>

                </div>

            </div>


            {{-- Hati --}}

            <div class="banner-heart">

                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M20.8 8.6c0 5.5-8.8 10.2-8.8 10.2S3.2 14.1 3.2 8.6A4.6 4.6 0 0 1 12 6.3a4.6 4.6 0 0 1 8.8 2.3Z"/>
                </svg>

            </div>


            {{-- Total --}}

            <div class="total-box">

                <div class="total-box-icon">

                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M16 11a4 4 0 1 0-3.9-5h-.2A4 4 0 0 0 16 11Z"/>
                        <path d="M8 11a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Z"/>
                        <path d="M2.5 20a5.5 5.5 0 0 1 11 0"/>
                        <path d="M13 15.5a5.5 5.5 0 0 1 8.5 4.5"/>
                    </svg>

                </div>

                <div class="total-info">

                    <strong>
                        {{ $pendonor->count() }}
                    </strong>

                    <span>
                        Total Pendonor
                    </span>

                </div>

            </div>

        </div>


        {{-- Data --}}

        <div class="data-card">

            {{-- Search --}}

            <div class="table-top">

                <div class="search-box">

                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <circle
                            cx="11"
                            cy="11"
                            r="6.5"
                        ></circle>

                        <path d="m16 16 5 5"></path>
                    </svg>

                    <input
                        type="text"
                        id="searchPendonor"
                        placeholder="Cari nama, status, golongan darah..."
                        autocomplete="off"
                    >

                </div>

            </div>


            {{-- Tabel --}}

            <div class="table-scroll">

                <table id="pendonorTable">

                    <thead>

                        <tr>
                            <th class="col-no">NO</th>
                            <th class="col-name">NAMA</th>
                            <th>STATUS</th>
                            <th>KELAS / JABATAN</th>
                            <th>TANGGAL LAHIR</th>
                            <th>GOL. DARAH</th>
                            <th>NO. TELEPON</th>
                            <th>INFORMASI KESEHATAN</th>
                            <th class="col-action">AKSI</th>
                        </tr>

                    </thead>


                    <tbody>

                        @forelse ($pendonor as $item)

                            <tr>

                                <td class="number">
                                    {{ $loop->iteration }}
                                </td>


                                <td>

                                    <div class="donor-name">

                                        <div class="name-icon">

                                            <svg
                                                viewBox="0 0 24 24"
                                                aria-hidden="true"
                                            >
                                                <circle
                                                    cx="12"
                                                    cy="8"
                                                    r="3.5"
                                                />

                                                <path d="M5 20a7 7 0 0 1 14 0"/>
                                            </svg>

                                        </div>

                                        <span>
                                            {{ $item->user->nama ?? '-' }}
                                        </span>

                                    </div>

                                </td>


                                <td>

                                    @if ($item->status)

                                        <span class="status-badge">
                                            {{ $item->status }}
                                        </span>

                                    @else

                                        <span class="empty-text">
                                            -
                                        </span>

                                    @endif

                                </td>


                                <td>
                                    {{ $item->kelas_jabatan ?? '-' }}
                                </td>


                                <td>

                                    @if ($item->tanggal_lahir)

                                        {{ $item->tanggal_lahir->format('d M Y') }}

                                    @else

                                        -

                                    @endif

                                </td>


                                <td>

                                    @if ($item->golongan_darah)

                                        <span class="blood-badge">
                                            {{ $item->golongan_darah }}
                                        </span>

                                    @else

                                        <span class="empty-text">
                                            -
                                        </span>

                                    @endif

                                </td>


                                <td>
                                    {{ $item->nomor_telepon ?? '-' }}
                                </td>


                                <td>
                                    {{ $item->informasi_kesehatan ?? '-' }}
                                </td>


                                <td class="action-column">

                                    <div class="action-buttons">

                                        {{-- Detail --}}

                                        <a
                                            href="{{ route('pendonor.show', $item->id_pendonor) }}"
                                            class="action-btn detail-btn"
                                            title="Detail"
                                        >

                                            <svg
                                                viewBox="0 0 24 24"
                                                aria-hidden="true"
                                            >
                                                <path d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6Z"/>

                                                <circle
                                                    cx="12"
                                                    cy="12"
                                                    r="2.5"
                                                />
                                            </svg>

                                        </a>


                                        {{-- Edit --}}

                                        <a
                                            href="{{ route('pendonor.edit', $item->id_pendonor) }}"
                                            class="action-btn edit-btn"
                                            title="Edit"
                                        >

                                            <svg
                                                viewBox="0 0 24 24"
                                                aria-hidden="true"
                                            >
                                                <path d="M4 20h4L19 9a2.1 2.1 0 0 0-3-3L5 18l-1 2Z"/>

                                                <path d="m14.5 7.5 2 2"/>
                                            </svg>

                                        </a>


                                        {{-- Hapus --}}

                                        <form
                                            action="{{ route('pendonor.destroy', $item->id_pendonor) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus data pendonor ini?')"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="action-btn delete-btn"
                                                title="Hapus"
                                            >

                                                <svg
                                                    viewBox="0 0 24 24"
                                                    aria-hidden="true"
                                                >
                                                    <path d="M5 7h14"/>
                                                    <path d="M9 7V4h6v3"/>
                                                    <path d="m7 7 1 14h8l1-14"/>
                                                    <path d="M10 11v6M14 11v6"/>
                                                </svg>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="9"
                                    class="empty-row"
                                >

                                    <svg
                                        viewBox="0 0 24 24"
                                        aria-hidden="true"
                                    >
                                        <circle
                                            cx="9"
                                            cy="8"
                                            r="3"
                                        />

                                        <circle
                                            cx="16"
                                            cy="9"
                                            r="2.5"
                                        />

                                        <path d="M3 20a6 6 0 0 1 12 0"/>
                                        <path d="M14 20a5 5 0 0 1 7 0"/>
                                    </svg>

                                    <span>
                                        Belum ada data pendonor.
                                    </span>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- Petunjuk --}}

            @if ($pendonor->count() > 0)

                <div class="table-hint">

                    <span class="hint-icon">
                        →
                    </span>

                    <span>
                        Geser tabel ke kiri dan kanan untuk melihat data lainnya.
                    </span>

                </div>

            @endif


            {{-- Footer --}}

            @if ($pendonor->count() > 0)

                <div class="table-footer">

                    <span>
                        Menampilkan 1 - {{ $pendonor->count() }}
                        dari {{ $pendonor->count() }} data
                    </span>

                    <div class="pagination">

                        <button
                            type="button"
                            disabled
                        >
                            ‹
                        </button>

                        <button
                            type="button"
                            class="active"
                        >
                            1
                        </button>

                        <button
                            type="button"
                            disabled
                        >
                            ›
                        </button>

                    </div>

                </div>

            @endif

        </div>

    </div>


    @push('scripts')

        <script>
            document.addEventListener('DOMContentLoaded', function () {

                const searchInput =
                    document.getElementById('searchPendonor');

                const rows =
                    document.querySelectorAll(
                        '#pendonorTable tbody tr'
                    );

                if (!searchInput) {
                    return;
                }

                searchInput.addEventListener('input', function () {

                    const keyword =
                        this.value.toLowerCase().trim();

                    rows.forEach(function (row) {

                        const text =
                            row.textContent.toLowerCase();

                        row.style.display =
                            text.includes(keyword) ? '' : 'none';

                    });

                });

            });
        </script>

    @endpush

@endsection