@extends('layouts.app')

@section('title', 'Pendaftaran Donor - DonorConnect')

@section('content')

<div class="donor-page">

    <div class="page-heading">

        <div>
            <h1>Form Pendaftaran Donor</h1>

            <p>
                Lengkapi pendaftaran untuk mengikuti kegiatan donor.
            </p>
        </div>

    </div>


    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <div class="form-card">

        <div class="form-header">

            <div class="header-icon">
                <i class="fas fa-tint"></i>
            </div>

            <div>
                <h2>Pendaftaran Donor</h2>

                <span>
                    Silakan periksa informasi kegiatan sebelum mendaftar.
                </span>
            </div>

        </div>


        <div class="form-body">

            <form action="{{ route('pendaftaran-donor.store') }}"
                  method="POST">

                @csrf

                <input type="hidden"
                       name="id_kegiatan"
                       value="{{ $kegiatan->id_kegiatan }}">


                <div class="form-group">

                    <label>Kegiatan Donor</label>

                    <input type="text"
                           class="form-control"
                           value="{{ $kegiatan->nama_kegiatan }}"
                           readonly>

                </div>


                <div class="form-group">

                    <label>Tanggal</label>

                    <input type="text"
                           class="form-control"
                           value="{{ $kegiatan->tanggal->format('d M Y') }}"
                           readonly>

                </div>


                <div class="form-group">

                    <label>Waktu</label>

                    <input type="text"
                           class="form-control"
                           value="{{ $kegiatan->waktu }}"
                           readonly>

                </div>


                <div class="form-group">

                    <label>Lokasi</label>

                    <input type="text"
                           class="form-control"
                           value="{{ $kegiatan->lokasi }}"
                           readonly>

                </div>


                <div class="form-group">

                    <label>Catatan</label>

                    <textarea name="catatan"
                              class="form-control"
                              rows="3"
                              placeholder="Tulis catatan (opsional)..."></textarea>

                </div>


                <div class="form-footer">

                    <a href="{{ route('pendonor.kegiatan.show', $kegiatan->id_kegiatan) }}"
                       class="btn-back">

                        <i class="fas fa-arrow-left"></i>

                        Batal

                    </a>


                    <button type="submit"
                            class="btn-submit">

                        <i class="fas fa-check mr-1"></i>

                        Daftar Sekarang

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


@push('styles')

<style>

.donor-page {
    width: 100%;
    min-height: calc(100vh - 80px);
    padding: 25px 28px 35px;
    background: #fffafa;
}

.page-heading {
    margin-bottom: 20px;
}

.page-heading h1 {
    margin: 0 0 5px;
    color: #292733;
    font-size: 30px;
    font-weight: 800;
}

.page-heading p {
    margin: 0;
    color: #8a8588;
    font-size: 13px;
}

.form-card {
    width: 100%;
    max-width: 900px;
    margin: 0 auto;
    background: #ffffff;
    border: 1px solid #f1e0e2;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(217, 30, 54, 0.05);
    overflow: hidden;
}

.form-header {
    padding: 22px 25px;
    display: flex;
    align-items: center;
    gap: 15px;
    border-bottom: 1px solid #f3e1e2;
}

.header-icon {
    width: 48px;
    height: 48px;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #fff0f1;
    color: #d91e36;
    border-radius: 11px;
    font-size: 18px;
}

.form-header h2 {
    margin: 0 0 4px;
    color: #302e38;
    font-size: 18px;
    font-weight: 800;
}

.form-header span {
    color: #999195;
    font-size: 10px;
}

.form-body {
    padding: 25px;
}

.form-group {
    margin-bottom: 18px;
}

.form-group label {
    display: block;
    margin-bottom: 7px;
    color: #4e4950;
    font-size: 12px;
    font-weight: 700;
}

.form-control {
    width: 100%;
    min-height: 40px;
    padding: 9px 12px;
    border: 1px solid #eadfe1;
    border-radius: 7px;
    background: #ffffff;
    color: #302e38;
    font-size: 12px;
    outline: none;
}

.form-control:focus {
    border-color: #d91e36;
    box-shadow: 0 0 0 2px rgba(217, 30, 54, 0.08);
}

.form-control[readonly] {
    background: #f9f6f6;
    color: #5e585c;
}

textarea.form-control {
    resize: vertical;
}

.form-footer {
    margin-top: 25px;
    padding-top: 18px;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    gap: 10px;
    border-top: 1px solid #f3e5e6;
}

.btn-back,
.btn-submit {
    min-height: 38px;
    padding: 9px 17px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    border-radius: 7px;
    font-size: 11px;
    font-weight: 700;
    text-decoration: none !important;
    cursor: pointer;
}

.btn-back {
    background: #ffffff;
    border: 1px solid #ded7d8;
    color: #666064 !important;
}

.btn-back:hover {
    background: #f5f3f3;
    color: #444044 !important;
}

.btn-submit {
    border: none;
    background: #d91e36;
    color: #ffffff;
}

.btn-submit:hover {
    background: #c7182f;
    color: #ffffff;
}

.alert {
    max-width: 900px;
    margin: 0 auto 20px;
    font-size: 12px;
    border-radius: 8px;
}

@media (max-width: 768px) {

    .donor-page {
        padding: 20px 15px 30px;
    }

    .page-heading h1 {
        font-size: 25px;
    }

    .form-header {
        padding: 20px;
    }

    .form-body {
        padding: 20px;
    }

    .form-footer {
        justify-content: stretch;
    }

    .btn-back,
    .btn-submit {
        flex: 1;
    }

}

@media (max-width: 480px) {

    .donor-page {
        padding: 18px 12px 25px;
    }

    .page-heading h1 {
        font-size: 22px;
    }

    .form-header h2 {
        font-size: 15px;
    }

    .form-footer {
        flex-direction: column-reverse;
    }

    .btn-back,
    .btn-submit {
        width: 100%;
    }

}

</style>

@endpush

@endsection