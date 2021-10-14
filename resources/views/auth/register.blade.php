@extends('layouts.auth')

@section('register')
<div class="container-fluid">
    <div class="navbar">
        <h1>Logo</h1>
    </div>
</div>
<div class="container-fluid content d-flex justify-content-center align-items-center">
    <div class="form-seller">
        <form method="POST" action="{{ route('register') }}">   
            @csrf
            <b><h4>DAFTAR</h4></b>
            <div class="form-control">
                <input type="text" name="name" placeholder="Nama" class="form-nama-instansi" required autofocus>
            </div>
            <div class="form-control">
                <input type="email" name="email" placeholder="Email" class="form-nama">
            </div>
            <div class="form-control">
                <input type="password" name="password" placeholder="Password" class="form-password" id="myPassword" required>
            </div>
            <div class="form-control">
                <input type="password" name="password_confirmation" placeholder="Ulang Password" class="form-password" id="myPassword" required>
            </div>
            <div class="form-control button-container">
                <button type="submit" class="btn btn-primary">DAFTAR</button>
            </div>
            <div class="form-control">
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
                <p>Sudah Mempunyai Akun? </p>&nbsp;
                <a class="link-daftar" href="{{ route('login') }}">Masuk</a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="src/css/signup-styles.css" >
@endpush