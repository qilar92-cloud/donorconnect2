@extends('layouts.pendonor')

@section('title', 'Dokumentasi Donor Darah - DonorConnect')

@push('styles')
    @vite('resources/css/pendonor/dokumentasi.css')
@endpush

@section('content')

<div class="documentation-gallery">

    {{-- Dekorasi --}}

    <span class="gallery-decor decor-heart-1">♡</span>
    <span class="gallery-decor decor-heart-2">♡</span>
    <span class="gallery-decor decor-star-1">✦</span>
    <span class="gallery-decor decor-star-2">✦</span>


    {{-- Header --}}

    <div class="documentation-header">

        <a
            href="{{ route('dashboard') }}"
            class="documentation-back"
            aria-label="Kembali ke dashboard"
        >
            <i class="fas fa-arrow-left"></i>
        </a>

        <div class="documentation-heading">

            <span class="documentation-label">
                DONORCONNECT
            </span>

            <h1>
                Dokumentasi Donor Darah
            </h1>

            <p>
                Kumpulan momen kegiatan donor darah.
            </p>

        </div>

        <div class="documentation-total">

            <strong>
                {{ $dokumentasi->count() }}
            </strong>

            <span>
                FOTO
            </span>

        </div>

    </div>


    {{-- Gallery --}}

    @if ($dokumentasi->count() > 0)

        <div class="documentation-gallery-grid">

            @foreach ($dokumentasi as $foto)

                <button
                    type="button"
                    class="documentation-photo"
                    data-index="{{ $loop->index }}"
                    aria-label="Buka foto dokumentasi"
                >

                    <img
                        src="{{ asset('storage/' . $foto->foto) }}"
                        alt="{{ $foto->judul ?: 'Dokumentasi donor darah' }}"
                        loading="lazy"
                    >

                    <div class="documentation-photo-overlay">

                        <div class="documentation-zoom">
                            <i class="fas fa-expand"></i>
                        </div>

                    </div>

                </button>

            @endforeach

        </div>

    @else

        <div class="documentation-empty">

            <div class="documentation-empty-icon">
                <i class="fas fa-images"></i>
            </div>

            <h2>
                Belum Ada Dokumentasi
            </h2>

            <p>
                Dokumentasi kegiatan donor darah belum tersedia.
            </p>

            <a
                href="{{ route('dashboard') }}"
                class="documentation-empty-button"
            >
                <i class="fas fa-arrow-left"></i>
                Kembali ke Dashboard
            </a>

        </div>

    @endif


    {{-- Footer --}}

    @if ($dokumentasi->count() > 0)

        <div class="documentation-footer">

            <span></span>

            <p>
                Setetes Darah, Sejuta Harapan
            </p>

            <span></span>

        </div>

    @endif

</div>


{{-- Lightbox --}}

@if ($dokumentasi->count() > 0)

    <div
        class="photo-lightbox"
        id="photoLightbox"
        aria-hidden="true"
    >

        <button
            type="button"
            class="lightbox-arrow lightbox-prev"
            id="lightboxPrev"
            aria-label="Foto sebelumnya"
        >
            <i class="fas fa-chevron-left"></i>
        </button>


        <div class="lightbox-content">

            <img
                src=""
                alt="Dokumentasi donor darah"
                id="lightboxImage"
            >

            <div class="lightbox-counter">

                <span id="lightboxCurrent">
                    1
                </span>

                /

                <span id="lightboxTotal">
                    {{ $dokumentasi->count() }}
                </span>

            </div>

        </div>


        <button
            type="button"
            class="lightbox-arrow lightbox-next"
            id="lightboxNext"
            aria-label="Foto berikutnya"
        >
            <i class="fas fa-chevron-right"></i>
        </button>

    </div>

@endif


<script>
document.addEventListener('DOMContentLoaded', function () {

    const photos = Array.from(
        document.querySelectorAll('.documentation-photo')
    );

    const lightbox = document.getElementById(
        'photoLightbox'
    );

    const image = document.getElementById(
        'lightboxImage'
    );

    const prevButton = document.getElementById(
        'lightboxPrev'
    );

    const nextButton = document.getElementById(
        'lightboxNext'
    );

    const currentNumber = document.getElementById(
        'lightboxCurrent'
    );


    if (
        !lightbox ||
        !image ||
        !prevButton ||
        !nextButton ||
        !currentNumber ||
        photos.length === 0
    ) {
        return;
    }


    let currentIndex = 0;

    let touchStartX = 0;
    let touchEndX = 0;


    function showPhoto(index) {

        if (index < 0) {
            index = photos.length - 1;
        }

        if (index >= photos.length) {
            index = 0;
        }


        const photo = photos[index];

        const photoImage =
            photo.querySelector('img');


        if (!photoImage) {
            return;
        }


        currentIndex = index;

        image.src = photoImage.src;

        image.alt = photoImage.alt;


        currentNumber.textContent =
            currentIndex + 1;

    }


    function openLightbox(index) {

        showPhoto(index);


        lightbox.classList.add('show');

        lightbox.setAttribute(
            'aria-hidden',
            'false'
        );


        document.body.classList.add(
            'lightbox-open'
        );

    }


    function closeLightbox() {

        lightbox.classList.remove(
            'show'
        );

        lightbox.setAttribute(
            'aria-hidden',
            'true'
        );


        document.body.classList.remove(
            'lightbox-open'
        );


        image.src = '';

    }


    function nextPhoto() {

        showPhoto(
            currentIndex + 1
        );

    }


    function previousPhoto() {

        showPhoto(
            currentIndex - 1
        );

    }


    photos.forEach(function (photo, index) {

        photo.addEventListener(
            'click',
            function () {

                openLightbox(index);

            }
        );

    });


    prevButton.addEventListener(
        'click',
        function (event) {

            event.stopPropagation();

            previousPhoto();

        }
    );


    nextButton.addEventListener(
        'click',
        function (event) {

            event.stopPropagation();

            nextPhoto();

        }
    );


    image.addEventListener(
        'click',
        function (event) {

            event.stopPropagation();

        }
    );


    lightbox.addEventListener(
        'click',
        function (event) {

            if (
                event.target === lightbox
            ) {

                closeLightbox();

            }

        }
    );


    document.addEventListener(
        'keydown',
        function (event) {

            if (
                !lightbox.classList.contains(
                    'show'
                )
            ) {
                return;
            }


            if (
                event.key === 'Escape'
            ) {

                closeLightbox();

            }


            if (
                event.key === 'ArrowRight'
            ) {

                nextPhoto();

            }


            if (
                event.key === 'ArrowLeft'
            ) {

                previousPhoto();

            }

        }
    );


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


            const difference =
                touchStartX - touchEndX;


            if (
                Math.abs(difference) < 50
            ) {
                return;
            }


            if (difference > 0) {

                nextPhoto();

            } else {

                previousPhoto();

            }

        },
        {
            passive: true
        }
    );

});
</script>

@endsection