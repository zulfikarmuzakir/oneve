@extends('profile.buyevent.buy')

@section('content')
<div class="navbar">
    <div class="container d-flex align-items-center justify-content-center">
        <div class="row">
            <div class="col-2 container-logo d-flex align-items-center">
                <h3>ONEVE</h3>
            </div>
            <div class="col-10 d-flex buton-navbar-container align-items-center">
                <div class="col-2 btn-navbar data-personal active d-flex align-items-center justify-content-center">
                    <p>01 Data Personal</p>
                </div>
                <div class="col-2 btn-navbar checkout d-flex align-items-center justify-content-center">
                   <p>02 Check Out</p>
                </div>
                <div class="col-2 btn-navbar pembayaran d-flex align-items-center justify-content-center">
                    <p>03 Pembayaran</p>
                </div>
                <div class="col-2 btn-navbar selesai d-flex align-items-center justify-content-center">
                    <p>04 Selesai</p>
                </div>
            </div>
        </div>
    </div>
</div>

<form action="{{ route('event.checkout', ['id' => $event->id , 'order' => $order->id]) }}" method="get">
@csrf
<div class="container-fluid content d-flex">
    <div class="row">
        <div class="col-7">
            <div class="row">
                
                @foreach ($ticket_qty as $key => $value)
                    @if ($value > 0)
                    <div class="col-12 data-personal-tiket">
                        <h4>Data Personal - Tiket {{ $loop->iteration }}</h4>
                        @for ($i = 1; $i <= $value; $i++)
                        <div class="pemesan">
                            <p class="nomor-pemesan">Pemesan {{ $i }} : {{ $event->event_tickets->where('id', $list_ticket_id[$key])->first()->ticket_name }}</p>
                            <input type="hidden" name="ticket_id[]" value="{{ $event->event_tickets->where('id', $list_ticket_id[$key])->first()->id }}" id="">
                            <input type="text" placeholder="Nama" name="name[]" required>
                            <input type="email" placeholder="Email" name="email[]" required>
                            <p class="email-tip">Link zoom akan di kirim ke alamat email ini</p>
                            <input type="number" placeholder="Nomor Telepon" name="phone_number[]" class="nomor-telepon" required>
                        </div>
                        @endfor  
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
        
        @include('profile.buyevent.sidebar')

        <div class="row d-flex justify-content-center align-items-center">
            <button class="btn btn-primary btn-lanjut">Lanjut Periksa</button>
        </div>
    </div>
</div>
</form>

<footer>
    <div class="container">
      <div class="row">
        <div class="col d-flex align-items-center justify-content-end">
          Copyright ©2021
        </div>
      </div>
    </div>
  </footer>


<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
@endsection

@push('styles')
<link rel="stylesheet" href="/src/css/pembayaran.css">
@endpush