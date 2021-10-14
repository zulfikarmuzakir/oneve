@extends('profile.dashboard.dashboard')

@section('content')
@include('profile.dashboard.layouts.sidebar')
<div class="col-9 container-cards">
    <div class="row">
        <div class="col-8 d-flex">
            <a href="{{ route('dashboard.ongoingEvent') }}" class="status d-flex flex-column justify-content-start align-items-center active">
                Sedang Berlangsung
                <div class="garis"></div>
            </a>
            <a href="{{ route('dashboard.endedEvent') }}" class="status d-flex flex-column justify-content-start align-items-center">Event Berlalu</a> 
            <a href="{{ route('dashboard.draftedEvent') }}" class="status d-flex flex-column justify-content-start align-items-center">Event Tersimpan</a>
        </div>
        <div class="col-4 container-search-2">
          <form action="{{ route('dashboard.ongoingEvent') }}" method="GET">
            <input type="text" name="keyword" placeholder="Search" class="form-search-2">
                <button type="submit" class="icon-search-2">
                    <i class="material-icons-outlined">
                        search
                    </i>
                </button>    
            </form> 
        </div>
    </div>
    <div class="row">
            <div class="container-card">
              <div class="row d-flex justify-content-start">  
                @foreach ($list_user_event as $event)
                @if ($event->date_end <= date('Y-m-d'))
                <div class="col-4 con-card col-card d-flex align-items-center justify-content-center">
                    <a href="">
                    <div class="card">
                      <div class="container-gambar">
                        <img class="card-img-top" src="{{ asset($event->banner) }}" alt="Card image cap" width="100%" height="96px">
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
                          {{-- <form action="{{ route('dashboard.draftEvent', ['id' => $event->id]) }}" id="draft-event" method="post"> --}}
                          <a href="{{ route('dashboard.draftEvent', ['id' => $event->id]) }}" class="btn-archive">
                              <i class="material-icons-outlined">
                                  download
                              </i>
                          </a>
                        {{-- </form> --}}
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