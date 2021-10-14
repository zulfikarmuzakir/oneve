@extends('profile.buyevent.buy')

@section('content')
<div class="navbar">
    <div class="container d-flex align-items-center justify-content-center">
        <div class="row">
            <div class="col-4 container-logo d-flex align-items-center">
                <h3>ONEVE</h3>
            </div>
            <div class="col-4 d-flex buton-navbar-container align-items-center">
                <div class="col-6 btn-navbar data-personal d-flex align-items-center justify-content-center active">
                    <p>01 Data Personal</p>
                </div>
                <div class="col-6 btn-navbar checkout d-flex align-items-center justify-content-center">
                   <p>02 Check Out</p>
                </div>
            </div>
            <div class="col-4">
                
            </div>
        </div>
    </div>
</div>

<form action="{{ route('event.checkout', ['id' => $event->id , 'order' => $order->id]) }}" method="GET" id="formPersonaldata">
<div class="container-fluid content d-flex justify-content-center">
    <div class="row">
        <div class="col-7 wrapper-data-personal">
            <div class="row">
                @foreach ($ticket_qty as $key => $value)
                    @if ($value > 0)
                    <div class="col-12 data-personal-tiket">
                        <h4>Data Personal - Tiket {{ $loop->iteration }}</h4>
                        @for ($i = 1; $i <= $value; $i++)
                        <div class="pemesan">
                            <p class="nomor-pemesan">Pemesan {{ $i }} : {{ $event->event_tickets->where('id', $list_ticket_id[$key])->first()->ticket_name }}</p>
                            <input type="hidden" name="ticket_id[]" value="{{ $event->event_tickets->where('id', $list_ticket_id[$key])->first()->id }}">
                            <div class="input-informasi-pemesan d-flex align-items-center">
                                <input type="text" placeholder="Nama" name="name[]" class="form-informasi-pemesan" id="nama">
                                <i class="material-icons-outlined">
                                    error_outline
                                    </i>
                            </div>
                            <div class="input-informasi-pemesan d-flex align-items-center">
                                <input class="form-informasi-pemesan" type="email" name="email[]" placeholder="Email" id="email">
                                <i class="material-icons-outlined">
                                    error_outline
                                    </i>
                            </div>
                              <p class="email-tip">Link zoom akan di kirim ke alamat email ini</p>
                            <div class="input-informasi-pemesan d-flex align-items-center">
                                <input type="number form-informasi-pemesan" placeholder="Nomor Telepon" name="phone_number[]" class="nomor-telepon form-informasi-pemesan" id="telepon">
                                <i class="material-icons-outlined">
                                    error_outline
                                    </i>
                            </div>
                        </div>
                        @endfor
                        
                    </div>
                    @endif
                @endforeach
                
            </div>
        </div>

        @include('profile.buyevent.sidebar')

    </div>
</div>

<div class="sub-total">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-5 col d-flex align-items-center justify-content-start">
               <h4>{{ $event->event_name }}</h4>
            </div>
            <div class="col-5 col d-flex align-items-center justify-content-end">
                <div class="col-6 d-flex justify-content-center">
                    <p>Sub - Total : </p>
                </div>
                <div class="col-6 d-flex justify-content-center">
                    <h4 class="rp">Rp </h4>
                    <input type="text" class="subTotal" value="{{ number_format($total_price, 0, ",", ".") }}" disabled>
                </div>
            </div>
            <div class="col-2 col d-flex justify-content-end">
                <button type="submit" class="btn btn-primary button-beli">
                   Lanjut Checkout
                </button>
            </div>
        </div>
    </div>
</div>
</form>


<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

{{-- <script>
const formPersonaldata = document.getElementById('formPersonaldata');
const nama = document.getElementById('nama');
const email = document.getElementById('email');
const telepon = document.getElementById('telepon');

formPersonaldata.addEventListener('submit', (e) => {
  e.preventDefault();

  if (checkInputsPersonal()) formPersonaldata.submit();
});

function checkInputsPersonal() {
  // Value dari input
  const namaValue = nama.value;
  const emailValue = email.value.trim();
  const teleponValue = telepon.value.trim();

  if(namaValue === '' ) {
    // error msg
    setErrorFor(nama);
  }else{
    setSuccessFor(nama);
  }

  if(emailValue === '' ) {
    // error msg
    setErrorFor(email);
  }else{
    setSuccessFor(email);
  }

  if(teleponValue === '' ) {
    // error msg
    setErrorFor(telepon);
  }else{
    setSuccessFor(telepon);
  }
}
function setErrorFor(input){
  const inputInformasi = input.parentElement;

  inputInformasi.className = 'input-informasi-pemesan error';
}

function setSuccessFor(input){
  const inputInformasi = input.parentElement;

  inputInformasi.className = 'input-informasi-pemesan success';
}
</script> --}}
@endsection

@push('styles')
    <link rel="stylesheet" href="/src/css/pembayaran.css">
@endpush