@extends('layouts.auth')

@section('content')
<div class="row">
    <div class="col-5 col-left">
        <div class="logo">
            <h1>Logo</h1>
        </div>
        <div class="container">
            <img src="{{ asset('/src/img/kids-studying-from-home-animate (1).svg') }}" class="illustrasi"/>
        </div>
    </div>
    <div class="col-7 col-right d-flex align-items-center">
        <div class="form">
            <form method="POST" action="{{ route('login') }}">   
                @csrf
                <h4>MASUK</h4>
                <div class="form-control">
                    <input type="email" name="email" placeholder="Email" class="form-email" required autofocus>
                </div>
                <div class="form-control">
                    <input type="password" name="password" placeholder="Password" class="form-password" required>
                </div>
                @if (Route::has('password.request'))
                    <a class="link-password" href="{{ route('password.request') }}">
                        {{ __('Lupa Password?') }}
                    </a>
                @endif

                {{-- <a class="link-password" href="forgot-password.html">Lupa Password?</a> --}}
                <div class="form-control">
                    <button type="submit" class="btn btn-primary">MASUK</button>
                </div>
                <div class="form-control atau-menggunakan">
                    <div class="d-flex justify-content-center">
                        <div class="col-3"><hr></div>
                        <div class="col-6 d-flex align-items-center justify-content-center">
                            <p>Atau Menggunakan</p>
                        </div>
                        <div class="col-3"><hr></div>
                    </div>
                </div>
            </form>
            <form action="{{ route('google.login') }}">
                <div class="form-control">
                    <button class="btn btn-google">
                        <img src="{{ asset('/src/img/google.png') }}" width="17px" height="18px"/>
                        Akun Google
                    </button>
                </div>
                <div class="form-control daftar d-flex justify-content-center align-items-center">
                    <p>Belum Mempunyai Akun? </p>&nbsp;
                    <a class="link-daftar" href="{{ route('register') }}">Daftar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="src/css/login-styles.css" >
@endpush