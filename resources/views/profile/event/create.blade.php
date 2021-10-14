@extends('profile.event.master-create')

@section('content')
<div>
    @if(Session::get('message'))
    <div class="alert alert-primary" role="alert">
      {{ Session::get('message') }}
    </div>
  @endif
  @if(Session::get('error'))
    <div class="alert alert-danger" role="alert">
      {{ Session::get('error') }}
    </div>
  @endif
    <form enctype="multipart/form-data" action="{{route('store.event')}}" method="POST" class="banner-upload d-flex flex-column align-items-center">
        <div class="banner-edit">
            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="imageUpload" class="imageUpload" />
            <input type="hidden" name="base64image" name="base64image" id="base64image">
        </div>
        <div class="banner-preview container2">
            @php
                if(!empty($image->image) && $image->image!='' && file_exists(public_path('/img/banner/'.$image->image))){
                  $image =$image->image;
                }else{
                  $image = 'default.png';
                }
                $url = url('public/img/banner/'.$image);
                $imgs =  "background-image:url($url)";
                $norepeat =  "background-repeat: no-repeat";
                $cover =  "background-size: cover";
                  
            @endphp
            <div class="container-imagepreview">
                <div id="imagePreview" style="{{$imgs}}; {{$norepeat}}; {{$cover}};">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"> 
                    <label class="add-banner" for="imageUpload">
                      <div class="overlay d-flex flex-column align-items-center justify-content-center">
                        <i class="material-icons">add_circle_outline</i>
                        <h4>Unggah banner yang ingin Anda gunakan</h4>
                        <p>Direkomendasikan dengan ukuran 1192 x 400</p>
                      </div>
                    </label>
                    
                </div>
            </div>


            <!-- EVENT DETAIL PREVIEW -->
            <div class="container3">
                <div class="row row-3">
                    <div class="col-8 col   ">
                        <div class="row d-flex flex-column">
                            <div class="col-12">
                                <!-- Event Name Preview -->
                                <h3 class="judul-event" id="eventPreview-name">Nama Event</h3>
                                <input type="hidden" name="event_name" id="eventPreview-name-value" value="">
                            </div>
                            <div class="col-12 col-row-4 d-flex align-items-center">
                                <div class="kategori" id="category">
                                    <!-- Event Category Preview -->
                                    <p id="eventPreview-category">Kategori</p>
                                    <input type="hidden" name="category_name" id="eventPreview-category-value" value="">
                                </div>
                                <div class="tanggal" id="date">
                                    <!-- Event Date Preview -->
                                    <p>
                                        <span id="eventPreview-startDate">Tanggal Mulai</span> 
                                        <input type="hidden" name="date_start" id="eventPreview-startDate-value" value="">
                                        <span>-</span> 
                                        <span id="eventPreview-endDate">Tanggal Berakhir</span>
                                        <input type="hidden" name="date_end" id="eventPreview-endDate-value" value="">
                                    </p>
                                </div>
                                <div class="waktu" id="time">
                                    <!-- Event Time Preview -->
                                    <p>
                                        <span id="eventPreview-startTime">Waktu Mulai</span>
                                        <input type="hidden" name="time_start" id="eventPreview-startTime-value" value="">
                                        <span>-</span> 
                                        <span id="eventPreview-endTime">Waktu Berakhir</span>
                                        <input type="hidden" name="time_end" id="eventPreview-endTime-value" value="">
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 d-flex align-items-center profile-container">
                                <img src="{{ $user->avatar   }}" alt="" class="pp-user">
                                <h3 class="nama-user">{{ $user->name }}</h3>                            
                            </div>
                        </div>
                    </div>
                    <div class="col-4 col d-flex justify-content-center align-items-center">
                        <a class="btn btn-primary btn-create-event" data-toggle="modal" data-target="#detail-event"><i class="material-icons edit">
                            edit
                        </i> Buat Detail Event</a>
                    </div>
                </div>
            </div>
        </div>


        <!-- TICKET PREVIEW -->
        <div class="container-fluid detail-tiket d-flex flex-column justify-content-center">
            <div class="judul-section d-flex tiket-event-title-section">
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
            <div class="row d-flex row-tiket">
                <div class="col-12 d-flex flex-column container-tiket" id="ticket-list">
                    
                </div>
            </div>
            <div class="row row-button d-flex justify-content-center">
                <a class="btn btn-primary btn-create-tiket d-flex justify-content-center"  data-toggle="modal" data-target="#detail-tiket">Buat Tiket</a> 
            </div>
        </div>

        <div class="container-fluid container-description detail-tiket d-flex flex-column justify-content-center">
            <div class="judul-section description d-flex">
                <svg width="24" height="30" viewBox="0 0 24 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.59749 21H18.1948V24H6.59749V21ZM6.59749 15H18.1948V18H6.59749V15ZM15.2955 0H3.69816C2.10353 0 0.798828 1.35 0.798828 3V27C0.798828 28.65 2.08903 30 3.68366 30H21.0941C22.6888 30 23.9935 28.65 23.9935 27V9L15.2955 0ZM21.0941 27H3.69816V3H13.8458V10.5H21.0941V27Z" fill="#3D3D3D"/>
                    </svg>                    
                <h3>Deskripsi Event</h3>                    
            </div>
            <textarea id="editor" name="description" placeholder="Put the description here">
                
            </textarea>
        </div>
        <div class="container-fluid detail-tiket d-flex flex-column justify-content-center">
            <div class="judul-section d-flex">
                <svg width="35" height="36" viewBox="0 0 35 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M27.4642 19.47C27.5215 18.99 27.5645 18.51 27.5645 18C27.5645 17.49 27.5215 17.01 27.4642 16.53L30.4888 14.055C30.7611 13.83 30.8328 13.425 30.6608 13.095L27.7939 7.905C27.6649 7.665 27.4212 7.53 27.1632 7.53C27.0771 7.53 26.9911 7.545 26.9195 7.575L23.3502 9.075C22.6048 8.475 21.8021 7.98 20.9277 7.605L20.383 3.63C20.3399 3.27 20.0389 3 19.6806 3H13.9468C13.5884 3 13.2874 3.27 13.2444 3.63L12.6997 7.605C11.8253 7.98 11.0225 8.49 10.2772 9.075L6.70787 7.575C6.62186 7.545 6.53585 7.53 6.44985 7.53C6.20616 7.53 5.96248 7.665 5.83347 7.905L2.96657 13.095C2.78022 13.425 2.86623 13.83 3.13858 14.055L6.16316 16.53C6.10582 17.01 6.06282 17.505 6.06282 18C6.06282 18.495 6.10582 18.99 6.16316 19.47L3.13858 21.945C2.86623 22.17 2.79456 22.575 2.96657 22.905L5.83347 28.095C5.96248 28.335 6.20616 28.47 6.46418 28.47C6.55019 28.47 6.63619 28.455 6.70787 28.425L10.2772 26.925C11.0225 27.525 11.8253 28.02 12.6997 28.395L13.2444 32.37C13.2874 32.73 13.5884 33 13.9468 33H19.6806C20.0389 33 20.3399 32.73 20.383 32.37L20.9277 28.395C21.8021 28.02 22.6048 27.51 23.3502 26.925L26.9195 28.425C27.0055 28.455 27.0915 28.47 27.1775 28.47C27.4212 28.47 27.6649 28.335 27.7939 28.095L30.6608 22.905C30.8328 22.575 30.7611 22.17 30.4888 21.945L27.4642 19.47ZM24.626 16.905C24.6833 17.37 24.6976 17.685 24.6976 18C24.6976 18.315 24.669 18.645 24.626 19.095L24.4253 20.79L25.701 21.84L27.2492 23.1L26.2458 24.915L24.4253 24.15L22.9345 23.52L21.6444 24.54C21.028 25.02 20.4403 25.38 19.8526 25.635L18.3331 26.28L18.1038 27.975L17.8171 30H15.8103L15.5379 27.975L15.3085 26.28L13.7891 25.635C13.1727 25.365 12.5993 25.02 12.026 24.57L10.7215 23.52L9.20206 24.165L7.38159 24.93L6.37817 23.115L7.9263 21.855L9.20206 20.805L9.00138 19.11C8.95838 18.645 8.92971 18.3 8.92971 18C8.92971 17.7 8.95838 17.355 9.00138 16.905L9.20206 15.21L7.9263 14.16L6.37817 12.9L7.38159 11.085L9.20206 11.85L10.6929 12.48L11.983 11.46C12.5993 10.98 13.187 10.62 13.7748 10.365L15.2942 9.72L15.5236 8.025L15.8103 6H17.8027L18.0751 8.025L18.3045 9.72L19.8239 10.365C20.4403 10.635 21.0137 10.98 21.587 11.43L22.8915 12.48L24.4109 11.835L26.2314 11.07L27.2348 12.885L25.701 14.16L24.4253 15.21L24.626 16.905ZM16.8137 12C13.6458 12 11.0799 14.685 11.0799 18C11.0799 21.315 13.6458 24 16.8137 24C19.9816 24 22.5475 21.315 22.5475 18C22.5475 14.685 19.9816 12 16.8137 12ZM16.8137 21C15.2369 21 13.9468 19.65 13.9468 18C13.9468 16.35 15.2369 15 16.8137 15C18.3905 15 19.6806 16.35 19.6806 18C19.6806 19.65 18.3905 21 16.8137 21Z" fill="#3D3D3D"/>
                    </svg>                                       
                <h3>Pengaturan Tambahan</h3>     
            </div>
            <div class="form-group form-detail-event d-flex align-items-center">
                <select class="form-select select-maximum" name="ticket_max" aria-label="Default select example" id="max-tickets" data-display="static">
                    <option class="jumlah-maximum text-center" selected disabled hidden>Jumlah maksimum tiket yang terjual</option>
                    <option value="1">1 Tiket</option>
                    <option value="2">2 Tiket</option>
                    <option value="3">3 Tiket</option>
                  </select>
                  <svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 0L5 5L10 0L0 0Z" fill="black"/>
                    </svg>                    
            </div>
        </div>
  
      <div class="sub-total">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-5 col d-flex align-items-center justify-content-start">
                  <h4 class="buat-skrng">Buat eventmu sekarang !</h4>
                </div>
                <div class="col-5 col d-flex align-items-center justify-content-end">
    
                </div>
                <div class="col-2 col d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary button-beli">
                        Buat Event
                    </button>
                </div>
            </div>
        </div>
      </div>
    </form>

    <div class="modal fade bd-example-modal-lg imagecrop" id="model" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered lg d-flex flex-column align-items-center justify-content-center">
            <div class="modal-content modal-upload">
                <div class="modal-header d-flex flex-column">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="row d-flex justify-content-center">
                    <h4>UPLOAD EVENT BANNER</h4>
                </div>
                <div class="modal-body">
                    <p>Adjust image ratio and swipe to change position</p>
                    <div class="row">
                        <div class="col-md-12 d-flex flex-column align-items-center justify-content-center">
                            <img id="image">
                        </div>
                    </div>
                    <div class="row row-footer d-flex">
                        <div class="col-6 d-flex justify-content-start">
                            <button type="button" class="btn btn-secondary crop-close" data-dismiss="modal">Kembali</button>
                        </div>
                        <div class="col-6 d-flex justify-content-end">   
                            <button type="button" class="btn btn-primary crop" id="crop">Simpan</button>
                        </div>
                    </div>
              </div>
            </div>
        </div>
    </div>

    <!-- CREATE EVENT MODAL -->
    <div class="modal fade modal-detail-event" id="detail-event" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            <div class="header">
              <h4 class="modal-title text-center" id="exampleModalLabel">DETAIL EVENT</h4>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group form-detail-event">
                  <label for="nama-event" class="col-form-label">Nama Event</label>
                  <input type="text" class="form-control" id="event-name">
                </div>
                <div class="form-group form-detail-event">
                    <label for="kategori" class="col-form-label">Kategori</label>
                    <select class="form-select select-category" aria-label="Default select example" name="category_id" id="event-category" data-display="static">
                        <option class="pilih-kategori" selected disabled hidden>Pilih Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group form-detail-event">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="event-startDate">Tanggal Mulai</label>
                                <input class="form-control datepicker" type="text" id="event-startDate">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="event-endDate">Tanggal Berakhir</label>
                                <input class="form-control datepicker" type="text" id="event-endDate">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group form-detail-event">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="datetimepicker">Waktu Mulai</label>
                                <input type='time' class="form-control timepicker" id='event-startTime' />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="datetimepicker">Waktu Berakhir</label>
                                <input type='time' class="form-control timepicker" id='event-endTime' />
                            </div>
                        </div>
                    </div>
                </div>
              </form>
            </div>
            <div class="modal-footer d-flex justify-content-center">
              <button type="button" id="event-submit" class="btn btn-primary btn-selesai" data-dismiss="modal">Selesai</button>
            </div>
          </div>
        </div>
      </div>

      <!-- CREATE TICKET MODAL -->
      <form action="POST" id="formCreateEvent">
        <div class="modal fade modal-detail-tiket" id="detail-tiket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              <div class="header">
                <h4 class="modal-title text-center" id="exampleModalLabel">DETAIL TIKET</h4>
              </div>
              <div class="modal-body">
                  <div class="form-group form-detail-tiket">
                    <label for="nama-event" class="col-form-label">Nama Tiket Event</label>
                    <div class="container-modal-form">
                      <input type="text" class="form-control" id="ticket-eventName">
                      <span class="material-icons-outlined icon-error">
                        error_outline
                        
                    </div>
                  </div>
                  <div class="form-group form-detail-tiket">
                      <label for="nama-event" class="col-form-label">Jumlah Tiket</label>
                      <div class="container-modal-form">
                        <input type="number" class="form-control" id="ticket-stocks">
                        <span class="material-icons-outlined icon-error">
                          error_outline
                        
                      </div>
                    </div>
                  <div class="form-group form-detail-tiket">
                      <div class="row">
                          <div class="col-6">
                              <div class="form-group">
                                      <label for="ticket-startDate">Tanggal Mulai</label>
                                      {{-- <input type='date' class="form-control" id='datefieldstart' /> --}}
                                      <div class="container-modal-form">
                                        <input type="text" class="datepicker" id="ticket-startDate">
                                        <span class="material-icons-outlined icon-error">
                                          error_outline
                                        </span>
  
                                      </div>
                              </div>
                          </div>
                          <div class="col-6">
                              <div class="form-group">
                                  <label for="ticket-endDate">Tanggal Berakhir</label>
                                  <div class="container-modal-form">
                                    <input type="text" class="datepicker" id="ticket-endDate">
                                    <span class="material-icons-outlined icon-error">
                                      error_outline
                                    </span>
                                  </div>
                          </div>
                          </div>
                      </div>
                  </div>
                  <div class="form-group form-detail-tiket">
                      <div class="row">
                          <div class="col-6">
                              <div class="form-group">
                                      <label for="datetimepicker">Waktu Mulai</label>
                                      <div class="container-modal-form">
                                        <input type='time' class="form-control " id='ticket-startTime' />
                                        <span class="material-icons-outlined icon-error">
                                          error_outline
                                        </span>
  
                                      </div>
                              </div>
                          </div>
                          <div class="col-6">
                              <div class="form-group">
                                  <label for="datetimepicker">Waktu Berakhir</label>
                                  <div class="container-modal-form">
                                    <input type='time' class="form-control" id='ticket-endTime' />
                                    <span class="material-icons-outlined icon-error">
                                      error_outline
                                    </span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="form-group form-detail-tiket">
                      <div class="row d-flex">
                          <div class="col-6 radio">
                              <div class="form-check d-flex  align-items-center">
                                <div class="container-modal-form">
                                  <input class="radio-harga" type="radio" name="ticket-priceType" id="ticket-priceTypePaid" value="paid" onclick="javascript:yesnoCheck();">
                                </div>
                                  <label class="form-check-label label-radio" for="ticket-priceTypePaid">
                                    Berbayar
                                  </label>
                              </div>
                              <div class="container-harga d-flex align-items-center" id="field-harga">
                                <p id="rp">Rp</p>   
                                 <input id="ticket-price" class="form-control input-harga" type="number" placeholder="Harga" aria-label="default input example">
                              </div>                               
                          </div>
                          <div class="col-6 radio">
                              <div class="form-check d-flex align-items-center">
                                <div class="container-modal-form">
                                  <input class="radio-harga" type="radio" name="ticket-priceType" id="ticket-priceTypeFree" value="free" onclick="javascript:yesnoCheck();">
                                </div>
                                  <label class="form-check-label label-radio" for="ticket-priceTypeFree">
                                    Gratis
                                  </label>
                                </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-primary btn-selesai" id="lanjutModal" data-dismiss="modal" data-toggle="modal" data-target="#event-link">Lanjut</button>
              </div>
            </div>
          </div>
        </div>
  
        <div class="modal fade modal-detail-tiket" id="event-link" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              <div class="header">
                <h4 class="modal-title text-center" id="exampleModalLabel">LINK ZOOM</h4>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group form-detail-tiket">
                   <input id="inputLink" type="text" class="form-control">
                  </div>
                </form>
              </div>
              <div class="modal-footer d-flex justify-content-center">
                <button type="button" id="ticket-submit" class="btn btn-primary btn-selesai" data-dismiss="modal">Selesai</button>
              </div>
            </div>
          </div>
        </div>
      </form>
      

      <!-- EDIT TICKET MODAL -->
      <div class="modal fade modal-detail-tiket" id="edit-detail-tiket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            <div class="header">
              <h4 class="modal-title text-center" id="exampleModalLabel">EDIT DETAIL TIKET</h4>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group form-detail-tiket">
                  <label for="nama-event" class="col-form-label">Nama Tiket Event</label>
                  <input type="text" class="form-control" id="editTicket-eventName">
                </div>
                <div class="form-group form-detail-tiket">
                    <label for="nama-event" class="col-form-label">Jumlah Tiket</label>
                    <input type="number" class="form-control" id="editTicket-stocks">
                  </div>
                <div class="form-group form-detail-tiket">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                    <label for="editTicket-startDate">Tanggal Mulai</label>
                                    {{-- <input type='date' class="form-control" id='datefieldstart' /> --}}
                                    <input type="text" class="datepicker" id="editTicket-startDate">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="editTicket-endDate">Tanggal Berakhir</label>
                                <input type="text" class="datepicker" id="editTicket-endDate">
                        </div>
                        </div>
                    </div>
                </div>
                <div class="form-group form-detail-tiket">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                    <label for="editTicket-startTime">Waktu Mulai</label>
                                    <input type='time' class="form-control " id='editTicket-startTime' />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="editTicket-endTime">Waktu Berakhir</label>
                                 <input type='time' class="form-control" id='editTicket-endTime' />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group form-detail-tiket">
                    <div class="row d-flex">
                        <div class="col-6 radio">
                            <div class="form-check d-flex  align-items-center">
                                <input class="radio-harga" type="radio" name="editTicket-priceType" id="editTicket-priceTypePaid" value="paid" onclick="javascript:edityesnoCheck();">
                                <label class="form-check-label label-radio" for="editTicket-priceTypePaid">
                                  Berbayar
                                </label>
                            </div>
                            <div class="container-harga d-flex align-items-center" id="field-harga">
                              <p id="editRp">Rp</p>   
                               <input id="editTicket-price" class="form-control input-harga" type="number" placeholder="Harga" aria-label="default input example">
                            </div>                               
                        </div>
                        <div class="col-6 radio">
                            <div class="form-check d-flex align-items-center">
                                <input class="radio-harga" type="radio" name="editTicket-priceType" id="editTicket-priceTypeFree" value="free" onclick="javascript:edityesnoCheck();">
                                <label class="form-check-label label-radio" for="editTicket-priceTypeFree">
                                  Gratis
                                </label>
                              </div>
                        </div>
                    </div>
                </div>
              </form>
            </div>
            <div class="modal-footer d-flex justify-content-center">
              <button type="button" class="btn btn-primary btn-selesai" data-dismiss="modal" data-toggle="modal" data-target="#editTicket-link">Lanjut</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade modal-detail-tiket" id="editTicket-link" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            <div class="header">
              <h4 class="modal-title text-center" id="exampleModalLabel">LINK ZOOM</h4>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group form-detail-tiket">
                 <input id="editInputLink" type="text" class="form-control">
                </div>
              </form>
            </div>
            <div class="modal-footer d-flex justify-content-center">
              <button type="button" id="editTicket-submit" class="btn btn-primary btn-selesai" data-dismiss="modal">Selesai</button>
            </div>
          </div>
        </div>
      </div>
</div>



event-category
<script>
  $('#name').change(function() {
    $('#firstname').val($(this).val());
});
</script>
@endsection
        