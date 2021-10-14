@extends('profile.dashboard.dashboard')

@section('content')
    @include('profile.dashboard.layouts.sidebar')

    <div class="col-9 container-cards">
        <div class="row">
            <div class="col-8 d-flex">
                <a href="tiket-saya-berlangsung.html" class="status d-flex flex-column justify-content-start align-items-center active">
                    Sedang Berlangsung
                    <div class="garis"></div>
                </a>
                <a href="tiket-saya-berlalu.html" class="status d-flex flex-column justify-content-start align-items-center">
                  Event Berlalu
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
                      @foreach ($event_history as $event)
                      <div class="col-4 con-card col-card d-flex align-items-center justify-content-center">
                        <a href="{{ route('dashboard.history.detail') }}">
                        <div class="card">
                          <div class="container-gambar">
                            <img class="card-img-top" src="{{ $event->event->banner }}" alt="Card image cap" width="100%" height="96px">
                          </div>
                          <div class="card-body">
                            <h5 class="card-title">{{ $event->event->event_name }}</h5>
                            <div class="card-text d-flex">
                              <i class="material-icons">date_range</i>
                              <p>
                                {{ $event->event->date_start }} - {{ $event->event->date_end }}
                              </p>
                            </div>
                            <div class="card-text d-flex align-items-center waktu">
                              <i class="material-icons">schedule</i>
                              <p>                  
                                {{ $event->event->time_start }} - {{ $event->event->time_end }} WIB
                              </p>
                            </div>
                            <div class="card-button d-flex justify-content-end">
                              <p class="dibeli">Dibeli</p>
                            </div>
                          </div>
                        </div>
                        </a>
                      </div>  
                      @endforeach            
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<link rel="stylesheet" href="/src/css/dasbor.css" >

@endpush