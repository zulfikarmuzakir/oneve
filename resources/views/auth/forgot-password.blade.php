@extends('layouts.auth')

@section('content')
<div class="navbar">
    <h1>ONEVE</h1>
</div>
<div class="container content d-flex justify-content-center align-items-center">
      <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
     <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <form class="form" style="width: 18rem;" method="POST" action="{{ route('password.email') }}" id="formFgpw">
        @csrf
        <h1>LUPA KATA SANDI</h1>
                <div class="card-body">
                    <p class="fgpw-text">Masukkan email Anda dan kami akan mengirimkan Anda
                        tautan kembali ke akun Anda.
                    </p>

                    <div class="container-form-fgpw d-flex flex-column align-items-start">
                        <div class="form-control form-control-akun">
                            <input type="email" placeholder="Email" name="email" class="form-fgpw " id="emailFgpw">
                            <span class="material-icons-outlined">
                            error_outline
                            </span>
                            <small>Error</small>
                        </div>
                    </div>
                    
                    <div class="form-control form-control-fgpw">
                        <button type="submit" class="btn btn-submit-fgpw btn-primary d-flex align-items-center justify-content-center">KIRIM</button>
                    </div>
                </div>
    </form>
</div>

<script>
    // Script Validasi Form Daftar dan Masuk
    const formFgpw = document.getElementById('formFgpw');
    const emailFgpw = document.getElementById('emailFgpw');
  
    formFgpw.addEventListener('submit', (e) => {
      e.preventDefault();
  
      if (checkInputs()) formFgpw.submit();
    });
  
    function checkInputs() {
      // Nangkep Value dar input
      const emailFgpwValue = emailFgpw.value.trim(); 
  
      let result = false;
  
      if(emailFgpwValue === '') {
        // error
        // nambahin error class
        setErrorFor(emailFgpw, 'Masukkan email anda');
        result = false;
      }else{
        // success class
        setSuccessFor(emailFgpw);
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
  
    function isRegisterPassword(registerPassword){
      return /.{8,}$/.test(registerPassword);
    }
    function isRegisterPassword2(registerPassword2){
      return /.{8,}$/.test(registerPassword2);
    }
  
    function isLoginPassword(loginPassword){
      return /.{8,}$/.test(loginPassword);
    }
  
  </script>
@endsection
       
@push('styles')
<link rel="stylesheet" href="{{ asset('src/css/forgot-password.css') }}" >
@endpush