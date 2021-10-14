@extends('profile.dashboard.dashboard')

@section('content')
@include('profile.dashboard.layouts.sidebar')

    <div class="col-9 container-cards">
@if (count($errors))
    @foreach ($errors->all() as $error)
        <p class="alert alert-danger">{{$error}}</p>
    @endforeach
@endif

      @if (session('success'))
        <div class="alert-container">
          <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
            <div class="col-10">
            {{ session('success') }}
            </div>
            <div class="col-2 d-flex justify-content-end">
              <button type="button" class="close-button d-flex" data-dismiss="alert" aria-label="Close">
                <i class="material-icons-outlined">
                  close
                  </i>
              </button>
            </div>    
          </div>
        </div>
      @endif
        

        <form action="{{ route('dashboard.updatePassword', ['id' => $user->id]) }}" method="POST" class="row row-ubahpw d-flex justify-content-center" id="formChangePass">
            @csrf
          <h4>UBAH PASSWORD</h4>
          <div class="form-control form-control-ubahpw d-flex">
            <div class="col-2 d-flex align-items-center">
              <p>Kata sandi lama</p>
            </div>
            <div class="col-10">
              <div class="input-informasi-akun">
                <input type="password" name="current_password" id="oldPassword">
                <i class="material-icons-outlined">
                  error_outline
                </i>
                <small>Error</small>
              </div>
            </div>
          </div>
          <div class="form-control form-control-ubahpw d-flex">
            <div class="col-2 d-flex align-items-center">
              <p>Kata sandi Baru</p>
            </div>
            <div class="col-10">
              <div class="input-informasi-akun">
                <input type="password" name="password" id="newPassword">
                <i class="material-icons-outlined">
                  error_outline
                </i>
                <small>Error</small>
              </div>
            </div>
          </div>
          <div class="form-control form-control-ubahpw d-flex">
            <div class="col-2 d-flex align-items-center">
              <p>Konfirmasi Kata Sandi</p>
            </div>
            <div class="col-10">
              <div class="input-informasi-akun">
                <input type="password" name="password_confirmation" id="newPassword2">
                <i class="material-icons-outlined">
                  error_outline
                </i>
                <small>Error</small>
              </div>
            </div>
          </div>
          <div class="form-control form-control-ubahpw d-flex">
            <div class="col-2 d-flex align-items-center">
       
            </div>
            <div class="col-10 d-flex ubahpw-simpan">
              <div class="col-6 d-flex align-items-center">
                <a href="/account/forgot-password.html" class="lupapw">Lupa Kata Sandi?</a>
              </div>
              <div class="col-6 d-flex justify-content-end">
                <button type="submit" class= "btn-simpan-gantipw">Simpan</button>
              </div>
            </div>
          </div>
        </form>
    </div>

    <script>
      // Form Validasi Informasi Akun
      const formChangePass = document.getElementById('formChangePass');
      const oldPassword = document.getElementById('oldPassword');
      const newPassword = document.getElementById('newPassword');
      const newPassword2 = document.getElementById('newPassword2');
    
      formChangePass.addEventListener('submit', (e) => {
        e.preventDefault();
        // checkInputsChangePass();
    
        if (checkInputsChangePass()) formChangePass.submit();
      });
    
      function checkInputsChangePass() {
        // Value dari input
        const oldPasswordValue = oldPassword.value.trim();
        const newPasswordValue = newPassword.value.trim();
        const newPassword2Value = newPassword2.value.trim();
    
        let resultPassword = false;
    
        if(oldPasswordValue === '' ) {
          // error msg
          setErrorFor(oldPassword, 'Kata Sandi Tidak Boleh Kosong.');
          resultPassword = false;
        }else if(!isRegisterPassword2(oldPasswordValue)){
          setErrorFor(oldPassword, 'Kata sandi minimal 8 karakter.');
          resultPassword = false;
        }else{
          setSuccessFor(oldPassword);
          resultPassword = true;
        }
    
        if(newPasswordValue === '' ) {
          // error msg
          setErrorFor(newPassword, 'Kata Sandi Tidak Boleh Kosong.');
          resultPassword = false;
        }else if(!isRegisterPassword(newPasswordValue)){
          setErrorFor(newPassword, ' ');
          resultPassword = false;
        }else{
          setSuccessFor(newPassword);
          resultPassword = true;
        }
    
        if(newPassword2Value === '' ) {
          // error msg
          setErrorFor(newPassword2, 'Kata Sandi Tidak Boleh Kosong.');
          resultPassword = false;
        }else if(newPasswordValue !== newPassword2Value){
          setErrorFor(newPassword2, 'Kata sandi anda tidak cocok.');
          resultPassword = false;
          setErrorFor(newPassword, ' ');
          resultPassword = false;
        }else if(!isRegisterPassword2(newPassword2Value)){
          setErrorFor(newPassword2, 'Kata sandi minimal 8 karakter.');
          resultPassword = false;
        }else{
          setSuccessFor(newPassword2);
          resultPassword = true;
        }
    
        return resultPassword;
      }
      function setErrorFor(input, message){
        const inputInformasi = input.parentElement;
        const small = inputInformasi.querySelector('small');
    
        small.innerText = message;
    
        inputInformasi.className = 'input-informasi-akun error';
      }
    
      function setSuccessFor(input){
        const inputInformasi = input.parentElement;
    
        inputInformasi.className = 'input-informasi-akun success';
      }
    
      function isRegisterPassword(newPassword){
        return /.{8,}$/.test(newPassword);
      }
      function isRegisterPassword2(newPassword2){
        return /.{8,}$/.test(newPassword2);
      }
      
    </script>
@endsection

@push('styles')
<link rel="stylesheet" href="/src/css/dasbor.css" >
@endpush