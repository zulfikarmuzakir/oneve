<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Online</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/src/css/navbar.css">
    @stack('styles')
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nova+Square&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nova+Square&family=Nunito+Sans:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@700&display=swap" rel="stylesheet">
    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"  rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"  rel="stylesheet">
    <!-- JS -->
    <script src="{{asset('resources\js\index.js')}}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    
    @include('layouts.navbar')

    @include('notification-card.auth-failed')

    @yield('content')
    
    
    <footer>
      <div class="container">
        <div class="row">
          <div class="col d-flex align-items-center justify-content-end">
            Copyright ©2021
          </div>
        </div>
      </div>
    </footer>

<script>
  // Script Validasi Form Daftar dan Masuk
  const form = document.getElementById('formRegister');
  const registerNama = document.getElementById('registerNama');
  const registerEmail = document.getElementById('registerEmail');
  const registerPassword = document.getElementById('registerPassword');
  const registerPassword2 = document.getElementById('registerPassword2');

  const formLogin = document.getElementById('formLogin');
  const loginEmail = document.getElementById('loginEmail');
  const loginPassword = document.getElementById('loginPassword');

  form.addEventListener('submit', (e) => {
    e.preventDefault();

    if (checkInputs()) form.submit();
  });

  formLogin.addEventListener('submit', (e) => {
    // e.preventDefault();

    if (checkInputsLogin()) form.submit();
  });

  function checkInputs() {
    // Nangkep Value dar input
    const namaValue = registerNama.value; 
    const emailValue = registerEmail.value.trim();
    const passwordValue = registerPassword.value.trim();
    const password2Value = registerPassword2.value.trim();

    let result = false;

    if(namaValue === '') {
      // error
      // nambahin error class
      setErrorFor(registerNama, 'Masukkan nama anda');
      result = false;
    }else{
      // success class
      setSuccessFor(registerNama);
      result = true;
    }

    if(emailValue === '') {
      // error
      // nambahin error class
      setErrorFor(registerEmail, 'Masukkan email anda');
      result = false;
    }else{
      // success class
      setSuccessFor(registerEmail);
      result = true;
    }

    if(passwordValue === '') {
      // error
      // nambahin error class
      setErrorFor(registerPassword, 'Masukkan kata sandi anda');
      result = false;
    }else if(!isRegisterPassword(passwordValue)){
      setErrorFor(registerPassword, ' ');
      result = false;
    }else{
      // success class
      setSuccessFor(registerPassword);
      result = true;
    }

    if(password2Value === '') {
      // error
      // nambahin error class
      setErrorFor(registerPassword2, 'Masukkan kata sandi anda');
      result = false;
    } else if(passwordValue !== password2Value){
      setErrorFor(registerPassword2, 'Kata sandi anda tidak cocok.');
      result = false;
      setErrorFor(registerPassword, ' ');
      result = false;
    }else if(!isRegisterPassword2(password2Value)){
      setErrorFor(registerPassword2, 'Kata sandi minimal 8 karakter.');
      result = false;
    }else{
      // success class
      setSuccessFor(registerPassword2);
      result = true;
    }
    
    return result;
  }

  function checkInputsLogin() {
    // Nangkep Value dar input
    const emailValue = loginEmail.value.trim(); 
    const passwordValue = loginPassword.value.trim();

    let result = true;

    if(emailValue === '') {
      // error
      // nambahin error class
      setErrorFor(loginEmail, 'Masukkan email anda');
      result = false;
    }else{
      // success class
      setSuccessFor(loginEmail);
      result = true;
    }

    if(passwordValue === '') {
      // error
      // nambahin error class
      setErrorFor(loginPassword, 'Masukkan password anda');
      result = false;
    }else if(!isLoginPassword(passwordValue)){
      setErrorFor(loginPassword, 'Kata sandi minimal 8 karakter.');
      result = false;
    }else{
      // success class
      setSuccessFor(loginPassword);
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



</body>
</html>