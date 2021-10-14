@extends('layouts.auth')

@section('content')
<div class="navbar">
    <h1>ONEVE</h1>
</div>
<div class="container content d-flex justify-content-center align-items-center">
    <form class="form" style="width: 18rem;">
        <h1>TAUTAN TERKIRIM</h1>
        <div class="card-body">
            <p class="card-text">Kami telah mengirimkan link ke email 
                kamu untuk perubahan password.
            </p>
            <div class="form-control">
                <a href="{{ route('login') }}" class="btn btn-primary btn-kembali d-flex align-items-center justify-content-center">KEMBALI</a>
            </div>
        </div>
    </form>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('src/css/forgot-password.css') }}" >
@endpush
        