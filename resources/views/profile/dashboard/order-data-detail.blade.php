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
<div class="col-9 container-order-data">
    <div class="row row-nama-event">
      <h4>{{ $order->event->event_name }}</h4>
    </div>
    <div class="row informasi-transaksi">
      <h4>Informasi Transaksi</h4>
      <div class="d-flex container-informasi">
        <div class="col-2 table-informasi">
          <p class="table-head">Order ID</p>
          <p class="table-body">{{ $order->order_number }}</p>
        </div>
        <div class="col-2 table-informasi">
          <p class="table-head">Jumlah Harga</p>
          <p class="table-body">Rp. {{ number_format($order->total_price, 0, ",", ".") }}</p>
        </div>
        <div class="col-3 table-informasi">
          <p class="table-head">Metode Pembayaran</p>
          <p class="table-body" style="text-transform: capitalize">{{ $responseBody->payment_type == 'credit_card' ? 'credit card' : $responseBody->payment_type }}</p>
        </div>
        <div class="col-3 table-informasi">
          <p class="table-head">Status Transaksi</p>
          <p class="table-body" style="text-transform: capitalize">{{ $responseBody->transaction_status == 'capture' ? 'success' : $responseBody->transaction_status}}</p>
        </div>
      </div>
    </div>
    <div class="row detail-pesanan-event">
      <div class="col-6">
        <div class="row detail-table-pesanan">
          <h4>Detail Pesanan</h4>
          <div class="d-flex detail-pesanan">
            <div class="col-6 left">
              <p>Order ID</p>
              <p>Metode Pembayaran</p>
              <p>Jumlah Harga</p>
              <p>Transaksi ID</p>
              <p>Time</p>
              <p>Status</p>
            </div>
            <div class="col-6 right">
              <p>{{ $order->order_number }}</p>
              <p style="text-transform: capitalize">{{ $responseBody->payment_type == 'credit_card' ? 'credit card' : $responseBody->payment_type }}</p>
              <p>Rp {{ number_format($order->total_price, 0, ",", ".") }}</p>
              <p>{{ $responseBody->transaction_id }}</p>
              <p>{{ $responseBody->transaction_time }}</p>
              <p>{{ $responseBody->transaction_status == 'capture' ? 'success' : $responseBody->transaction_status}}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="row detail-table-pelanggan">
          <h4>Detail Pelanggan</h4>
          <div class="d-flex detail-pelanggan">
            <div class="col-6 left">
              <p>Nama</p>
              <p>Nomor Telepon</p>
              <p>Email</p>
            </div>
            <div class="col-6 right">
              <p>{{ $order->customer_name }}</p>
              <p>{{ $order->customer_phone_number == null ? 'nothing' : $order->customer_phone_number}}</p>
              <p>{{ $order->customer_email }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row row-table-detail-tiket d-flex justify-content-center">
      <table class="table table-data-pemesanan">
        <div class="export-container">
          <div class="row">
            <div class="col-6">
              <h4>Detail Tiket</h4>
            </div>
            <div class="col-3 px-3">
          
            </div>
            <div class="col-3 px-0">
              
            </div>
          </div>
        </div>
        <thead>
          <tr>
            <th scope="col">ID Pembayaran</th>
            <th scope="col">Tiket</th>
            <th scope="col">Jumlah Pembelian</th>
            <th scope="col">Harga</th>
            <th scope="col">Jumlah Harga</th>
          </tr>
        </thead>
        <tbody>
            <tr>
              <td scope="row">{{ $order->order_number }}</td>
              <td>Day 1 Online Concert</td>
              <td>1</td>
              <td>Rp 260.000</td>
              <td>Rp 260.000</td>
            </tr>
        </tbody>
      </table>
      <div class="row jumlah-pemesan">
        <div class="col-6">
          <p>Total</p>
        </div>
        <div class="col-6 d-flex justify-content-end">
          <p>Rp 260.000</p>
        </div>
      </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="/src/css/dasbor.css" >
@endpush