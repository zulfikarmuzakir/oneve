<div class="col-3 sidebar d-flex flex-column">
    <div class="profile-sidebar d-flex flex-column align-items-center justify-content-center">
        <div class="profile-sidebar-image">
            <img src="{{ Auth::user()->avatar }}" width="120px" height="120px" alt="">
            @if (Request::is('dashboard/profile'))
            <a href="" class="btn button-action">
                <i class="material-icons">
                    edit
                </i>
            </a>
            @endif
        </div>
        <h4 class="nama-user-sidebar">{{ Auth::user()->name }}</h4>
    </div>  
    <hr>
    <div class="sidebar-button-container d-flex flex-column">
        <p class="sidebar-title">Dasbor</p>
    <a href="{{ route('dashboard') }}" class="sidebar-button d-flex align-items-center {{ Request::is('dashboard') ? 'sidebar-active' : '' }}">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 12V21.3651C4 21.5335 4.07662 21.695 4.21301 21.814C4.3494 21.9331 4.53439 22 4.72727 22H9.09091V16.6032C9.09091 16.3506 9.20584 16.1083 9.41043 15.9297C9.61501 15.7511 9.89249 15.6508 10.1818 15.6508H13.8182C14.1075 15.6508 14.385 15.7511 14.5896 15.9297C14.7942 16.1083 14.9091 16.3506 14.9091 16.6032V22H19.2727C19.4656 22 19.6506 21.9331 19.787 21.814C19.9234 21.695 20 21.5335 20 21.3651V12" stroke="{{ Request::is('dashboard') ? 'white' : '#797979' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M18.75 8.39053V2.99991H16.5V6.23428M22.5 11.9999L12.5105 2.43741C12.2761 2.18991 11.7281 2.1871 11.4895 2.43741L1.5 11.9999H22.5Z" stroke="{{ Request::is('dashboard') ? 'white' : '#797979' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>               
        Beranda                   
    </a>
    <a href="{{ route('dashboard.ongoingEvent') }}" class="sidebar-button hover d-flex align-items-center {{ Request::is('dashboard/event/ongoing') ? 'sidebar-active' : '' }}">
        <i class="material-icons-outlined">
            event
        </i>
        Event Saya
    </a>
    <a href="tiket-saya-berlangsung.html" class="sidebar-button d-flex align-items-center">
        <ion-icon name="ticket-outline"></ion-icon>     
        Tiket Event Dibeli
    </a>
    </div>
    
    <div class="sidebar-button-container d-flex flex-column">
        <p class="sidebar-title">Dasbor Event</p>
        <a href="" class="sidebar-button d-flex align-items-center">
            <i class="material-icons-outlined">
                people
                </i>   
            Data Pemesanan                
        </a>
    </div>

    <div class="sidebar-button-container d-flex flex-column" >
        <p class="sidebar-title">Profil</p>
        <a href="{{ route('dashboard.profile') }}" class="sidebar-button d-flex align-items-center {{ Request::is('dashboard/profile') ? 'sidebar-active' : '' }}">
            <i class="material-icons-outlined">
                account_circle
                </i> 
           Informasi Akun      
        </a>
        <a href="{{ route('dashboard.changePassword') }}" class="sidebar-button d-flex align-items-center {{ Request::is('dashboard/change_password') ? 'sidebar-active' : '' }}">
            <i class="material-icons-outlined">
              password
              </i>
              Ubah Password     
          </a>
        <a href="{{ route('dashboard.favoritedEvent') }}" class="sidebar-button d-flex align-items-center {{ Request::is('dashboard/event/favorited') ? 'sidebar-active' : '' }}">
            <i class="material-icons-outlined">
                favorite
                </i>   
            Favorit event          
        </a>
    </div>
</div>