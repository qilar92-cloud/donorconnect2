@extends('layouts.app')

@section('title', 'Detail Kegiatan Donor - DonorConnect')

@push('styles')
    @vite('resources/css/kegiatan-donor/show-petugas.css')
    @vite('resources/css/kegiatan-donor/dokumentasi.css')
@endpush

@section('content')

{{-- Detail Kegiatan --}}

<div class="detail-kegiatan-card">

    <div class="detail-kegiatan-header">

        <div class="detail-kegiatan-icon">
            <i class="fas fa-heartbeat"></i>
        </div>

        <div class="detail-kegiatan-header-text">

            <span class="detail-kegiatan-label">
                DETAIL KEGIATAN DONOR
            </span>

            <h1 class="detail-page-title">
                {{ $kegiatan->nama_kegiatan }}
            </h1>

        </div>

    </div>

    <div class="detail-kegiatan-body">

        <div class="detail-info-grid">

            <div class="detail-info-item">

                <div class="detail-info-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>

                <div class="detail-info-content">

                    <span class="detail-info-label">
                        Tanggal
                    </span>

                    <span class="detail-info-value">
                        {{ $kegiatan->tanggal->format('d M Y') }}
                    </span>

                </div>

            </div>


            <div class="detail-info-item">

                <div class="detail-info-icon">
                    <i class="fas fa-clock"></i>
                </div>

                <div class="detail-info-content">

                    <span class="detail-info-label">
                        Waktu
                    </span>

                    <span class="detail-info-value">
                        {{ $kegiatan->waktu }}
                    </span>

                </div>

            </div>


            <div class="detail-info-item">

                <div class="detail-info-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>

                <div class="detail-info-content">

                    <span class="detail-info-label">
                        Lokasi
                    </span>

                    <span class="detail-info-value">
                        {{ $kegiatan->lokasi }}
                    </span>

                </div>

            </div>


            <div class="detail-info-item">

                <div class="detail-info-icon">
                    <i class="fas fa-check-circle"></i>
                </div>

                <div class="detail-info-content">

                    <span class="detail-info-label">
                        Status
                    </span>

                    <span class="detail-status-badge">
                        <span class="detail-status-dot"></span>
                        Tersedia
                    </span>

                </div>

            </div>

        </div>


        <div class="detail-description">

            <span class="detail-description-label">
                Keterangan
            </span>

            <p class="detail-description-text">
                {{ $kegiatan->keterangan ?? 'Tidak ada keterangan untuk kegiatan ini.' }}
            </p>

        </div>

    </div>

</div>


{{-- Pendonor --}}

<div class="pendonor-card">

    <div class="pendonor-header">

        <div class="pendonor-heading">

            <div class="pendonor-icon">
                <i class="fas fa-users"></i>
            </div>

            <div>

                <h2 class="pendonor-title">
                    Pendonor yang Mendaftar
                </h2>

                <p class="pendonor-subtitle">
                    Daftar pendonor yang mengikuti kegiatan ini.
                </p>

            </div>

        </div>


        <span class="pendonor-count">
            {{ $kegiatan->pendaftaranDonor->count() }}
        </span>

    </div>


    <div class="pendonor-body">

        @if ($kegiatan->pendaftaranDonor->count() > 0)

            <div class="pendonor-table-wrapper">

                <table class="pendonor-table">

                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Nama Pendonor</th>
                            <th>Status</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach ($kegiatan->pendaftaranDonor as $pendaftaran)

                            <tr>

                                <td class="pendonor-number">
                                    {{ $loop->iteration }}
                                </td>

                                <td>

                                    <div class="pendonor-name">

                                        <div class="pendonor-avatar">
                                            <i class="fas fa-user"></i>
                                        </div>

                                        <span>
                                            {{ $pendaftaran->pendonor->user->nama ?? '-' }}
                                        </span>

                                    </div>

                                </td>

                                <td>

                                    @if ($pendaftaran->status_pendaftaran == 'menunggu')

                                        <span class="status-pendaftaran status-menunggu">
                                            Menunggu
                                        </span>

                                    @elseif ($pendaftaran->status_pendaftaran == 'diterima')

                                        <span class="status-pendaftaran status-diterima">
                                            Diterima
                                        </span>

                                    @elseif ($pendaftaran->status_pendaftaran == 'ditolak')

                                        <span class="status-pendaftaran status-ditolak">
                                            Ditolak
                                        </span>

                                    @else

                                        <span class="status-pendaftaran status-lainnya">
                                            {{ $pendaftaran->status_pendaftaran ?? '-' }}
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="pendonor-empty">

                <div class="pendonor-empty-icon">
                    <i class="fas fa-user-slash"></i>
                </div>

                <h3 class="pendonor-empty-title">
                    Belum Ada Pendonor
                </h3>

                <p class="pendonor-empty-text">
                    Belum ada pendonor yang mendaftar pada kegiatan ini.
                </p>

            </div>

        @endif

    </div>

</div>


{{-- Dokumentasi --}}

<div class="dokumentasi-card">

    <div class="dokumentasi-header">

        <div class="dokumentasi-heading">

            <div class="dokumentasi-icon">
                <i class="fas fa-camera"></i>
            </div>

            <div>

                <span class="dokumentasi-label">
                    DOKUMENTASI KEGIATAN
                </span>

                <h2>
                    Dokumentasi Donor Darah
                </h2>

                <p>
                    Simpan foto kegiatan donor darah.
                </p>

            </div>

        </div>


        <button
            type="button"
            class="btn-upload-dokumentasi"
            onclick="toggleDokumentasiForm()"
        >
            <i class="fas fa-plus"></i>
            Upload Foto
        </button>

    </div>


    <div
        id="formDokumentasi"
        class="upload-wrapper"
    >

        <form
            action="{{ route('dokumentasi-donor.store', $kegiatan->id_kegiatan) }}"
            method="POST"
            enctype="multipart/form-data"
            class="upload-form"
        >

            @csrf


            <div class="upload-title">

                <div class="upload-title-icon">
                    <i class="fas fa-images"></i>
                </div>

                <div>

                    <h3>
                        Upload Dokumentasi
                    </h3>

                    <p>
                        Pilih beberapa foto sekaligus.
                    </p>

                </div>

            </div>


            <div class="photo-upload-area">

                <div class="photo-upload-icon">
                    <i class="fas fa-cloud-upload-alt"></i>
                </div>

                <h4>
                    Pilih Foto Dokumentasi
                </h4>

                <p>
                    JPG, PNG, atau WEBP · Maksimal 5 MB per foto
                </p>


                <label
                    for="fotoDokumentasi"
                    class="btn-pilih-foto"
                >
                    <i class="fas fa-folder-open"></i>
                    Pilih Foto
                </label>


                <input
                    type="file"
                    id="fotoDokumentasi"
                    name="foto[]"
                    accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                    multiple
                    required
                >


                <div
                    id="jumlahFoto"
                    class="jumlah-foto"
                >
                    Belum ada foto dipilih
                </div>


                <div
                    id="previewFoto"
                    class="preview-foto"
                ></div>

            </div>


            <div class="upload-info-grid">

                <div class="upload-field">

                    <label for="judulDokumentasi">
                        Judul Foto
                    </label>

                    <input
                        type="text"
                        id="judulDokumentasi"
                        name="judul"
                        placeholder="Contoh: Kegiatan donor darah"
                    >

                </div>


                <div class="upload-field">

                    <label for="keteranganDokumentasi">
                        Keterangan
                    </label>

                    <textarea
                        id="keteranganDokumentasi"
                        name="keterangan"
                        rows="3"
                        placeholder="Keterangan foto (opsional)"
                    ></textarea>

                </div>

            </div>


            <div class="upload-actions">

                <button
                    type="button"
                    class="btn-batal-upload"
                    onclick="tutupDokumentasiForm()"
                >
                    Batal
                </button>

                <button
                    type="submit"
                    class="btn-simpan-upload"
                >
                    <i class="fas fa-upload"></i>
                    Upload Semua Foto
                </button>

            </div>

        </form>

    </div>


    {{-- Galeri --}}

    <div class="dokumentasi-content">

        @if ($dokumentasi->count() > 0)

            <div class="galeri-header">

                <div>

                    <h3>
                        Galeri Dokumentasi
                    </h3>

                    <p>
                        {{ $dokumentasi->count() }} foto dokumentasi
                    </p>

                </div>

            </div>


            <div class="dokumentasi-grid">

                @foreach ($dokumentasi as $foto)

                    <div class="dokumentasi-item">

                        <div class="foto-wrapper">

                            <img
                                src="{{ asset('storage/' . $foto->foto) }}"
                                alt="{{ $foto->judul ?? 'Dokumentasi donor darah' }}"
                                loading="lazy"
                            >


                            <div class="foto-overlay">

                                <a
                                    href="{{ asset('storage/' . $foto->foto) }}"
                                    target="_blank"
                                    class="btn-lihat-foto"
                                    title="Lihat foto"
                                >
                                    <i class="fas fa-expand"></i>
                                </a>


                                <form
                                    action="{{ route('dokumentasi-donor.destroy', $foto->id_dokumentasi) }}"
                                    method="POST"
                                    onsubmit="return confirm('Hapus foto dokumentasi ini?')"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn-hapus-foto"
                                        title="Hapus foto"
                                    >
                                        <i class="fas fa-trash"></i>
                                    </button>

                                </form>

                            </div>

                        </div>


                        <div class="foto-info">

                            <strong>
                                {{ $foto->judul ?? 'Dokumentasi donor darah' }}
                            </strong>

                            @if ($foto->keterangan)

                                <p>
                                    {{ $foto->keterangan }}
                                </p>

                            @endif

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="dokumentasi-empty">

                <div class="empty-icon">
                    <i class="far fa-images"></i>
                </div>

                <h3>
                    Belum Ada Dokumentasi
                </h3>

                <p>
                    Upload foto kegiatan donor darah untuk menampilkannya di galeri.
                </p>

                <button
                    type="button"
                    class="btn-empty-upload"
                    onclick="toggleDokumentasiForm()"
                >
                    <i class="fas fa-plus"></i>
                    Upload Foto
                </button>

            </div>

        @endif

    </div>

</div>


{{-- Tombol --}}

<div class="detail-action-card">

    <div class="detail-actions">

        <a
            href="{{ route('kegiatan-donor.index') }}"
            class="btn-detail-back"
        >
            <i class="fas fa-arrow-left"></i>
            Kembali
        </a>

        <a
            href="{{ route('kegiatan-donor.edit', $kegiatan->id_kegiatan) }}"
            class="btn-detail-edit"
        >
            <i class="fas fa-edit"></i>
            Edit
        </a>

    </div>

</div>

@endsection


<script>

document.addEventListener('DOMContentLoaded', function () {

    const inputFoto =
        document.getElementById('fotoDokumentasi');

    const jumlahFoto =
        document.getElementById('jumlahFoto');

    const previewFoto =
        document.getElementById('previewFoto');


    if (!inputFoto) {
        return;
    }


    inputFoto.addEventListener('change', function () {

        previewFoto.innerHTML = '';


        if (this.files.length === 0) {

            jumlahFoto.textContent =
                'Belum ada foto dipilih';

            jumlahFoto.classList.remove('active');

            return;
        }


        jumlahFoto.textContent =
            this.files.length + ' foto dipilih';

        jumlahFoto.classList.add('active');


        Array.from(this.files).forEach(function (file, index) {

            if (!file.type.startsWith('image/')) {
                return;
            }


            const reader =
                new FileReader();


            reader.onload = function (event) {

                const item =
                    document.createElement('div');

                item.className =
                    'preview-foto-item';


                item.innerHTML = `
                    <img
                        src="${event.target.result}"
                        alt="Preview foto ${index + 1}"
                    >

                    <span class="preview-nomor">
                        ${index + 1}
                    </span>
                `;


                previewFoto.appendChild(item);

            };


            reader.readAsDataURL(file);

        });

    });

});


function toggleDokumentasiForm()
{
    const form =
        document.getElementById('formDokumentasi');

    form.classList.toggle('show');
}


function tutupDokumentasiForm()
{
    const form =
        document.getElementById('formDokumentasi');

    const input =
        document.getElementById('fotoDokumentasi');

    const jumlahFoto =
        document.getElementById('jumlahFoto');

    const previewFoto =
        document.getElementById('previewFoto');


    form.classList.remove('show');

    input.value = '';

    jumlahFoto.textContent =
        'Belum ada foto dipilih';

    jumlahFoto.classList.remove('active');

    previewFoto.innerHTML = '';

    document.getElementById(
        'judulDokumentasi'
    ).value = '';

    document.getElementById(
        'keteranganDokumentasi'
    ).value = '';
}

</script>