@extends('profile.dashboard.dashboard')

@section('content')
<div class="col-3 sidebar d-flex flex-column">
    <div class="profile-sidebar d-flex flex-column align-items-center justify-content-center">
        <div class="profile-sidebar-image">
            <img src="{{ Auth::user()->avatar }}" width="120px" height="120px" alt="">
            <a href="" class="btn button-action">
                <i class="material-icons">
                    edit
                </i>
            </a>
        </div>
        <h4>{{ Auth::user()->name }}</h4>
    </div>  
    <hr>
    <div class="sidebar-button-container d-flex flex-column">
        <p class="sidebar-title">Dasbor</p>
    <a href="{{ route('dashboard') }}" class="sidebar-button d-flex align-items-center">
        <svg class="rumah" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 12V21.3651C4 21.5335 4.07662 21.695 4.21301 21.814C4.3494 21.9331 4.53439 22 4.72727 22H9.09091V16.6032C9.09091 16.3506 9.20584 16.1083 9.41043 15.9297C9.61501 15.7511 9.89249 15.6508 10.1818 15.6508H13.8182C14.1075 15.6508 14.385 15.7511 14.5896 15.9297C14.7942 16.1083 14.9091 16.3506 14.9091 16.6032V22H19.2727C19.4656 22 19.6506 21.9331 19.787 21.814C19.9234 21.695 20 21.5335 20 21.3651V12" stroke="#797979" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M18.75 8.39053V2.99991H16.5V6.23428M22.5 11.9999L12.5105 2.43741C12.2761 2.18991 11.7281 2.1871 11.4895 2.43741L1.5 11.9999H22.5Z" stroke="#797979" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>      
        Beranda                   
    </a>
    <a href="{{ route('dashboard.ongoingEvent') }}" class="sidebar-button sidebar-active hover d-flex align-items-center">
        <i class="material-icons-outlined">
            event
        </i>
        Event Saya
    </a>
    <a href="tiket-saya-berlangsung.html" class="sidebar-button d-flex align-items-center">
        <ion-icon name="ticket-outline"></ion-icon>     
        Tiket Saya
    </a>
    </div>
    
    <div class="sidebar-button-container d-flex flex-column">
        <p class="sidebar-title">Dasbor Event</p>
        <a href="data-pemesanan.html" class="sidebar-button d-flex align-items-center">
            <i class="material-icons-outlined">
                people
                </i>   
            Data Pemesanan                
        </a>
    </div>

    <div class="sidebar-button-container d-flex flex-column">
        <p class="sidebar-title">Profil</p>
        <a href="{{ route('dashboard.profile', ['id' => Auth::user()->id]) }}" class="sidebar-button d-flex align-items-center">
            <i class="material-icons-outlined">
                account_circle
                </i> 
           Informasi Akun      
        </a>
        <a href="favorit-event-berlangsung.html" class="sidebar-button d-flex align-items-center">
            <i class="material-icons-outlined">
                favorite
                </i>   
            Favorit event          
        </a>
    </div>
</div>
<div class="col-9 container-cards">
    <div class="row">
        <div class="col-8 d-flex">
            <a href="{{ route('dashboard.ongoingEvent') }}" class="status d-flex flex-column justify-content-start align-items-center">
                Sedang Berlangsung
            </a>
            <a href="{{ route('dashboard.endedEvent') }}" class="status d-flex flex-column justify-content-start align-items-center">
              Event Berlalu
            </a> 
            <a href="{{ route('dashboard.draftedEvent') }}" class="status d-flex flex-column justify-content-start align-items-center active">
              Event Tersimpan
              <div class="garis"></div>
            </a>
        </div>
        <div class="col-4 container-search-2">
            <input type="text" placeholder="Search" class="form-search-2">
                <button class="icon-search-2">
                    <i class="material-icons-outlined">
                        search
                    </i>
                </button>     
        </div>
    </div>
    <div class="row">
            <div class="container-card">
              <div class="row d-flex justify-content-start">
                  
                @foreach ($list_user_event as $event)
                    @if ($event->status == 'drafted')
                    <div class="col-4 con-card col-card d-flex align-items-center justify-content-center">
                        <a href="">
                        <div class="card">
                          <div class="container-gambar">
                            <img class="card-img-top" src="/src/img/banner/banner-card/Fashion Modern Living Room Large Area Rugs Abstract Art Oil Painting Pink Golden Carpet Rug Bedroom Bedside Non-Slip Floor Mats.png" alt="Card image cap" width="100%" height="96px">
                          </div>
                          <div class="card-body">
                            <h5 class="card-title">{{ $event->event_name }}</h5>
                            <div class="card-text d-flex">
                              <i class="material-icons">date_range</i>
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
                            <div class="card-button d-flex justify-content-end">
                              <a href="" class="btn-edit">
                                  <i class="material-icons">
                                      edit
                                  </i>
                              </a>
                              <a href="" class="btn-archive">
                                  <i class="material-icons-outlined">
                                      upload
                                  </i>
                              </a>
                            </div>
                          </div>
                        </div>
                        </a>
                      </div>
                    @endif
                @endforeach           
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
    <link rel="stylesheet" href="/src/css/dasbor.css" >
@endpush