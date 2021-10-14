@extends('profile.buyevent.buy')

@section('content')
<div class="navbar">
    <div class="container d-flex align-items-center justify-content-center">
        <div class="row">
            <div class="col-2 container-logo d-flex align-items-center">
                <h3>Logo</h3>
            </div>
            <div class="col-10 d-flex buton-navbar-container align-items-center">
                <div class="col-2 btn-navbar data-personal d-flex align-items-center justify-content-center ">
                    <p>01 Data Personal</p>
                </div>
                <div class="col-2 btn-navbar checkout d-flex align-items-center justify-content-center active">
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

<form action="{{ route('event.buy.save', ['id' => $event->id]) }}" method="post">
@csrf
<div class="container-fluid content d-flex">
    <div class="row">
        <div class="col-7">
            <div class="row">
                @foreach ($ticket_qty as $key => $value)
                    @if ($value > 0)
                    <div class="col-12 data-personal-tiket">
                        <h4>Data Personal - Tiket {{ $loop->iteration }}</h4>
                        @for ($a = 1; $a <= $value; $a++)
                        <div class="row pemesan">
                            <p class="nomor-pemesan">Pemesan {{ $a }} : {{ $event->event_tickets->where('id', $list_ticket_id[$key])->first()->ticket_name }}</p>
                            <div class="col-7 jawaban-form pertanyaan">
                                <p>Nama</p>
                                <p>Email</p>
                                <p>Nomor Telepon</p>
                            </div>

                            @if ($list_ticket_id[$key] < 2)
                            <div class="col-5 jawaban-form jawaban">
                                <p>{{ $name[$a-1] }}</p>
                                <p>{{ $email[$a-1] }}</p>
                                <p>{{ $phone_number[$a-1] }}</p>
                            </div>     
                            @endif
                            @if ($list_ticket_id[$key] > 1)
                            <div class="col-5 jawaban-form jawaban">
                                <p>{{ $name[$a+1] }}</p>
                                <p>{{ $email[$a+1] }}</p>
                                <p>{{ $phone_number[$a+1] }}</p>
                            </div>    
                            @endif   
                        </div>
                        @endfor
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
       
        @include('profile.buyevent.sidebar')

        <div class="row d-flex justify-content-center align-items-center">
            <button class="btn btn-primary btn-lanjut" id="pay-button">konfirmasi</button>
        </div>
    </div>
</div>
</form>

<pre>
<div id="result-json">JSON Appear here</div>
</pre>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    <script>
        const payButton = document.querySelector('#pay-button');
        payButton.addEventListener('click', function(e) {
            e.preventDefault(); 
 
            snap.pay('{{ $snapToken }}', {
                
                onSuccess: function(result) { 
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    // var event_id = $(this).data('row-abbreviation');
                    // var base = '{!! route('dashboard') !!}';
                    // var url = "{{ route('dashboard') }}";
                    // window.location.href=url;
                },
                
                onPending: function(result) {
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                
                onError: function(result) {
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
            });
        });
    </script>

<footer>
    <div class="container">
      <div class="row">
        <div class="col d-flex align-items-center justify-content-end">
          Copyright ©2021
        </div>
      </div>
    </div>
</footer>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('/src/css/pembayaran.css') }}">
@endpush