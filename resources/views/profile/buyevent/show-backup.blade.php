@extends('profile.buyevent.buy')

@section('content')

@include('layouts.navbar')

<div class="container-fluid container-banner">
    <div class="banner">
        <img src="{{ asset($event->banner) }}" alt="" width="100%" height="400">
    </div>
    <div class="container-fluid container-detail-event">
        <div class="row">
            <div class="col-6">
                <div class="row row-detail d-flex flex-column container-detail">
                    <div class="col-12 px">
                        <h3 class="judul-event">{{ $event->event_name }}</h3>
                    </div>
                    <div class="col-12 col-row-4 d-flex align-items-center px">
                        <div class="kategori" id="category">
                            <p>{{ $event->category->name }}</p>
                        </div>
                        <div class="tanggal" id="date">
                            <p>{{ $event->date_start }} - {{ $event->date_end }}</p>
                        </div>
                        <div class="waktu" id="time">
                            <p>{{ $event->time_start }} - {{ $event->time_end }}</p>
                        </div>
                    </div>
                    <div class="col-12 d-flex align-items-center container-profile px">
                        <img src="{{ $user->avatar }}" alt="" class="pp-user">
                        <a href="{{ route('user.profile', ['name' => $user->name]) }}" style="text-decoration: none; color:#212529;"><h3 class="nama-user">{{ $user->name }}</h3></a>    
                    </div>
                </div>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <div class="row">
                    <div class="col-6 container-wishlist event-action">
                        @auth                            
                            @if (Auth::user()->favoritedEvent->where('user_id', Auth::user()->id)->first() == null)
                            <form action="{{ route('user.event.like', ['id' => $event->id]) }}">
                            <button href=""  class="btn-action btn-love">
                                <span class="heart">
                                    <i class="material-icons love">
                                        favorite_border
                                    </i>
                                </span>
                                <span class="numb">{{ $favorited_total }}</span>   
                            </button>
                            </form>
                            @else
                            <form action="{{ route('user.event.not.like', ['id' => Auth::user()->favoritedEvent->where('user_id', Auth::user()->id)->first()->id]) }}">
                            <button href=""  class="btn-action btn-love">
                                <span class="heart">
                                    <i class="material-icons love heart-active">
                                        favorite_border
                                    </i>
                                </span>
                                <span class="numb">{{ $favorited_total }}</span>   
                            </button> 
                            </form>
                            @endif
                        @endauth
                        @guest
                        <button href=""  class="btn-action btn-love">
                            <span class="heart">
                                <i class="material-icons love">
                                    favorite_border
                                </i>
                            </span>
                            <span class="numb">{{ $favorited_total }}</span>   
                        </button>
                        @endguest

                    </div> 
                    
                                                  
                    </div>

                    <div class="col-1 container-share event-action">
                        <input type="hidden" id="copy_{{ $event->id }}" value="localhost:8000/event/{{ $event->id }}">
                        <button class="btn-action clipboard">
                            <span class="material-icons share">
                                insert_link
                                </span>
                        </button>                           
                    </div>

                    {!! $shareComponent !!}

                </div>    
            </div>
        </div>
    </div>
</div>
<form method="POST" action="{{ route('event.createOrderData', ['id' => $event->id]) }}">
    @csrf
    <div class="container-fluid detail-tiket d-flex flex-column justify-content-center">
        <div class="judul-section d-flex">
            <svg class="icon-deskripsi" width="35" height="36" viewBox="0 0 35 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0)">
                <path d="M31.1678 33H3.62416C1.62652 33 0 31.317 0 29.25V26.25C0 25.836 0.324725 25.5 0.724832 25.5H1.44966C3.04864 25.5 4.34899 24.1545 4.34899 22.5C4.34899 20.8455 3.04864 19.5 1.44966 19.5H0.724832C0.324725 19.5 0 19.164 0 18.75V15.75C0 13.683 1.62652 12 3.62416 12H31.1678C33.1654 12 34.7919 13.683 34.7919 15.75V18.75C34.7919 19.164 34.4672 19.5 34.0671 19.5H33.3423C31.7433 19.5 30.443 20.8455 30.443 22.5C30.443 23.301 30.7445 24.054 31.2925 24.621C31.839 25.188 32.5667 25.5 33.3408 25.5H34.0657C34.4658 25.5 34.7905 25.836 34.7905 26.25V29.25C34.7919 31.317 33.1654 33 31.1678 33ZM1.44966 27V29.25C1.44966 30.4905 2.42529 31.5 3.62416 31.5H31.1678C32.3667 31.5 33.3423 30.4905 33.3423 29.25V27H33.3408C32.1797 27 31.0881 26.532 30.2675 25.683C29.4456 24.8325 28.9933 23.7015 28.9933 22.5C28.9933 20.019 30.9445 18 33.3423 18V15.75C33.3423 14.5095 32.3667 13.5 31.1678 13.5H3.62416C2.42529 13.5 1.44966 14.5095 1.44966 15.75V18C3.84741 18 5.79866 20.019 5.79866 22.5C5.79866 24.981 3.84741 27 1.44966 27Z" fill="#3D3D3D" stroke="#3D3D3D"/>
                <path d="M12.3225 15C11.9224 15 11.5977 14.664 11.5977 14.25V12.75C11.5977 12.336 11.9224 12 12.3225 12C12.7226 12 13.0473 12.336 13.0473 12.75V14.25C13.0473 14.664 12.7226 15 12.3225 15Z" fill="#3D3D3D" stroke="#3D3D3D"/>
                <path d="M12.3225 27.6916C11.9224 27.6916 11.5977 27.3556 11.5977 26.9416V24.4051C11.5977 23.9911 11.9224 23.6551 12.3225 23.6551C12.7226 23.6551 13.0473 23.9896 13.0473 24.4051V26.9431C13.0473 27.3571 12.7226 27.6916 12.3225 27.6916ZM12.3225 21.3466C11.9224 21.3466 11.5977 21.0106 11.5977 20.5966V18.0586C11.5977 17.6446 11.9224 17.3086 12.3225 17.3086C12.7226 17.3086 13.0473 17.6446 13.0473 18.0586V20.5966C13.0473 21.0106 12.7226 21.3466 12.3225 21.3466Z" fill="#3D3D3D" stroke="#3D3D3D"/>
                <path d="M12.3225 33C11.9224 33 11.5977 32.664 11.5977 32.25V30.75C11.5977 30.336 11.9224 30 12.3225 30C12.7226 30 13.0473 30.336 13.0473 30.75V32.25C13.0473 32.664 12.7226 33 12.3225 33Z" fill="#3D3D3D" stroke="#3D3D3D"/>
                <path d="M3.62423 13.5C3.32995 13.5 3.05306 13.314 2.94579 13.0125C2.80517 12.624 2.99507 12.192 3.37054 12.048L26.4202 3.14249C27.5408 2.70749 28.8571 3.35848 29.2398 4.52699L31.8535 12.5085C31.9811 12.9015 31.7782 13.326 31.3998 13.4595C31.0243 13.593 30.6097 13.3815 30.4807 12.99L27.867 5.00849C27.7394 4.61849 27.3016 4.40549 26.9261 4.54649L3.87647 13.452C3.79384 13.485 3.70831 13.5 3.62423 13.5Z" fill="#3D3D3D" stroke="#3D3D3D"/>
                </g>
                <defs>
                <clipPath id="clip0">
                <rect width="34.7919" height="36" fill="white"/>
                </clipPath>
                </defs>
                </svg>
            <h3>Tiket Event</h3>                    
        </div>
        <div class="row d-flex row-tiket"></div>
            <div class="col-12 d-flex flex-column container-tiket" id="ticket-list">
                @foreach ($event->event_tickets as $ticket)
                <div class="row tiket" id="show-ticket">
                    <div class="col-6 tiket-details">
                        <div class="col-12 col container-judul-tiket">
                            <h4 class="judul-tiket">{{ $ticket->ticket_name }}</h3>
                        </div>
                        <div class="col-12 col d-flex align-items-center">
                            <div class="col-7 col date-time-tiket">
                                <p>Berakhir pada {{ $ticket->ticket_date_end }}</p>
                            </div>
                            <div class="col-5 col date-time-tiket">
                                <p>{{ $ticket->ticket_time_start }} - {{ $ticket->ticket_time_end }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col tiket-details d-flex align-items-center">
                        <div class="col-8 col d-flex justify-content-end">
                            <h2 class="harga-tiket">Rp {{ number_format($ticket->ticket_price, 0, ",", ".") }}</h2>
                        </div>
                        <div class="col-4 col d-flex justify-content-end align-items-center">
                                <button type="button" id="sub2" onclick="handleDecrement(this, {{ $ticket->ticket_price }})" class="btn btn-count sub ">
                                    <i class="material-icons">
                                        remove_circle_outline
                                        </i>
                                </button>
                                <input type="text" id="2" value="0" class="field" disabled />
                                <input type="hidden" id="ticket-hidden-total" name="ticket_total[]" value="0" class="field" />
                                
                                <button type="button" id="add2" onclick="handleIncrement(this, {{ $ticket->ticket_price }})" class="btn btn-count add">
                                    <i class="material-icons">
                                        add_circle_outline
                                        </i>
                                </button>
                                <input type="hidden" name="ticket_id[]" value="{{ $ticket->id }}" id="">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>        
            </div>
        </div>
      
        <div class="container-fluid container-description detail-tiket d-flex flex-column justify-content-center">
            <div class="judul-section description d-flex">
                <svg width="24" height="30" viewBox="0 0 24 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.59749 21H18.1948V24H6.59749V21ZM6.59749 15H18.1948V18H6.59749V15ZM15.2955 0H3.69816C2.10353 0 0.798828 1.35 0.798828 3V27C0.798828 28.65 2.08903 30 3.68366 30H21.0941C22.6888 30 23.9935 28.65 23.9935 27V9L15.2955 0ZM21.0941 27H3.69816V3H13.8458V10.5H21.0941V27Z" fill="#3D3D3D"/>
                    </svg>                    
                <h3>Deskripsi Event</h3>                    
            </div>
            <div class="container container-deskripsi">
                <p class="deskripsi-event">
                    {{ $event->description }}
                </p>
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
                        <h4 id="subtotal"> 0 </h4>
                        <input type="hidden" id="subtotal-hidden" name="subtotal-hidden" value="0">
                    </div>
                </div>
                <div class="col-2 col d-flex justify-content-end">
                    {{-- @auth --}}
                    <button class="btn btn-primary button-beli">
                        BELI TIKET
                    </button>
                    {{-- @endauth --}}
                    {{-- @guest
                    <a class="btn btn-primary button-beli" data-toggle="modal" data-target="#modal-masuk">
                        BELI TIKET
                    </a>
                    @endguest --}}
                    
                </div>
            </div>
        </div>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
   let $temp = $("<input>"); 
   let $url = $(location).attr('href');
   
   $('.clipboard').on('click', function() {
       $("body").append($temp);
       $temp.val($url).select();
       document.execCommand("copy");
       $temp.remove();
   })
</script>

<script type="text/javascript">
let subtotal = 0;
const subTotalText = document.querySelector('#subtotal'); 
const subTotalTextHidden = document.querySelector('#subtotal-hidden'); 
const ticket = $('#ticket-list').children('#show-ticket').length;
const ticketHiddenTotal = document.querySelector('#ticket-hidden-total').value;

const handleIncrement = (node, price) => {
    const countTrue = +$(node).prev().val();
    const countDisabled = +$(node).prev().prev().val();

    if (ticketHiddenTotal > 4) {
        alert("warning");
    }

    if (countTrue < {{ $event->max_ticket_user }} && countDisabled < 5) {
        subtotal = subtotal + +price;
        subTotalText.innerText = subtotal;
        subTotalTextHidden.value = subtotal;
        $(node).prev().val(countTrue + 1);
        $(node).prev().prev().val(countDisabled + 1);
    }
}

const handleDecrement = (node, price) => {
    const countTrue = +$(node).next().next().val();
    const countDisabled = +$(node).next().val();

    if (countTrue > 0 && countDisabled > 0) {
        subtotal = subtotal - +price;
        subTotalText.innerText = subtotal;
        subTotalTextHidden.value = subtotal;
        $(node).next().next().val(countTrue - 1);
        $(node).next().val(countDisabled - 1);
    }

}

</script>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset("/src/css/ikut-event.css") }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
{{-- <link rel="stylesheet" href="{{ asset('/src/css/home.css') }}"> --}}
<style>
    div#social-links {
        margin: 0 auto;
        max-width: 500px;
    }
    div#social-links ul li {
        display: inline-block;
    }          
    div#social-links ul li a {
        padding: 5px;
        /* border: 1px solid #ccc; */
        margin: 1px;
        font-size: 30px;
        color: #797979;
        /* background-color: #ccc; */
    }
</style>
@endpush