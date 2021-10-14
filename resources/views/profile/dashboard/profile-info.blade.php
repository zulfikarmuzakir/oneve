@extends('profile.dashboard.dashboard')

@section('content')
@include('profile.dashboard.layouts.sidebar')

<div class="col-9 container-cards">
    <div class="row">
      <form action="{{ route('dashboard.updateProfile', ['id' => $profile->id]) }}" method="POST" enctype="multipart/form-data" class="informasi-akun" id="formInformasiAkun">
        @csrf
        <b><h4 class="judul-informasi-akun">INFORMASI AKUN</h4></b>
        <div class="form-group">
          <div class="input-informasi-akun">
            <input type="text" placeholder="Nama" name="name" class="form-control form-informasi-akun" value="{{ $profile->name }}" id="nama">
            <i class="material-icons-outlined">
                error_outline
            </i>
            <small>Error</small>
          </div>
        </div>
        <div class="form-group">
          <div class="input-informasi-akun">
            <input type="email" placeholder="Email" name="email" class="form-control form-informasi-akun" value="{{ $profile->email }}" id="email">
            <i class="material-icons-outlined">
                error_outline
            </i>
            <small>Error</small>
          </div>
        </div>
        <div class="form-group">
          <div class="input-informasi-akun">
            <input type="text" placeholder="Nomor Telepon" name="phone_number" class="form-control form-informasi-akun" value="{{ ($profile->profile) ? $profile->profile->phone_number : null }}" id="telepon">
            <i class="material-icons-outlined">
                error_outline
            </i>
            <small>Error</small>
          </div>
        </div>
        <div class="form-group">
          <div class="input-informasi-akun">
            <input type="text" placeholder="Nomor NIK" name="nik" class="form-control form-informasi-akun" value="{{ ($profile->profile) ? $profile->profile->nik : null }}" id="nik">
            <i class="material-icons-outlined">
                error_outline
            </i>
            <small>Error</small>
          </div>
        </div>
        <div class="form-group">
          <div class="input-informasi-akun">
            <input type="text" placeholder="Nama Instansi" name="agency_name" class="form-control form-informasi-akun" value="{{ ($profile->profile) ? $profile->profile->agency_name : null }}" id="instansi">
            <i class="material-icons-outlined">
                error_outline
            </i>
            <small>Error</small>
          </div>
        </div>
        <div class="form-group">
          <div class="input-informasi-akun">
            <input type="text" placeholder="Nama Penanggung Jawab" name="person" class="form-control form-informasi-akun" value="{{ ($profile->profile) ? $profile->profile->person : null }}" id="penanggungJawab">
            <i class="material-icons-outlined">
                error_outline
            </i>
            <small>Error</small>
          </div>
        </div>
        <div class="form">
          <div class="grid">
            <div class="form-element">
              <input type="file" id="file-1" name="identity_card" accept="image/*">
              <label for="file-1" id="file-1-preview">  
                @if ($profile->profile)
                  @if ($profile->profile->identity_card != null)
                  <img src="{{ asset('img/profile/'.$profile->profile->identity_card) }}" alt="">
                  @else
                  <img src="{{ asset('img/blank.png') }}" alt="">
                  @endif
                @else
                <img src="{{ asset('img/blank.png') }}" alt="">
                @endif
                <div>
                  <span>+</span>
                </div>
              </label>
              
            </div>
            <label  for="file-1"  class="overlay d-flex flex-column align-items-center justify-content-center">
              <i class="material-icons">add_circle_outline</i>
              <p>Upload Foto KTP</p>
            </label>
          </div>
        </div>
        <div class="form-group d-flex justify-content-end">
          <button type="submit" class="btn btn-simpan-informasi">Simpan</button>
        </div>
      </form>
    </div>
</div>
    
<script>
  // Form Validasi Informasi Akun
  const formInformasiAkun = document.getElementById('formInformasiAkun');
  const nama = document.getElementById('nama');
  const email = document.getElementById('email');
  const telepon = document.getElementById('telepon');
  const nik = document.getElementById('nik');
  const instansi = document.getElementById('instansi');
  const penanggungJawab = document.getElementById('penanggungJawab');

  formInformasiAkun.addEventListener('submit', (e) => {
    e.preventDefault();

    if (checkInputsInformasiAkun()) formInformasiAkun.submit();
  });

  function checkInputsInformasiAkun() {
    // Value dari input
    const namaValue = nama.value;
    const emailValue = email.value.trim();
    const teleponValue = telepon.value.trim();
    const nikValue = nik.value.trim();
    const instansiValue = instansi.value.trim();
    const penanggungValue = penanggungJawab.value.trim();

    let resultInformasi = false;

    if(namaValue === '' ) {
      // error msg
      setErrorFor(nama, 'Wajib mengisi nama anda.');
      resultInformasi = false;
    }else{
      setSuccessFor(nama);
      resultInformasi = true;
    }

    if(emailValue === '' ) {
      // error msg
      setErrorFor(email, 'Wajib mengisi email anda.');
      resultInformasi = false;
    }else{
      setSuccessFor(email);
      resultInformasi = true;
    }

    if(teleponValue === '' ) {
      // error msg
      setErrorFor(telepon, 'Wajib mengisi nomor telepon anda.');
      resultInformasi = false;
    }else{
      setSuccessFor(telepon);
      resultInformasi = true;
    }

    if(nikValue === '' ) {
      // error msg
      setErrorFor(nik, 'Wajib mengisi nomor NIK anda.');
      resultInformasi = false;
    }
    // else if(!isNik(nik)){
    //   setErrorFor(nik, 'NIK minimal 16 karakter.');
      
    // }
    else{
      setSuccessFor(nik);
      resultInformasi = true;
    }

    if(instansiValue === '' ) {
      // error msg
      setErrorFor(instansi, 'Wajib mengisi nama instansi anda.');
      resultInformasi = false;
    }else{
      setSuccessFor(instansi);
      resultInformasi = true;
    }

    if(penanggungValue === '' ) {
      // error msg
      setErrorFor(penanggungJawab, 'Wajib mengisi nama penanggung jawab anda.');
      resultInformasi = false;
    }else{
      setSuccessFor(penanggungJawab);
      resultInformasi = true;
    }
    return resultInformasi;
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

  function isNik(nik){
    return /^[0-9]{16}$/.test(nik);
  }
  
</script>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('/src/css/dasbor.css') }}" >
@endpush
