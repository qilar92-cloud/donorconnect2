@extends('layouts.app')

@section('title', 'Detail Kegiatan Donor - DonorConnect')

@push('styles')
@vite([
'resources/css/kegiatan-donor/show-petugas.css',
'resources/css/kegiatan-donor/dokumentasi.css'
])
@endpush

@section('content')

{{-- Notifikasi --}}

@if (session('success') || session('error') || $errors->any())

<div
    class="dc-notification
    {{ session('error') || $errors->any()
        ? 'dc-notification-error'
        : 'dc-notification-success' }}"
    id="dcNotification"
>


<div class="dc-notification-icon">

    @if (session('error') || $errors->any())

        <i class="fas fa-exclamation"></i>

    @else

        <i class="fas fa-check"></i>

    @endif

</div>

<div class="dc-notification-content">

    @if (session('error'))

        <strong>
            Upload Tidak Berhasil
        </strong>

        <p>
            {{ session('error') }}
        </p>

    @elseif ($errors->any())

        <strong>
            Upload Tidak Berhasil
        </strong>

        <p>
            {{ $errors->first() }}
        </p>

    @else

        <strong>
            Berhasil!
        </strong>

        <p>
            {{ session('success') }}
        </p>

    @endif

</div>

<button
    type="button"
    class="dc-notification-close"
    onclick="tutupNotifikasi()"
    aria-label="Tutup notifikasi"
    title="Tutup"
>
    <i class="fas fa-times"></i>
</button>

<div class="dc-notification-progress"></div>


</div>

@endif

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

        <p class="detail-kegiatan-subtitle">
            Informasi lengkap kegiatan donor darah.
        </p>

    </div>

</div>

<div class="detail-kegiatan-body">

    <div class="detail-info-grid">

        {{-- Tanggal --}}

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

        {{-- Waktu --}}

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

        {{-- Lokasi --}}

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

        {{-- Status --}}

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

    {{-- Keterangan --}}

    <div class="detail-description">

        <span class="detail-description-label">
            <i class="fas fa-info-circle"></i>
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

                                @if ($pendaftaran->status_pendaftaran === 'menunggu')

                                    <span class="status-pendaftaran status-menunggu">
                                        Menunggu
                                    </span>

                                @elseif ($pendaftaran->status_pendaftaran === 'diterima')

                                    <span class="status-pendaftaran status-diterima">
                                        Diterima
                                    </span>

                                @elseif ($pendaftaran->status_pendaftaran === 'ditolak')

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

{{-- Upload --}}

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

                            <button
                                type="button"
                                class="btn-lihat-foto"
                                data-image="{{ asset('storage/' . $foto->foto) }}"
                                data-title="{{ $foto->judul ?? 'Dokumentasi donor darah' }}"
                                title="Lihat foto"
                            >
                                <i class="fas fa-expand"></i>
                            </button>

                            <form
                                action="{{ route('dokumentasi-donor.destroy', $foto->id_dokumentasi) }}"
                                method="POST"
                                class="form-hapus-dokumentasi"
                                data-title="{{ $foto->judul ?? 'Dokumentasi donor darah' }}"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn-hapus-foto"
                                    title="Hapus foto"
                                    aria-label="Hapus foto"
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

{{-- Lightbox --}}

<div
    class="dokumentasi-lightbox"
    id="dokumentasiLightbox"
>


<button
    type="button"
    class="lightbox-close"
    id="lightboxClose"
    aria-label="Tutup foto"
    title="Tutup"
>
    <i class="fas fa-times"></i>
</button>

<div class="lightbox-content">

    <button
        type="button"
        class="lightbox-prev"
        id="lightboxPrev"
        aria-label="Foto sebelumnya"
    >
        <i class="fas fa-chevron-left"></i>
    </button>

    <img
        src=""
        alt="Dokumentasi donor"
        class="lightbox-image"
        id="lightboxImage"
    >

    <button
        type="button"
        class="lightbox-next"
        id="lightboxNext"
        aria-label="Foto berikutnya"
    >
        <i class="fas fa-chevron-right"></i>
    </button>

    <div
        class="lightbox-counter"
        id="lightboxCounter"
    >
        1 / 1
    </div>

</div>


</div>

{{-- Modal Hapus Dokumentasi --}}

<div
    class="dc-delete-modal"
    id="dcDeleteModal"
    role="dialog"
    aria-modal="true"
    aria-labelledby="dcDeleteTitle"
    aria-describedby="dcDeleteText"
>
    <div class="dc-delete-dialog">


    <div class="dc-delete-header">

        <button
            type="button"
            class="dc-delete-close"
            id="dcDeleteClose"
            aria-label="Tutup"
            title="Tutup"
        >
            <i class="fas fa-times"></i>
        </button>

        <div class="dc-delete-icon">
            <i class="fas fa-trash-alt"></i>
        </div>

        <h2 id="dcDeleteTitle">
            Hapus Dokumentasi?
        </h2>

        <p id="dcDeleteText">
            Apakah kamu yakin ingin menghapus foto dokumentasi ini?
        </p>

        <span
            class="dc-delete-name"
            id="dcDeleteName"
        ></span>

        <small>
            Foto yang sudah dihapus tidak dapat dikembalikan.
        </small>

    </div>

    <div class="dc-delete-actions">

        <button
            type="button"
            class="dc-delete-cancel"
            id="dcDeleteCancel"
        >
            Batal
        </button>

        <button
            type="button"
            class="dc-delete-confirm"
            id="dcDeleteConfirm"
        >
            <i class="fas fa-trash-alt"></i>
            Hapus Foto
        </button>

    </div>

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

@push('scripts')

<script>

/* Notifikasi */

document.addEventListener('DOMContentLoaded', function () {

    const notification =
        document.getElementById('dcNotification');

    if (!notification) {
        return;
    }

    setTimeout(function () {
        tutupNotifikasi();
    }, 4500);

});


function tutupNotifikasi()
{
    const notification =
        document.getElementById('dcNotification');

    if (!notification) {
        return;
    }

    notification.style.animation =
        'dcNotificationOut .3s ease forwards';

    setTimeout(function () {
        notification.remove();
    }, 300);
}


/* Preview */

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


/* Upload */

function toggleDokumentasiForm()
{
    const form =
        document.getElementById('formDokumentasi');

    if (!form) {
        return;
    }

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

    if (!form) {
        return;
    }

    form.classList.remove('show');

    if (input) {
        input.value = '';
    }

    if (jumlahFoto) {

        jumlahFoto.textContent =
            'Belum ada foto dipilih';

        jumlahFoto.classList.remove('active');

    }

    if (previewFoto) {
        previewFoto.innerHTML = '';
    }

    const judul =
        document.getElementById('judulDokumentasi');

    const keterangan =
        document.getElementById('keteranganDokumentasi');

    if (judul) {
        judul.value = '';
    }

    if (keterangan) {
        keterangan.value = '';
    }
}


/* Lightbox */

document.addEventListener('DOMContentLoaded', function () {

    const lightbox =
        document.getElementById('dokumentasiLightbox');

    const image =
        document.getElementById('lightboxImage');

    const counter =
        document.getElementById('lightboxCounter');

    const prevButton =
        document.getElementById('lightboxPrev');

    const nextButton =
        document.getElementById('lightboxNext');

    const closeButton =
        document.getElementById('lightboxClose');

    const photos =
        Array.from(
            document.querySelectorAll('.btn-lihat-foto')
        );

    if (
        !lightbox ||
        !image ||
        !counter ||
        !prevButton ||
        !nextButton ||
        !closeButton
    ) {
        return;
    }

    let currentIndex = 0;

    let touchStartX = 0;

    let touchEndX = 0;


    function bukaFoto(index)
    {
        if (!photos.length) {
            return;
        }

        currentIndex = index;

        const button =
            photos[currentIndex];

        image.src =
            button.dataset.image;

        image.alt =
            button.dataset.title ||
            'Dokumentasi donor';

        counter.textContent =
            `${currentIndex + 1} / ${photos.length}`;

        lightbox.classList.add('show');

        document.body.style.overflow =
            'hidden';
    }


    function tutupFoto()
    {
        lightbox.classList.remove('show');

        image.src = '';

        document.body.style.overflow = '';
    }


    function fotoSebelumnya()
    {
        if (!photos.length) {
            return;
        }

        currentIndex =
            (currentIndex - 1 + photos.length)
            % photos.length;

        bukaFoto(currentIndex);
    }


    function fotoBerikutnya()
    {
        if (!photos.length) {
            return;
        }

        currentIndex =
            (currentIndex + 1)
            % photos.length;

        bukaFoto(currentIndex);
    }


    /* Buka Foto */

    photos.forEach(function (button, index) {

        button.addEventListener(
            'click',
            function () {
                bukaFoto(index);
            }
        );

    });


    /* Tutup */

    closeButton.addEventListener(
        'click',
        function (event) {

            event.stopPropagation();

            tutupFoto();

        }
    );


    /* Sebelumnya */

    prevButton.addEventListener(
        'click',
        function (event) {

            event.stopPropagation();

            fotoSebelumnya();

        }
    );


    /* Berikutnya */

    nextButton.addEventListener(
        'click',
        function (event) {

            event.stopPropagation();

            fotoBerikutnya();

        }
    );


    /* Klik luar */

    lightbox.addEventListener(
        'click',
        function (event) {

            if (event.target === lightbox) {
                tutupFoto();
            }

        }
    );


    /* Keyboard */

    document.addEventListener(
        'keydown',
        function (event) {

            if (!lightbox.classList.contains('show')) {
                return;
            }

            if (event.key === 'Escape') {
                tutupFoto();
            }

            if (event.key === 'ArrowLeft') {
                fotoSebelumnya();
            }

            if (event.key === 'ArrowRight') {
                fotoBerikutnya();
            }

        }
    );


    /* Swipe */

    image.addEventListener(
        'touchstart',
        function (event) {

            touchStartX =
                event.changedTouches[0].screenX;

        },
        {
            passive: true
        }
    );


    image.addEventListener(
        'touchend',
        function (event) {

            touchEndX =
                event.changedTouches[0].screenX;

            const jarak =
                touchEndX - touchStartX;

            if (Math.abs(jarak) < 50) {
                return;
            }

            if (jarak < 0) {
                fotoBerikutnya();
            } else {
                fotoSebelumnya();
            }

        },
        {
            passive: true
        }
    );

});


/* Modal hapus */

document.addEventListener('DOMContentLoaded', function () {

    const modal =
        document.getElementById('dcDeleteModal');

    const closeButton =
        document.getElementById('dcDeleteClose');

    const cancelButton =
        document.getElementById('dcDeleteCancel');

    const confirmButton =
        document.getElementById('dcDeleteConfirm');

    const nameElement =
        document.getElementById('dcDeleteName');

    const deleteForms =
        document.querySelectorAll(
            '.form-hapus-dokumentasi'
        );

    if (
        !modal ||
        !closeButton ||
        !cancelButton ||
        !confirmButton
    ) {
        return;
    }

    let selectedForm = null;


    function bukaModal(form)
    {
        selectedForm = form;

        const title =
            form.dataset.title ||
            'Dokumentasi donor darah';

        nameElement.textContent =
            `"${title}"`;

        modal.classList.add('show');

        document.body.classList.add(
            'dc-delete-open'
        );

        closeButton.focus();
    }


    function tutupModal()
    {
        modal.classList.remove('show');

        document.body.classList.remove(
            'dc-delete-open'
        );

        selectedForm = null;
    }


    deleteForms.forEach(function (form) {

        form.addEventListener(
            'submit',
            function (event) {

                event.preventDefault();

                bukaModal(form);

            }
        );

    });


    closeButton.addEventListener(
        'click',
        tutupModal
    );


    cancelButton.addEventListener(
        'click',
        tutupModal
    );


    confirmButton.addEventListener(
        'click',
        function () {

            if (!selectedForm) {
                return;
            }

            const form =
                selectedForm;

            selectedForm = null;

            modal.classList.remove('show');

            document.body.classList.remove(
                'dc-delete-open'
            );

            form.submit();

        }
    );


    modal.addEventListener(
        'click',
        function (event) {

            if (event.target === modal) {
                tutupModal();
            }

        }
    );


    document.addEventListener(
        'keydown',
        function (event) {

            if (!modal.classList.contains('show')) {
                return;
            }

            if (event.key === 'Escape') {
                tutupModal();
            }

        }
    );

});

</script>

@endpush
