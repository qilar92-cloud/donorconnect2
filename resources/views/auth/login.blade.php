@extends('layouts.auth')

@section('title', 'Login - DonorConnect')

@section('content')
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-6 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">

                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="p-5">

                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">
                                        Selamat Datang di DonorConnect!
                                    </h1>
                                </div>

                                <form method="POST" action="{{ route('login') }}" class="user">
                                    @csrf

                                    <div class="form-group">
                                        <input
                                            type="email"
                                            name="email"
                                            id="email"
                                            class="form-control form-control-user @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}"
                                            placeholder="Masukkan Email..."
                                            required
                                        >

                                        @error('email')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input
                                            type="password"
                                            name="password"
                                            id="password"
                                            class="form-control form-control-user @error('password') is-invalid @enderror"
                                            placeholder="Masukkan Password..."
                                            required
                                        >

                                        @error('password')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        <span class="fa fa-sign-in-alt"></span>
                                        Login
                                    </button>

                                </form>

                                <hr>

                                <div class="text-center">
                                    <a class="small" href="{{ route('register') }}">
                                        Belum punya akun? Daftar sekarang!
                                    </a>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

</div>
@endsection