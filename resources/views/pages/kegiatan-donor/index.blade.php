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

                        <small>
                            DonorConnect • Petugas PMR
                        </small>

                        <h1>
                            Kegiatan Donor
                        </h1>

                        <p>
                            Kelola jadwal dan informasi kegiatan donor darah.
                        </p>

                    </div>

                </div>

                <div class="banner-right">

                    <div class="banner-total">

                        <strong>
                            {{ $jumlahTotal }}
                        </strong>

                        <span>
                            Total Kegiatan
                        </span>

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
                        ✓
                    </div>

                    <span>
                        {{ session('success') }}
                    </span>

                </div>

            @endif


            {{-- Statistik --}}

            <div class="stats-grid">

                <div class="stat-card">

                    <div class="stat-icon pink">
                        <i class="fas fa-calendar-check"></i>
                    </div>

                    <div class="stat-info">

                        <strong>
                            {{ $jumlahTotal }}
                        </strong>

                        <span>
                            Total Kegiatan
                        </span>

                    </div>

                </div>


                <div class="stat-card">

                    <div class="stat-icon yellow">
                        <i class="fas fa-calendar-plus"></i>
                    </div>

                    <div class="stat-info">

                        <strong>
                            {{ $jumlahMendatang }}
                        </strong>

                        <span>
                            Kegiatan Mendatang
                        </span>

                    </div>

                </div>


                <div class="stat-card">

                    <div class="stat-icon blue">
                        <i class="fas fa-calendar-day"></i>
                    </div>

                    <div class="stat-info">

                        <strong>
                            {{ $jumlahHariIni }}
                        </strong>

                        <span>
                            Kegiatan Hari Ini
                        </span>

                    </div>

                </div>

            </div>


            {{-- Heading --}}

            <div class="section-heading">

                <div class="section-title">

                    <div class="section-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>

                    <div>

                        <h2>
                            Daftar Kegiatan
                        </h2>

                        <p>
                            Informasi kegiatan donor yang tersedia
                        </p>

                    </div>

                </div>

                <span class="section-count">
                    {{ $jumlahTotal }} kegiatan
                </span>

            </div>


            {{-- Kegiatan --}}

            @if ($kegiatan->count() > 0)

                <div class="kegiatan-grid">

                    @foreach ($kegiatan as $item)

                        <div class="kegiatan-card">

                            {{-- Header --}}

                            <div class="card-top">

                                <div class="event-top">

                                    <div class="event-number">
                                        {{ sprintf('%02d', $kegiatan->firstItem() + $loop->index) }}
                                    </div>

                                    <div class="event-icon">
                                        <i class="fas fa-droplet"></i>
                                    </div>

                                </div>

                                <h3>
                                    {{ $item->nama_kegiatan }}
                                </h3>

                            </div>


                            {{-- Data --}}

                            <div class="card-body">

                                <div class="info-item">

                                    <div class="info-icon">
                                        <i class="fas fa-calendar-day"></i>
                                    </div>

                                    <div class="info-text">

                                        <small>
                                            Tanggal
                                        </small>

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

                                        <small>
                                            Waktu
                                        </small>

                                        <span>
                                            {{ $item->waktu }}
                                        </span>

                                    </div>

                                </div>


                                <div class="info-item">

                                    <div class="info-icon">
                                        <i class="fas fa-location-dot"></i>
                                    </div>

                                    <div class="info-text">

                                        <small>
                                            Lokasi
                                        </small>

                                        <span>
                                            {{ $item->lokasi }}
                                        </span>

                                    </div>

                                </div>


                                @if ($item->keterangan)

                                    <div class="description">

                                        <strong>
                                            Keterangan
                                        </strong>

                                        {{ $item->keterangan }}

                                    </div>

                                @endif

                            </div>


                            {{-- Aksi --}}

                            <div class="card-actions">

                                <a
                                    href="{{ route('kegiatan-donor.show', $item->id_kegiatan) }}"
                                    class="action-btn action-detail"
                                >
                                    <i class="fas fa-eye"></i>
                                    Detail
                                </a>

                                <a
                                    href="{{ route('kegiatan-donor.edit', $item->id_kegiatan) }}"
                                    class="action-btn action-edit"
                                >
                                    <i class="fas fa-pen"></i>
                                    Edit
                                </a>

                                <button
                                    type="button"
                                    class="action-btn action-delete"
                                    onclick="actionDestroy('{{ route('kegiatan-donor.destroy', $item->id_kegiatan) }}')"
                                >
                                    <i class="fas fa-trash"></i>
                                    Hapus
                                </button>

                            </div>

                        </div>

                    @endforeach

                </div>


                {{-- Pagination --}}

                @if ($kegiatan->hasPages())

                    <div class="pagination-area">

                        {{ $kegiatan->links() }}

                    </div>

                @endif

            @else

                {{-- Kosong --}}

                <div class="empty-card">

                    <div class="empty-icon">
                        <i class="fas fa-calendar-xmark"></i>
                    </div>

                    <h3>
                        Belum Ada Kegiatan
                    </h3>

                    <p>
                        Belum ada kegiatan donor yang tersedia.
                        Silakan tambahkan kegiatan baru.
                    </p>

                </div>

            @endif

        </div>

    </div>


    {{-- Form Hapus --}}

    <form
        id="form-destroy"
        class="form-hidden"
        method="POST"
    >
        @csrf
        @method('DELETE')
    </form>


    @push('scripts')

        <script>
            function actionDestroy(url) {

                Swal.fire({
                    title: 'Hapus kegiatan?',
                    text: 'Data kegiatan yang dihapus tidak dapat dikembalikan.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d93659',
                    cancelButtonColor: '#aaa',
                    confirmButtonText: 'Ya, hapus',
                    cancelButtonText: 'Batal'
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