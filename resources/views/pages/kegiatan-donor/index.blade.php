@extends('layouts.app')

@section('title', 'Kegiatan Donor - DonorConnect')

@push('styles')
    @vite('resources/css/kegiatan-donor/index.css')
@endpush

@section('content')

<div class="kegiatan-page">

    <div class="kegiatan-container">

        {{-- Banner --}}
        <div class="kegiatan-banner">

            <div class="banner-left">

                <div class="banner-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>

                <div class="banner-text">
                    <small>DonorConnect • Petugas PMR</small>

                    <h1>Kegiatan Donor</h1>

                    <p>
                        Kelola jadwal dan informasi kegiatan donor darah.
                    </p>
                </div>

            </div>

            <div class="banner-right">

                <div class="banner-total">
                    <strong>{{ $jumlahTotal }}</strong>
                    <span>Total Kegiatan</span>
                </div>

                <a
                    href="{{ route('kegiatan-donor.create') }}"
                    class="btn-add"
                >
                    <i class="fas fa-plus"></i>
                    <span>Tambah Kegiatan</span>
                </a>

            </div>

        </div>


        {{-- Alert --}}
        @if (session('success'))

            <div class="success-alert">

                <div class="success-icon">
                    <i class="fas fa-check"></i>
                </div>

                <span>{{ session('success') }}</span>

            </div>

        @endif


        {{-- Statistik --}}
        <div class="stats-grid">

            <div class="stat-card">

                <div class="stat-icon pink">
                    <i class="fas fa-calendar-check"></i>
                </div>

                <div class="stat-info">
                    <strong>{{ $jumlahTotal }}</strong>
                    <span>Total Kegiatan</span>
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon yellow">
                    <i class="fas fa-calendar-plus"></i>
                </div>

                <div class="stat-info">
                    <strong>{{ $jumlahMendatang }}</strong>
                    <span>Kegiatan Mendatang</span>
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon blue">
                    <i class="fas fa-calendar-day"></i>
                </div>

                <div class="stat-info">
                    <strong>{{ $jumlahHariIni }}</strong>
                    <span>Kegiatan Hari Ini</span>
                </div>

            </div>

        </div>


        {{-- Judul --}}
        <div class="section-heading">

            <div class="section-title">

                <div class="section-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>

                <div>
                    <h2>Daftar Kegiatan</h2>
                    <p>Informasi kegiatan donor yang tersedia</p>
                </div>

            </div>

            <span class="section-count">
                {{ $jumlahTotal }} kegiatan
            </span>

        </div>


        {{-- Daftar --}}
        @if ($kegiatan->count() > 0)

            <div class="kegiatan-grid">

                @foreach ($kegiatan as $item)

                    <div class="kegiatan-card">

                        <div class="card-top">

                            <div class="event-number">
                                {{ sprintf('%02d', $kegiatan->firstItem() + $loop->index) }}
                            </div>

                            <h3>
                                {{ $item->nama_kegiatan }}
                            </h3>

                        </div>


                        <div class="card-body">

                            <div class="info-item">

                                <div class="info-icon">
                                    <i class="fas fa-calendar-day"></i>
                                </div>

                                <div class="info-text">
                                    <small>Tanggal</small>

                                    <span>
                                        {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                                    </span>
                                </div>

                            </div>


                            <div class="info-item">

                                <div class="info-icon">
                                    <i class="fas fa-clock"></i>
                                </div>

                                <div class="info-text">
                                    <small>Waktu</small>

                                    <span>{{ $item->waktu }}</span>
                                </div>

                            </div>


                            <div class="info-item">

                                <div class="info-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>

                                <div class="info-text">
                                    <small>Lokasi</small>

                                    <span>{{ $item->lokasi }}</span>
                                </div>

                            </div>


                            @if ($item->keterangan)

                                <div class="description">

                                    <strong>Keterangan</strong>

                                    <span>
                                        {{ $item->keterangan }}
                                    </span>

                                </div>

                            @endif

                        </div>


                        <div class="card-actions">

                            <a
                                href="{{ route('kegiatan-donor.show', $item->id_kegiatan) }}"
                                class="action-btn action-detail"
                            >
                                <i class="fas fa-eye"></i>
                                <span>Detail</span>
                            </a>


                            <a
                                href="{{ route('kegiatan-donor.edit', $item->id_kegiatan) }}"
                                class="action-btn action-edit"
                            >
                                <i class="fas fa-pen"></i>
                                <span>Edit</span>
                            </a>


                            <button
                                type="button"
                                class="action-btn action-delete"
                                onclick="actionDestroy('{{ route('kegiatan-donor.destroy', $item->id_kegiatan) }}')"
                            >
                                <i class="fas fa-trash-can"></i>
                                <span>Hapus</span>
                            </button>

                        </div>

                    </div>

                @endforeach

            </div>


            @if ($kegiatan->hasPages())

                <div class="pagination-area">
                    {{ $kegiatan->links() }}
                </div>

            @endif


        @else

            <div class="empty-card">

                <div class="empty-icon">
                    <i class="fas fa-calendar-xmark"></i>
                </div>

                <h3>Belum Ada Kegiatan</h3>

                <p>
                    Belum ada kegiatan donor yang tersedia.
                    Silakan tambahkan kegiatan baru.
                </p>

            </div>

        @endif

    </div>

</div>


{{-- Form hapus --}}
<form
    id="form-destroy"
    class="form-hidden"
    method="POST"
>
    @csrf
    @method('DELETE')
</form>


{{-- Modal hapus --}}
@push('scripts')

<script>

function actionDestroy(url) {

    Swal.fire({

        html: `
            <div class="delete-modal">

                <div class="delete-modal-icon">

                    <svg
                        viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M8 7V5.8C8 4.8 8.8 4 9.8 4h4.4C15.2 4 16 4.8 16 5.8V7"
                            fill="none"
                            stroke="#df315b"
                            stroke-width="1.8"
                            stroke-linecap="round"
                        />

                        <path
                            d="M5 7h14"
                            fill="none"
                            stroke="#df315b"
                            stroke-width="1.8"
                            stroke-linecap="round"
                        />

                        <path
                            d="M7 7.5l.7 12c.05.85.75 1.5 1.6 1.5h5.4c.85 0 1.55-.65 1.6-1.5l.7-12"
                            fill="none"
                            stroke="#df315b"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />

                        <path
                            d="M10 11v6.5M14 11v6.5"
                            fill="none"
                            stroke="#df315b"
                            stroke-width="1.8"
                            stroke-linecap="round"
                        />
                    </svg>

                </div>


                <div class="delete-modal-text">

                    <h3>Hapus kegiatan?</h3>

                    <p>
                        Kegiatan yang dihapus tidak dapat dikembalikan.
                    </p>

                </div>

            </div>
        `,

        showCancelButton: true,

        confirmButtonText: 'Hapus',

        cancelButtonText: 'Batal',

        reverseButtons: true,

        focusCancel: true,

        buttonsStyling: false,

        customClass: {
            popup: 'delete-swal-popup',
            confirmButton: 'delete-confirm-btn',
            cancelButton: 'delete-cancel-btn'
        }

    }).then((result) => {

        if (result.isConfirmed) {

            const form = document.getElementById('form-destroy');

            form.setAttribute('action', url);

            form.submit();

        }

    });

}

</script>

@endpush

@endsection