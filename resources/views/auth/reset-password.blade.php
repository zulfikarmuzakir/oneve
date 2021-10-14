
@extends('layouts.auth')

@section('content')
<div class="navbar">
    <h1 class="logo">ONEVE</h1>
</div>
<x-auth-validation-errors class="mb-4" :errors="$errors" />
<div class="container content d-flex justify-content-center align-items-center">

        <div class="alert-container-fgpw">
          <div class="alert alert-warning alert-dismissible fade show d-flex align-items-center" role="alert">
            <div class="col-10">
                Email anda belum terdaftar.
            </div>
            <div class="col-2 d-flex justify-content-end">
              <button type="button" class="close close-button d-flex" data-bs-dismiss="alert" aria-label="Close">
                <i class="material-icons-outlined">
                  close
                  </i>
              </button>
            </div>    
          </div>
        </div>

    <form class="form" style="width: 18rem;" method="POST" action="{{ route('password.update') }}" id="fgpwForm">
        @csrf
        <h1>PERBARUI KATA SANDI</h1>
        <div class="card-body">
            <p class="card-text">Silakan buat kata sandi baru anda
            </p>
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <input type="hidden" name="email" value="{{ $request->email }}" required />
            <div class="container-form-fgpw d-flex flex-column align-items-start">
                <div class="form-control-akun control-fgpw">
                    <input type="password" placeholder="Password Baru" class="form-fgpw fgpw-password" name="password" id="fgpw1">
                   <span class="material-icons-outlined lambang-error">
                       error_outline
                   </span>
                    <small>Error</small>
                </div>
                <div class="form-control-akun control-fgpw">
                    <input type="password" placeholder="Konfirmasi Password Baru" class="form-fgpw fgpw-password" name="password_confirmation" id="fgpw2">
                    <span class="material-icons-outlined">
                        error_outline
                    </span>
                    <small>Error</small>
                </div>
                <div class="form-control">
                    <button type="submit" class="btn btn-primary d-flex align-items-center justify-content-center btn-kirim">Perbarui</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    // Script Validasi Form Daftar dan Masuk
    const fgpwForm = document.getElementById('fgpwForm');
    const fgpw1 = document.getElementById('fgpw1');
    const fgpw2 = document.getElementById('fgpw2');
  
    fgpwForm.addEventListener('submit', (e) => {
      e.preventDefault();
  
      if (checkInputs()) fgpwForm.submit();
    });
  
    function checkInputs() {
      // Nangkep Value dar input
      const fgpw1Value = fgpw1.value.trim(); 
      const fgpw2Value = fgpw2.value.trim();
  
      let result = false;
  
      if(fgpw1Value === '') {
        // error
        // nambahin error class
        setErrorFor(fgpw1, 'Masukkan kata sandi anda');
        result = false;
      }else if(!isRegisterPassword(fgpw1Value)){
        setErrorFor(fgpw1, ' ');
        result = false;
      }else{
        // success class
        setSuccessFor(fgpw1);
        result = true;
      }
  
      if(fgpw2Value === '') {
        // error
        // nambahin error class
        setErrorFor(fgpw2, 'Masukkan kata sandi anda');
        result = false;
      } else if(fgpw1Value !== fgpw2Value){
        setErrorFor(fgpw2, 'Kata sandi anda tidak cocok.');
        result = false;
        setErrorFor(fgpw1, ' ');
        result = false;
      }else if(!isRegisterPassword2(fgpw2Value)){
        setErrorFor(fgpw2, 'Kata sandi minimal 8 karakter.');
        result = false;
      }else{
        // success class
        setSuccessFor(fgpw2);
        result = true;
      }
      
      return result;
    }
  
    function setErrorFor(input, message) {
      const formControl = input.parentElement;
      const small = formControl.querySelector('small');
  
      // error message
      small.innerText = message;
  
      // error class
      formControl.className = 'form-control-akun error'
    }
  
    function setSuccessFor(input, message) {
      const formControl = input.parentElement;
      formControl.className = 'form-control-akun success'
    }
  
    function isRegisterPassword(fgpw1){
      return /.{8,}$/.test(fgpw1);
    }
    function isRegisterPassword2(fgpw2){
      return /.{8,}$/.test(fgpw2);
    }
  
    function isLoginPassword(loginPassword){
      return /.{8,}$/.test(loginPassword);
    }
  
  </script>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('src/css/forgot-password.css') }}" >
@endpush
        
   