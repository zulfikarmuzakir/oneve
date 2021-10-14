@extends('layouts.auth')

@section('register')
<div class="container-fluid">
    <div class="navbar">
        <h1>Logo</h1>
    </div>
</div>
<div class="container-fluid content d-flex justify-content-center align-items-center">
    <div class="form-seller">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h4>DAFTAR SELLER</h4>
            <input type="hidden" name="role" value="seller">
            <div class="form-control">
                <input type="text" placeholder="Nama Instansi" name="nama_instansi" class="form-nama-instansi" required>
            </div>
            <div class="form-control">
                <input type="text" placeholder="Nama Penanggung Jawab" name="name" class="form-nama" required>
            </div>
            <div class="form-control">
                <input type="email" placeholder="Email" name="email" class="form-email" required>
            </div>
            <div class="form-control">
                <input type="password" placeholder="Password" name="password" class="form-password" required>
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
                <input type="hidden" name="role" value="seller">
                <button class="btn btn-google">
                    <img src="{{ asset('/src/img/google.png') }}" width="17px" height="18px"/>
                    Akun Google
                </button>
            </div>
            <div class="form-control daftar d-flex justify-content-center align-items-center">
                <p>Sudah Mempunyai Akun? </p>&nbsp;
                <a class="link-daftar" href="{{ route('login.seller') }}">Masuk</a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('src/css/signup-styles.css') }}" >
@endpush