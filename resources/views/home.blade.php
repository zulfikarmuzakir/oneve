@extends('layouts.master')

@section('content')
<div class="container-fluid container-caraousel">
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="src/img/banner/Slide 1.png" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="src/img/banner/Slide 2.png" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="src/img/banner/Slide 3.png" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
</div>

<div class="best-seller-container">
<h3>Penjualan Terbaik</h3>
<div class="row">

  @foreach ($events as $event)
  <div class="col-3 d-flex justify-content-center">
    <a href="{{ route('show.event', ['slug' => $event->slug]) }}">
      <div class="card">
        <div class="container-gambar">
          <img class="card-img-top" src="{{ asset($event->banner) }}" alt="Card image cap" width="100%" height="96px">
        </div>
        <div class="card-body">
          <h5 class="card-title">{{ $event->event_name }}</h5>
          <div class="card-text d-flex">
            <i class="material-icons">date_rangex</i>
            <p>
              {{ $event->date_start }} - {{ $event->date_end }}
            </p>
          </div>
          <div class="card-text d-flex align-items-center waktu">
            <i class="material-icons">schedule</i>
            <p>                  
              {{ $event->time_start }} - {{ $event->time_end }} WIB
            </p>
          </div>
          <div class="card-button justify-content-end">
            <p class="mulai-dari text-end">Mulai dari</p>
              <h6 class="harga text-end">Rp {{ number_format($event->event_tickets->where('event_id', $event->id)->sortBy('ticket_price')->first()->ticket_price, 0, ",", ".") }} / orang</h6>
          </div>
        </div>
      </div>
    </a>
  </div>      
  @endforeach
  
</div>
</div>

<div class="container-fluid container-home">
<div class="row">
  <div class="col-4 col">
    <img src="/src/img/banner/banner-ikut-event.svg" alt="">
  </div>
  <div class="col-8 col d-flex flex-column justify-content-center">
    <h4>
      IKUTI EVENT DAN BUAT EVENTMU SEKARANG DENGAN ONEVE
    </h4>
    <p>Mulai dari acara konser musik, webinar dan masih banyak lagi. Disini juga dapat membuat sebuah acara yang anda inginkan</p>
    <div class="container-button-action d-flex justify-content-start">
      <a class="btn btn-primary btn-action-beli">Beli Event</a>
      <a class="btn btn-primary btn-action-buat">Buat Event</a>
    </div>
  </div>
</div>
</div>
<div class="container-fluid fluid-recent">
<div class="recent-event-container">
  <h3>Event Terbaru</h3>
  <div class="row">
    <div class="col-3 d-flex justify-content-center">
      <a href="">
        <div class="card">
          <div class="container-gambar">
            <div class="container-gratis">
              <img class="free" src="/src/img/Free.svg" alt="">
            </div>
            <img class="card-img-top" src="/src/img/banner/banner-card/Nomad Art Print by matadesign.png" alt="Card image cap" width="100%" height="96px">
          </div>
          <div class="card-body">
            <h5 class="card-title">ONLINE WEBINAR</h5>
            <div class="card-text d-flex">
              <i class="material-icons">date_rangex</i>
              <p>
                24 July 2021 - 29 July 2021
              </p>
            </div>
            <div class="card-text d-flex align-items-center waktu">
              <i class="material-icons">schedule</i>
              <p>                  
                10:00 - 14:00 WIB
              </p>
            </div>
            <div class="card-button justify-content-end">
              <p class="mulai-dari text-end">Mulai dari</p>
              <h6 class="harga text-end">Rp 0 / orang</h6>
            </div>
          </div>
        </div>
      </a>
    </div>  
    <div class="col-3 d-flex justify-content-center">
      <a href="">
        <div class="card">
          <div class="container-gambar">
            <div class="container-gratis">
              <img class="free" src="/src/img/Free.svg" alt="">
            </div>
            <img class="card-img-top" src="/src/img/banner/banner-card/phoo.png" alt="Card image cap" width="100%" height="96px">
            <div class="premium d-flex align-items-center">
              <p>
                Premium
              </p>
            </div>
          </div>
          <div class="card-body">
            <h5 class="card-title">DREAM A DREAM LIVE AGAIN</h5>
            <div class="card-text d-flex">
              <i class="material-icons">date_rangex</i>
              <p>
                24 July 2021 - 29 July 2021
              </p>
            </div>
            <div class="card-text d-flex align-items-center waktu">
              <i class="material-icons">schedule</i>
              <p>                  
                10:00 - 14:00 WIB
              </p>
            </div>
            <div class="card-button justify-content-end">
              <p class="mulai-dari text-end">Mulai dari</p>
              <h6 class="harga text-end">Rp 0 / orang</h6>
            </div>
          </div>
        </div>
      </a>   
    </div>  
    <div class="col-3 d-flex justify-content-center">
      <a href="">
        <div class="card">
          <div class="container-gambar">
            <img class="card-img-top" src="/src/img/banner/banner-card/photo 3.png" alt="Card image cap" width="100%" height="96px">
            <div class="premium d-flex align-items-center">
              <p>
                Premium
              </p>
            </div>
          </div>
          <div class="card-body">
            <h5 class="card-title">MARKETING WEBINAR</h5>
            <div class="card-text d-flex">
              <i class="material-icons">date_rangex</i>
              <p>
                24 July 2021 - 29 July 2021
              </p>
            </div>
            <div class="card-text d-flex align-items-center waktu">
              <i class="material-icons">schedule</i>
              <p>                  
                10.00 - 14.00 WIB
              </p>
            </div>
            <div class="card-button justify-content-end">
              <p class="mulai-dari text-end">Mulai dari</p>
              <h6 class="harga text-end">Rp 90.000 / orang</h6>
            </div>
          </div>
        </div>
      </a>
    </div>  
    <div class="col-3 d-flex justify-content-center">
      <a href="">
        <div class="card">
          <div class="container-gratis">
            <img class="free" src="/src/img/Free.svg" alt="">
          </div>
          <img class="card-img-top" src="/src/img/banner/banner-card/Photo1 1.png" alt="Card image cap" width="100%" height="96px">
          <div class="card-body">
            <h5 class="card-title">MARKETING WEBINAR</h5>
            <div class="card-text d-flex">
              <i class="material-icons">date_rangex</i>
              <p>
                24 July 2021 - 29 July 2021
              </p>
            </div>
            <div class="card-text d-flex align-items-center waktu">
              <i class="material-icons">schedule</i>
              <p>                  
                10.00 - 14.00 WIB
              </p>
            </div>
            <div class="card-button justify-content-end">
              <p class="mulai-dari text-end">Mulai dari</p>
              <h6 class="harga text-end">Rp 0 / orang</h6>
            </div>
          </div>
        </div>
      </a>
    </div>  
    <div class="col-3 d-flex justify-content-center">
      <a href="">
        <div class="card">
          <div class="container-gambar">
            <img class="card-img-top" src="/src/img/banner/banner-card/photo2 2.png" alt="Card image cap" width="100%" height="96px">
          </div>
          <div class="card-body">
            <h5 class="card-title">ONLINE WEBINAR</h5>
            <div class="card-text d-flex">
              <i class="material-icons">date_rangex</i>
              <p>
                24 July 2021 - 29 July 2021
              </p>
            </div>
            <div class="card-text d-flex align-items-center waktu">
              <i class="material-icons">schedule</i>
              <p>                  
                10.00 - 14.00 WIB
              </p>
            </div>
            <div class="card-button justify-content-end">
              <p class="mulai-dari text-end">Mulai dari</p>
              <h6 class="harga text-end">Rp 90.000 / orang</h6>
            </div>
          </div>
        </div>
      </a>
    </div>  
    <div class="col-3 d-flex justify-content-center">
      <a href="">
        <div class="card">
          <div class="container-gambar">
            <img class="card-img-top" src="/src/img/banner/banner-card/photo90.png" alt="Card image cap" width="100%" height="96px">
            <div class="premium d-flex align-items-center">
              <p>
                Premium
              </p>
            </div>
          </div>
          <div class="card-body">
            <h5 class="card-title">DREAM A DREAM LIVE AGAIN</h5>
            <div class="card-text d-flex">
              <i class="material-icons">date_rangex</i>
              <p>
                24 July 2021 - 29 July 2021
              </p>
            </div>
            <div class="card-text d-flex align-items-center waktu">
              <i class="material-icons">schedule</i>
              <p>                  
                10.00 - 14.00 WIB
              </p>
            </div>
            <div class="card-button justify-content-end">
              <p class="mulai-dari text-end">Mulai dari</p>
              <h6 class="harga text-end">Rp 90.000 / orang</h6>
            </div>
          </div>
        </div>
      </a>
    </div>  
    <div class="col-3 d-flex justify-content-center">
      <a href="">
        <div class="card">
          <div class="container-gambar">
            <img class="card-img-top" src="/src/img/banner/banner-card/Pink Wallpapers For iPhone Background.png" alt="Card image cap" width="100%" height="96px">
            <div class="premium d-flex align-items-center">
              <p>
                Premium
              </p>
            </div>
          </div>
          <div class="card-body">
            <h5 class="card-title">MARKETING WEBINAR</h5>
            <div class="card-text d-flex">
              <i class="material-icons">date_rangex</i>
              <p>
                24 July 2021 - 29 July 2021
              </p>
            </div>
            <div class="card-text d-flex align-items-center waktu">
              <i class="material-icons">schedule</i>
              <p>                  
                10.00 - 14.00 WIB
              </p>
            </div>
            <div class="card-button justify-content-end">
              <p class="mulai-dari text-end">Mulai dari</p>
              <h6 class="harga text-end">Rp 90.000 / orang</h6>
            </div>
          </div>
        </div>
      </a> 
    </div>  
    <div class="col-3 d-flex justify-content-center">
      <a href="">
        <div class="card">
          <img class="card-img-top" src="/src/img/banner/banner-card/Women's Lulus Tranquil State Tie Dye Satin Midi Dress, Size Medium - Purple.png" alt="Card image cap" width="100%" height="96px">
          <div class="card-body">
            <h5 class="card-title">MARKETING WEBINAR</h5>
            <div class="card-text d-flex">
              <i class="material-icons">date_rangex</i>
              <p>
                24 July 2021 - 29 July 2021
              </p>
            </div>
            <div class="card-text d-flex align-items-center waktu">
              <i class="material-icons">schedule</i>
              <p>                  
                10.00 - 14.00 WIB
              </p>
            </div>
            <div class="card-button justify-content-end">
              <p class="mulai-dari text-end">Mulai dari</p>
              <h6 class="harga text-end">Rp 90.000 / orang</h6>
            </div>
          </div>
        </div>
      </a>
    </div>  
  </div>
</div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset("/src/css/home.css") }}" >
@endpush