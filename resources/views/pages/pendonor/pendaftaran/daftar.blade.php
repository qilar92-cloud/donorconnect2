@extends('layouts.pendonor')

@section('title', 'Daftar Kegiatan Donor')

@push('styles')
    @vite('resources/css/pendonor/pendaftaran-daftar.css')
@endpush

@section('content')

<div class="pendaftaran-page">

    <div class="pendaftaran-card">

        {{-- Header --}}

        <div class="form-header">

            <div class="header-text">

                <h1>
                    Daftar sebagai Pendonor
                </h1>

                <p>
                    Periksa data diri dan kegiatan sebelum mendaftar.
                </p>

            </div>

            <a
                href="{{ route('pendonor.kegiatan.show', $kegiatan->id_kegiatan) }}"
                class="btn-kembali"
            >
                <i class="fas fa-arrow-left"></i>
                Kembali
            </a>

        </div>


        <form
            action="{{ route('pendaftaran-donor.store') }}"
            method="POST"
        >

            @csrf

            <input
                type="hidden"
                name="id_kegiatan"
                value="{{ $kegiatan->id_kegiatan }}"
            >


            {{-- Data Pendonor --}}

            <section class="form-section">

                <div class="section-title">

                    <div class="section-icon">
                        <i class="fas fa-user"></i>
                    </div>

                    <div>

                        <h2>
                            Data Pendonor
                        </h2>

                        <p>
                            Pastikan data diri kamu sudah benar.
                        </p>

                    </div>

                </div>


                <div class="data-grid">

                    <div class="data-item">

                        <span>Nama Lengkap</span>

                        <strong>
                            {{ $pendonor->user->nama ?? '-' }}
                        </strong>

                    </div>


                    <div class="data-item">

                        <span>Status</span>

                        <strong>
                            {{ $pendonor->status ?? '-' }}
                        </strong>

                    </div>


                    <div class="data-item">

                        <span>Kelas / Jabatan</span>

                        <strong>
                            {{ $pendonor->kelas_jabatan ?? '-' }}
                        </strong>

                    </div>


                    <div class="data-item">

                        <span>Usia</span>

                        <strong>
                            {{ $pendonor->tanggal_lahir
                                ? \Carbon\Carbon::parse($pendonor->tanggal_lahir)->age . ' Tahun'
                                : '-' }}
                        </strong>

                    </div>


                    <div class="data-item">

                        <span>Golongan Darah</span>

                        <strong>
                            {{ $pendonor->golongan_darah ?? '-' }}
                        </strong>

                    </div>


                    <div class="data-item">

                        <span>No. Telepon</span>

                        <strong>
                            {{ $pendonor->nomor_telepon ?? '-' }}
                        </strong>

                    </div>


                    <div class="data-item data-full">

                        <span>Informasi Kesehatan</span>

                        <strong>
                            {{ $pendonor->informasi_kesehatan ?? '-' }}
                        </strong>

                    </div>

                </div>

            </section>


            {{-- Kegiatan --}}

            <section class="form-section">

                <div class="section-title">

                    <div class="section-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>

                    <div>

                        <h2>
                            Kegiatan Donor
                        </h2>

                        <p>
                            Informasi kegiatan yang akan kamu ikuti.
                        </p>

                    </div>

                </div>


                <div class="event-box">

                    <div class="event-name">

                        <span>
                            Nama Kegiatan
                        </span>

                        <h3>
                            {{ $kegiatan->nama_kegiatan }}
                        </h3>

                    </div>


                    <div class="event-details">

                        <div class="event-detail">

                            <div class="detail-icon">
                                <i class="far fa-calendar"></i>
                            </div>

                            <div>

                                <span>
                                    Tanggal
                                </span>

                                <strong>
                                    {{ $kegiatan->tanggal->format('d M Y') }}
                                </strong>

                            </div>

                        </div>


                        <div class="event-detail">

                            <div class="detail-icon">
                                <i class="far fa-clock"></i>
                            </div>

                            <div>

                                <span>
                                    Waktu
                                </span>

                                <strong>
                                    {{ $kegiatan->waktu }}
                                </strong>

                            </div>

                        </div>


                        <div class="event-detail">

                            <div class="detail-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>

                            <div>

                                <span>
                                    Lokasi
                                </span>

                                <strong>
                                    {{ $kegiatan->lokasi }}
                                </strong>

                            </div>

                        </div>

                    </div>

                </div>

            </section>


            {{-- Catatan --}}

            <section class="form-section">

                <div class="section-title">

                    <div class="section-icon">
                        <i class="far fa-edit"></i>
                    </div>

                    <div>

                        <h2>
                            Catatan
                        </h2>

                        <p>
                            Tambahkan catatan jika diperlukan.
                        </p>

                    </div>

                </div>


                <textarea
                    name="catatan"
                    class="catatan-input"
                    rows="2"
                    placeholder="Tulis catatan tambahan (opsional)..."
                >{{ old('catatan') }}</textarea>

            </section>


            {{-- Tombol --}}

            <div class="form-actions">

                <a
                    href="{{ route('pendonor.kegiatan.show', $kegiatan->id_kegiatan) }}"
                    class="btn-batal"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="btn-daftar"
                >
                    <i class="fas fa-check"></i>
                    Daftar Sekarang
                </button>

            </div>

        </form>

    </div>

</div>


{{-- Modal Peringatan --}}

@if (session('error'))

    <div class="warning-overlay" id="warningModal">

        <div class="warning-modal">

            <button
                type="button"
                class="warning-close"
                onclick="tutupPeringatan()"
                aria-label="Tutup"
            >
                <i class="fas fa-times"></i>
            </button>


            <div class="warning-icon">

                <span class="warning-ring"></span>

                <span class="warning-ring-inner"></span>

                <i class="fas fa-exclamation"></i>

            </div>


            <div class="warning-content">

                <span class="warning-label">
                    Perhatian
                </span>

                <h2>
                    Pendaftaran Tidak Dapat Dilakukan
                </h2>

                <p>
                    {{ session('error') }}
                </p>

            </div>


            <button
                type="button"
                class="warning-button"
                onclick="tutupPeringatan()"
            >
                Mengerti
            </button>

        </div>

    </div>

@endif

@endsection


@push('styles')

<style>

/* Modal */

.warning-overlay {
    position: fixed;
    inset: 0;
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    box-sizing: border-box;
    background: rgba(55, 29, 39, .22);
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
    animation: warningOverlayShow .25s ease;
}

.warning-modal {
    position: relative;
    width: min(370px, 100%);
    padding: 32px 28px 27px;
    box-sizing: border-box;
    overflow: hidden;
    text-align: center;
    background:
        radial-gradient(
            circle at 50% -20%,
            rgba(255, 222, 231, .78),
            transparent 135px
        ),
        #fffdfb;
    border: 1px solid #efdce1;
    border-radius: 25px;
    box-shadow:
        0 28px 70px rgba(67, 38, 48, .18),
        0 8px 25px rgba(67, 38, 48, .07);
    animation: warningShow .45s cubic-bezier(.22, 1, .36, 1);
}

.warning-modal::before {
    content: "";
    position: absolute;
    top: 0;
    left: 20%;
    right: 20%;
    height: 3px;
    border-radius: 0 0 10px 10px;
    background: linear-gradient(
        90deg,
        #98153e,
        #c72e59,
        #e27b96
    );
}

.warning-modal::after {
    content: "";
    position: absolute;
    width: 130px;
    height: 130px;
    left: -62px;
    bottom: -83px;
    background: rgba(223, 85, 117, .055);
    border-radius: 50%;
    pointer-events: none;
}


/* Tombol tutup */

.warning-close {
    position: absolute;
    top: 13px;
    right: 13px;
    z-index: 5;
    width: 28px;
    height: 28px;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #f0e0e5;
    border-radius: 50%;
    background: rgba(255, 255, 255, .90);
    color: #a9939b;
    font-size: 9px;
    cursor: pointer;
    transition:
        background .2s ease,
        color .2s ease,
        border-color .2s ease,
        transform .25s ease;
}

.warning-close:hover {
    background: #fff0f4;
    border-color: #eccbd5;
    color: #98153e;
    transform: rotate(90deg) scale(1.05);
}


/* Ikon */

.warning-icon {
    position: relative;
    width: 72px;
    height: 72px;
    margin: 2px auto 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background:
        radial-gradient(
            circle,
            #fffafa 0%,
            #fff1f4 65%,
            #fde7ec 100%
        );
    color: #c72e59;
    box-shadow:
        0 9px 24px rgba(199, 46, 89, .10),
        inset 0 0 0 1px rgba(199, 46, 89, .07);
}


/* Ring luar */

.warning-ring {
    position: absolute;
    inset: -5px;
    display: block;
    border: 3px solid transparent;
    border-top-color: #d65b79;
    border-right-color: #d65b79;
    border-radius: 50%;
    transform: rotate(-45deg) scale(.72);
    clip-path: inset(0 100% 0 0);
    animation: warningRing .85s cubic-bezier(.22, 1, .36, 1) forwards;
}


/* Ring dalam */

.warning-ring-inner {
    position: absolute;
    inset: 8px;
    display: block;
    border: 1px solid rgba(199, 46, 89, .13);
    border-radius: 50%;
    opacity: 0;
    transform: scale(.72);
    animation: warningInnerRing .5s ease-out .45s forwards;
}


/* Tanda seru */

.warning-icon i {
    position: relative;
    z-index: 3;
    opacity: 0;
    transform: scale(.25) rotate(-12deg);
    animation: warningIcon .45s cubic-bezier(.22, 1.4, .36, 1) .55s forwards;
}


/* Isi */

.warning-content {
    position: relative;
    z-index: 2;
}

.warning-label {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 7px;
    padding: 4px 10px;
    color: #b0526c;
    background: #fff0f4;
    border: 1px solid #f5dbe2;
    border-radius: 20px;
    font-size: 7px;
    font-weight: 800;
    letter-spacing: .5px;
    text-transform: uppercase;
}

.warning-modal h2 {
    margin: 0 auto 8px;
    max-width: 290px;
    color: #432630;
    font-size: 16px;
    line-height: 1.4;
    font-weight: 800;
    letter-spacing: -.15px;
}

.warning-modal p {
    max-width: 285px;
    margin: 0 auto;
    color: #8d7b82;
    font-size: 9.5px;
    line-height: 1.65;
}


/* Tombol */

.warning-button {
    position: relative;
    z-index: 2;
    min-width: 92px;
    height: 36px;
    margin-top: 21px;
    padding: 0 20px;
    border: 0;
    border-radius: 11px;
    background: linear-gradient(
        115deg,
        #98153e,
        #c72e59,
        #d84c70
    );
    color: #fff;
    font-size: 9px;
    font-weight: 800;
    cursor: pointer;
    box-shadow:
        0 8px 18px rgba(152, 21, 62, .18),
        inset 0 1px 0 rgba(255, 255, 255, .16);
    transition:
        transform .2s ease,
        box-shadow .2s ease,
        filter .2s ease;
}

.warning-button:hover {
    background: linear-gradient(
        115deg,
        #8d1239,
        #b92550,
        #cd4165
    );
    transform: translateY(-2px);
    filter: brightness(1.03);
    box-shadow:
        0 11px 23px rgba(152, 21, 62, .23);
}

.warning-button:active {
    transform: translateY(0);
}


/* Animasi */

@keyframes warningOverlayShow {

    from {
        opacity: 0;
    }

    to {
        opacity: 1;
    }

}

@keyframes warningShow {

    from {
        opacity: 0;
        transform: translateY(15px) scale(.93);
    }

    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }

}

@keyframes warningRing {

    0% {
        opacity: 0;
        clip-path: inset(0 100% 0 0);
        transform: rotate(-45deg) scale(.72);
    }

    20% {
        opacity: 1;
    }

    45% {
        clip-path: inset(0 65% 0 0);
    }

    70% {
        clip-path: inset(0 30% 0 0);
    }

    100% {
        opacity: 1;
        clip-path: inset(0 0 0 0);
        transform: rotate(315deg) scale(1);
    }

}

@keyframes warningInnerRing {

    from {
        opacity: 0;
        transform: scale(.72);
    }

    to {
        opacity: 1;
        transform: scale(1);
    }

}

@keyframes warningIcon {

    0% {
        opacity: 0;
        transform: scale(.25) rotate(-12deg);
    }

    60% {
        opacity: 1;
        transform: scale(1.18) rotate(3deg);
    }

    82% {
        transform: scale(.94) rotate(0);
    }

    100% {
        opacity: 1;
        transform: scale(1) rotate(0);
    }

}


/* HP */

@media (max-width: 600px) {

    .warning-overlay {
        padding: 15px;
    }

    .warning-modal {
        width: min(325px, 100%);
        padding: 28px 20px 23px;
        border-radius: 22px;
    }

    .warning-icon {
        width: 63px;
        height: 63px;
        margin-bottom: 16px;
    }

    .warning-ring {
        border-width: 2.5px;
    }

    .warning-modal h2 {
        max-width: 260px;
        font-size: 14px;
    }

    .warning-modal p {
        max-width: 245px;
        font-size: 9px;
    }

    .warning-label {
        font-size: 6.5px;
    }

    .warning-close {
        top: 11px;
        right: 11px;
        width: 26px;
        height: 26px;
    }

    .warning-button {
        min-width: 84px;
        height: 34px;
        margin-top: 18px;
        font-size: 9px;
    }

}


/* HP kecil */

@media (max-width: 380px) {

    .warning-modal {
        width: min(305px, 100%);
        padding: 25px 17px 21px;
        border-radius: 20px;
    }

    .warning-icon {
        width: 58px;
        height: 58px;
    }

    .warning-modal h2 {
        font-size: 13px;
    }

    .warning-modal p {
        font-size: 8.5px;
    }

}

</style>

@endpush


@push('scripts')

<script>

function tutupPeringatan() {

    const modal = document.getElementById('warningModal');

    if (modal) {
        modal.style.opacity = '0';

        const box = modal.querySelector('.warning-modal');

        if (box) {
            box.style.transform = 'translateY(8px) scale(.96)';
            box.style.transition = '.2s ease';
        }

        setTimeout(function () {
            modal.remove();
        }, 200);

    }

}

</script>

@endpush