@extends('profile.dashboard.dashboard')

@section('content')
<div class="col-3 sidebar d-flex flex-column">
    <div class="profile-sidebar d-flex flex-column align-items-center justify-content-center">
      <form class="profile-sidebar-image">
        <img id="gambarPp" src="{{ Auth::user()->avatar }}" width="120px" height="120px" alt="">
        <input type="file" accept="image/*" id="uploadPp">
        <label class="btn button-action" for="uploadPp">
          <i class="material-icons">
            edit
        </i>  
        </label>
      </form>
        <h4>{{ Auth::user()->name }}</h4>
    </div>  
    <hr>
    <div class="sidebar-button-container d-flex flex-column">
        <p class="sidebar-title">Dasbor</p>
    <a href="dashbor - beranda.html" class="sidebar-button d-flex align-items-center">
        <svg class="rumah" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 12V21.3651C4 21.5335 4.07662 21.695 4.21301 21.814C4.3494 21.9331 4.53439 22 4.72727 22H9.09091V16.6032C9.09091 16.3506 9.20584 16.1083 9.41043 15.9297C9.61501 15.7511 9.89249 15.6508 10.1818 15.6508H13.8182C14.1075 15.6508 14.385 15.7511 14.5896 15.9297C14.7942 16.1083 14.9091 16.3506 14.9091 16.6032V22H19.2727C19.4656 22 19.6506 21.9331 19.787 21.814C19.9234 21.695 20 21.5335 20 21.3651V12" stroke="#797979" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M18.75 8.39053V2.99991H16.5V6.23428M22.5 11.9999L12.5105 2.43741C12.2761 2.18991 11.7281 2.1871 11.4895 2.43741L1.5 11.9999H22.5Z" stroke="#797979" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>      
        Beranda                   
    </a>
    <a href="event-saya-berlangsung.html" class="sidebar-button hover d-flex align-items-center">
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
        <a href="data-pemesanan.html" class="sidebar-button d-flex align-items-center sidebar-active">
            <i class="material-icons-outlined">
                people
                </i>   
            Data Pemesanan                
        </a>
    </div>

    <div class="sidebar-button-container d-flex flex-column" >
        <p class="sidebar-title">Profil</p>
        <a href="informasi-akun.html" class="sidebar-button d-flex align-items-center">
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
<div class="col-9">
    <div class="row container-select">
        <select class="form-select" aria-label="Default select example">
            @foreach ($events as $event)
                <option selected>{{ $event->event_name }} </option>
            @endforeach
        </select>
    </div>
    <div class="row row-table d-flex justify-content-center">
      <table class="table table-data-pemesanan">
        <div class="export-container">
          <div class="row">
            <div class="col-6">
              <h4>Transaksi</h4>
            </div>
            <div class="col-3 px-3">
              <input type="text" placeholder="Search" class="form-search-2">
                  <button class="icon-search-2">
                      <i class="material-icons-outlined">
                          search
                      </i>
                  </button>  
            </div>
            <div class="col-3 px-0">
              <button class="btn export-laporan d-flex align-items-center">
                <i class="material-icons-outlined">
                  download
                  </i>
                  Laporan Pemesanan
              </button>
            </div>
          </div>
        </div>
        <thead>
          <tr>
            <th scope="col">Pembayaran</th>
            <th scope="col">Tanggal & Waktu</th>
            <th scope="col">ID Pemesanan</th>
            <th scope="col">Nama Pemesanan</th>
            <th scope="col">Jumlah Harga</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          @if ($order->count() > 0)
            @foreach ($order as $data)
            <tr>
              {{-- @if ($data->status_code != '404') --}}
              <td scope="row"><p style="text-transform: capitalize">credit card</p></td>
              <td>{{ $data->created_at }}</td>
              <td>{{ $data->order_number }}</td>
              <td><a href="{{ route('dashboard.orderDataDetail', ['order_id' => $data->id]) }}">{{ $data->customer_name }}</a></td>
              <td>Rp {{ number_format($data->total_price, 0, ",", ".") }}</td>
              <td><p class="settlement" style="text-transform: capitalize">success</p></td>
              {{-- @endif --}}
                
            </tr>
            @endforeach
          
            @else
            <a href="order-data.html">
              <tr>
                <td colspan="6" scope="row" class="empty">
                  <div class="alert alert-success" role="alert">
                    Anda belum memiliki data pemesan
                  </div>
                </td>
              </tr>
            </a>
          @endif
        </tbody>
      </table>
      @if ($order->count() > 0)
        <div class="row jumlah-pemesan">
          <p>Terdapat <span>{{ $order->count() }}</span> pemesan </p>
        </div>
      @endif
      
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="/src/css/dasbor.css" >
@endpush