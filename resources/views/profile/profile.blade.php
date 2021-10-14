@extends('profile.master')

@section('content')
<div class="container-fluid container-logo">
    <img src="/src/img/banner/peah 1.png" width="100%" height="auto"/>
    <div class="container-fluid profile">
      <div class="row">
        <div class="col-6 d-flex align-items-center">
          <img src="/src/img/user/Emma-Watson140422.jpg" width="64px" height="64px">
          <h4>Nanendra</h4>
        </div>
        <div class="col-6 d-flex justify-content-end">
          <div class="total-event">
            <p>Total Event</p>
            <h4>8</h4>
          </div> 
        </div>
      </div>
    </div>
</div>

<div class="container-fluid container-judul">
  <div class="row">
    <div class="col-3 sidebar">
      <form action="">
        <h4 class="d-flex align-items-center">
          <i class="material-icons-outlined icon-filter">
          filter_list
          </i> 
          Filter
        </h4>
        <div class="sidenav">
          <a class="btn dropdown-btn" data-toggle="collapse" href="#kategori">Kategori
            <i class="fa fa-caret-down"></i>
          </a>
          <div class="dropdown-container" id="kategori">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="bisnis">
              <label class="form-check-label" for="bisnis">
                Bisnis
              </label>
            </div>              
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="edukasi">
              <label class="form-check-label" for="edukasi">
                Edukasi
              </label>
            </div>  
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="konferensi">
              <label class="form-check-label" for="konferensi">
                Konferensi
              </label>
            </div>  
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="konser">
              <label class="form-check-label" for="konser">
                Konser
              </label>
            </div> 
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="seminar">
              <label class="form-check-label" for="seminar">
                Seminar
              </label>
            </div>  
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="theater">
              <label class="form-check-label" for="theater">
                Theater
              </label>
            </div>  
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="ui/ux">
              <label class="form-check-label" for="ui/ux">
                UI/UX
              </label>
            </div>  
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="webinar">
              <label class="form-check-label" for="webinar">
                Webinar
              </label>
            </div>
               
          </div>
          <a class="btn dropdown-btn" data-toggle="collapse" href="#waktu">Waktu
            <i class="fa fa-caret-down"></i>
          </a>
          <div class="dropdown-container" id="waktu">
            <div class="form-radio">
              <input type="radio" class="btn-check" name="options" id="hari-ini" autocomplete="off" >
              <label class="btn btn-option" for="hari-ini">Hari Ini</label>
            </div>
            <div class="form-radio">
              <input type="radio" class="btn-check" name="options" id="besok" autocomplete="off" >
              <label class="btn btn-option" for="besok">Besok</label>
            </div>
            <div class="form-radio">
              <input type="radio" class="btn-check" name="options" id="akhir-pekan" autocomplete="off" >
              <label class="btn btn-option" for="akhir-pekan">Akhir Pekan</label>
            </div> 
            <div class="form-radio">
              <input type="radio" class="btn-check" name="options" id="minggu-ini" autocomplete="off" >
              <label class="btn btn-option" for="minggu-ini">Minggu Ini</label>
            </div>
            <div class="form-radio">
              <input type="radio" class="btn-check" name="options" id="minggu-depan" autocomplete="off">
              <label class="btn btn-option" for="minggu-depan">Minggu Depan</label>
            </div>
            <div class="form-radio">
              <input type="radio" class="btn-check" name="options" id="bulan-ini" autocomplete="off">
              <label class="btn btn-option" for="bulan-ini">Bulan Ini</label>
            </div> 
            <div class="form-radio">
              <input type="radio" class="btn-check" name="options" id="bulan-depan" autocomplete="off">
              <label class="btn btn-option" for="bulan-depan">Bulan Depan</label>
            </div> 
            
          </div>
          <a class="btn dropdown-btn" data-toggle="collapse" href="#admisi">Admisi
            <i class="fa fa-caret-down"></i>
          </a>
          <div class="dropdown-container" id="admisi">
            <div class="form-radio">
              <input type="radio" class="btn-check" name="options" id="berbayar" autocomplete="off" >
              <label class="btn btn-option" for="berbayar">Berbayar</label>
            </div>
            <div class="form-radio">
              <input type="radio" class="btn-check" name="options" id="gratis" autocomplete="off" >
              <label class="btn btn-option" for="gratis">Gratis</label>
            </div>
          </div>
        </div>
      </form> 
    </div>
    <div class="col-9 content">
      <div class="row d-flex">
        <div class="col-6 col-judul">
          <h4>Semua Event Nanendra</h4>
        </div>
        <div class="col-6 col-judul d-flex justify-content-end">
          <div class="dropdown show sort">
            <a class="btn dropdown-button d-flex align-items-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="sort material-icons">sort</i>
              <span>Sort</span>                          
                </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
              <option class="dropdown-item" href="#">A - Z</option>
              <option class="dropdown-item" href="#">Z - A</option>
              <option class="dropdown-item" href="#">Event Baru</option>
              <option class="dropdown-item" href="#">Event Lama</option>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="container-card">
          <div class="row d-flex justify-content-center">
            <div class="col-4 con-card col-card d-flex align-items-center justify-content-center">
              <a href="">
              <div class="card">
                <div class="container-gambar">
                  <img class="card-img-top" src="/src/img/banner/banner-card/Fashion Modern Living Room Large Area Rugs Abstract Art Oil Painting Pink Golden Carpet Rug Bedroom Bedside Non-Slip Floor Mats.png" alt="Card image cap" width="100%" height="96px">
                </div>
                <div class="card-body">
                  <h5 class="card-title">ONLINE WEBINAR</h5>
                  <div class="card-text d-flex">
                    <i class="material-icons">date_range</i>
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
            <div class="col-4  con-card col-card con-card col-card d-flex align-items-center justify-content-center">
              <a href="">
              <div class="card">
                <div class="container-gambar">
                  <img class="card-img-top" src="/src/img/banner/banner-card/Fashion Modern Living Room Large Area Rugs Abstract Art Oil Painting Pink Golden Carpet Rug Bedroom Bedside Non-Slip Floor Mats.png" alt="Card image cap" width="100%" height="96px">
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
            <div class="col-4  con-card col-card d-flex justify-content-center">
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
            <div class="col-4  con-card col-card d-flex justify-content-center">
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
            <div class="col-4  con-card col-card d-flex justify-content-center">
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
            <div class="col-4  con-card col-card d-flex justify-content-center">
              <a href="">
                <div class="card">
                  <div class="container-gambar">
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
            <div class="col-4  con-card col-card d-flex justify-content-center">
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
            <div class="col-4  con-card col-card d-flex justify-content-center">
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
            <div class="col-4  con-card col-card d-flex justify-content-center">
              <a href="">
                <div class="card">
                  <div class="container-gambar">
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
    </div>
  </div>
</div>

<div class="container container-pagination d-flex justify-content-center align-items-center">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">1   </a></li>
            <li class="page-item"><a class="page-link" href="#">2   </a></li>
            <li class="page-item"><a class="page-link" href="#">Selanjutnya   </a></li>
        </ul>
      </nav>
</div>
@endsection