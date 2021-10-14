@extends('profile.buyevent.buy')

@section('content')

<div class="navbar">
    <div class="container d-flex align-items-center justify-content-center">
        <div class="row">
            <div class="col-4 container-logo d-flex align-items-center">
                <h3>ONEVE</h3>
            </div>
            <div class="col-4 d-flex buton-navbar-container align-items-center">
                <div class="col-6 btn-navbar data-personal d-flex align-items-center justify-content-center ">
                    <p>01 Data Personal</p>
                </div>
                <div class="col-6 btn-navbar checkout d-flex align-items-center justify-content-center active">
                   <p>02 Check Out</p>
                </div>
            </div>
            <div class="col-4">
                
            </div>
        </div>
    </div>
</div>

<form action="{{ route('event.buy.save', ['id' => $event->id]) }}" method="post">
@csrf
<div class="container-fluid content d-flex justify-content-center">
    <div class="row">
        <div class="col-7  wrapper-data-personal">
            <div class="row">
                @foreach ($result_data as $key => $data)
                    {{-- @if ($value > 0) --}}
                    <div class="col-12 data-personal-tiket">
                        <h4>Data Personal - Tiket {{ $loop->iteration }}</h4>
                        @foreach ($data as $item)
                        <div class="row pemesan">
                            {{-- <p>{{ $item['ticket_id'] }}</p> --}}
                            <p class="nomor-pemesan">Pemesan {{ $loop->iteration }} : {{ $event->event_tickets->where('id', $item['ticket_id'])->first()->ticket_name }}</p>
                            <div class="col-7 jawaban-form pertanyaan">
                                <p>Nama</p>
                                <p>Email</p>
                                <p>Nomor Telepon</p>
                            </div>
                            <div class="col-5 jawaban-form jawaban">
                                <p>{{ $item['name'] }}</p>
                                <p>{{ $item['email'] }}</p>

                                <p>{{ $item['phone_number'] }}</p>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>  
                    {{-- @endif --}}
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
               <h4>Online Concert</h4>
            </div>
            <div class="col-5 col d-flex align-items-center justify-content-end">
                <div class="col-6 d-flex justify-content-center">
                    <p>Sub - Total : </p>
                </div>
                <div class="col-6 d-flex justify-content-center">
                    <h4 class="rp">Rp </h4>
                    <input type="text" class="subTotal" value="{{ number_format($total_price, 0, ",", '.') }}" disabled>
                </div>
            </div>
            <div class="col-2 col d-flex justify-content-end" id="button-checkout">
                <a class="btn btn-primary button-beli" id="pay-button">
                  Konfirmasi
                </a>
            </div>
        </div>
    </div>
</div>
</form>

<pre>
    <div id="result-json">JSON Appear here</div>
</pre>
    
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
        <script>
            const a = document.querySelector('#pay-button');
            const buttonCheckout = document.querySelector('#button-checkout');

            function newTag() {
                a.remove();

                const createButton = document.createElement('button');
                createButton.className += 'btn btn-primary button-beli';
                createButton.innerHTML = 'Selesaikan';
                buttonCheckout.appendChild(createButton);
            }

            const payButton = document.querySelector('#pay-button');
            payButton.addEventListener('click', function(e) {
                e.preventDefault(); 
                snap.pay('{{ $snapToken }}', {
                    onSuccess: function(result) { 
                        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                        newTag();
                    },
                    
                    onPending: function(result) {
                        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    },
                    
                    onError: function(result) {
                        document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                    },
                });
            });

            // var payButton = document.getElementById('pay-button');
            // payButton.addEventListener('click', function () {
            //     // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            //     window.snap.pay('{{ $snapToken }}');
            // });

        </script>
    
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('/src/css/pembayaran.css') }}">
@endpush