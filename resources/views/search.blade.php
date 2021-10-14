@extends('layouts.master')

@section('content') 
<div class="container-fluid container-judul">
  <div class="row">
    <div class="col-3 sidebar">
      <form action="">
        <h4>Filter</h4>
        <div class="sidenav">
          <a class="btn dropdown-btn" data-toggle="collapse" href="#kategori">Kategori
            <i class="fa fa-caret-down"></i>
          </a>
          <div class="dropdown-container" id="kategori">
            @foreach ($categories as $category)
            <div class="form-check">
              {{-- @dd(collect(@explode("," , request('categories')))) --}}
              {{-- @dd(request('categories')) --}}
              <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id }}" id="{{ $category->label }}" {{ strpos(request('categories'), strval($category->id)) !== false ? 'checked' : '' }}>
              <label class="form-check-label" for="{{ $category->label }}">
                {{ $category->name }}
              </label>
            </div> 
            @endforeach 
            
            {{-- <div class="form-check">
              <input class="form-check-input" type="checkbox" name="category[]" value="1" id="konser" checked>
              <label class="form-check-label" for="konser">
                Konser
              </label>
            </div>  --}}
          </div>
          <a class="btn dropdown-btn" data-toggle="collapse" href="#waktu">Waktu
            <i class="fa fa-caret-down"></i>
          </a>
          <div class="dropdown-container" id="waktu">
            <div class="form-radio">
              <input type="radio" class="btn-check" onclick="searchTime(this.value)" value="?time=today" name="options" id="hari-ini" autocomplete="off" >
              <label class="btn btn-option" for="hari-ini">Hari Ini</label>
            </div>
            <div class="form-radio">
              <input type="radio" class="btn-check" onclick="searchTime(this.value)" value="?time=tomorrow" name="options" id="besok" autocomplete="off" >
              <label class="btn btn-option" for="besok">Besok</label>
            </div>
            <div class="form-radio">
              <input type="radio" class="btn-check" onclick="searchTime(this.value)" value="?time=endofweek" name="options" id="akhir-pekan" autocomplete="off" >
              <label class="btn btn-option" for="akhir-pekan">Akhir Pekan</label>
            </div> 
            <div class="form-radio">
              <input type="radio" class="btn-check" onclick="searchTime(this.value)" value="?time=thisweek" name="options" id="minggu-ini" autocomplete="off" >
              <label class="btn btn-option" for="minggu-ini">Minggu Ini</label>
            </div>
            <div class="form-radio">
              <input type="radio" class="btn-check" onclick="searchTime(this.value)" value="?time=nextweek" name="options" id="minggu-depan" autocomplete="off">
              <label class="btn btn-option" for="minggu-depan">Minggu Depan</label>
            </div>
            <div class="form-radio">
              <input type="radio" class="btn-check" onclick="searchTime(this.value)" value="?time=thismonth" name="options" id="bulan-ini" autocomplete="off">
              <label class="btn btn-option" for="bulan-ini">Bulan Ini</label>
            </div> 
            <div class="form-radio">
              <input type="radio" class="btn-check" onclick="searchTime(this.value)" value="?time=nextmonth" name="options" id="bulan-depan" autocomplete="off">
              <label class="btn btn-option" for="bulan-depan">Bulan Depan</label>
            </div> 
            
          </div>
          <a class="btn dropdown-btn" data-toggle="collapse" href="#admisi">Admisi
            <i class="fa fa-caret-down"></i>
          </a>
          <div class="dropdown-container" id="admisi">
            <div class="form-radio">
              <input type="radio" class="btn-check" onclick="searchAdmission(this.value)" value="?type_event=paid" name="options" id="berbayar" autocomplete="off" >
              <label class="btn btn-option" for="berbayar">Berbayar</label>
            </div>
            <div class="form-radio">
              <input type="radio" class="btn-check" onclick="searchAdmission(this.value)" value="?type_event=free" name="options" id="gratis" autocomplete="off" >
              <label class="btn btn-option" for="gratis">Gratis</label>
            </div>
          </div>
        </div>
      </form> 
    </div>
    <div class="col-9 content">
      <div class="row d-flex">
        <div class="col-6 col-judul">
          <h4>Semua Event</h4>
        </div>
        <div class="col-6 col-judul d-flex justify-content-end">
          <div class="dropdown show sort">
            <a class="btn dropdown-button d-flex align-items-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="sort material-icons">sort</i>
              <span>Sort</span>                          
                </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                <option class="dropdown-item" onclick="sortBy(this.value)" value="?sortBy=a-z">A - Z</option>
                <option class="dropdown-item" onclick="sortBy(this.value)" value="?sortBy=z-a">Z - A</option>
                <option class="dropdown-item" onclick="sortBy(this.value)" value="?sortBy=new_event">Event Baru</option>
                <option class="dropdown-item" onclick="sortBy(this.value)" value="?sortBy=old_event">Event Lama</option>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="container-card">
          @if ($events->count() > 0)
          <div class="row d-flex justify-content-start">
            @foreach ($events as $event)
            <div class="col-4 con-card col-card d-flex align-items-center justify-content-center">
              <a href="{{ route('show.event', ['slug' => $event->slug]) }}">
              <div class="card">
                <div class="container-gambar">
                  <img class="card-img-top" src="{{ $event->banner }}" alt="Card image cap" width="100%" height="96px">
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
          @else
          <div class="row d-flex justify-content-center">
            <img src="{{ asset('/src/img/bg-negative.svg') }}" alt="" width="592px" height="628px">
          </div>    
          @endif
         
          
        </div>
      
      </div>
    </div>
  </div>
</div>

{{-- <div class="search-results"></div> --}}
<input type="hidden" value="{{ csrf_token() }}" id="token">
<div id="search-results"></div>

<script>

  function searchTime(time) {
    window.location.href = time;
  }

  function searchAdmission(type) {
    window.location.href = type;
  }

  function sortBy(sort) {
    window.location.href = sort; 
  }

  $(document).ready(function () {
  
    let token = $('#token').val();
    var categories = [];
    
    $('input[name="categories[]"]').on('change', function (e) {
      
      e.preventDefault();
      categories = []; // reset 
// console.log(token);
        $('input[name="categories[]"]:checked').each(function()
        {
            categories.push($(this).val());
        });

          window.location.href = "/search?categories=" + categories.join(",");

    });

});
</script>
@endsection

@push('javascript')
    
@endpush

@push('styles')
<link rel="stylesheet" href="{{ asset('/src/css/search.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
@endpush