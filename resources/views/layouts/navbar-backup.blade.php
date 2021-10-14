<div class="navbar">
  <div class="container d-flex align-items-center justify-content-center">
      <div class="row">
          <div class="col-1 d-flex align-items-center">
              <h3>Logo</h3>
          </div>
          <div class="col-2 d-flex align-items-center justify-content-center">
            <a href="" class="btn cari-event">Cari Event</a>
          </div>
          <div class="col-6">
              <form action="{{ route('home.search') }}" method="GET" class="form">
                @csrf
                  <div class="form-control d-flex align-items-center">
                      <input type="text" placeholder="Search" name="search" class="form-search">
                      <button>
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M12.5 11H11.71L11.43 10.73C12.41 9.59 13 8.11 13 6.5C13 2.91 10.09 0 6.5 0C2.91 0 0 2.91 0 6.5C0 10.09 2.91 13 6.5 13C8.11 13 9.59 12.41 10.73 11.43L11 11.71V12.5L16 17.49L17.49 16L12.5 11ZM6.5 11C4.01 11 2 8.99 2 6.5C2 4.01 4.01 2 6.5 2C8.99 2 11 4.01 11 6.5C11 8.99 8.99 11 6.5 11Z" fill="#797979"/>
                        </svg>    
                      </button>                                 
                  </div>
              </form>
          </div>
          @auth
          <div class="col-3 d-flex align-items-center justify-content-end">
            <a href="" class="btn btn-buat">Buat Event</a>
            @if (Auth::user()->membership->where('user_id', Auth::user()->id)->orderByDesc('created_at')->first()->membership_type === "premium" &&
            Auth::user()->membership->where('user_id', Auth::user()->id)->orderByDesc('created_at')->first()->expire_at > date('Y-m-d'))
                <a href="" class="btn btn-premium text-center">Premium</a>
            @endif
            <div class="dropdown">
                <button class="account btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ Auth::user()->avatar }}" width="48px" height="48px"/>
                </button>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-right dropdown-account" aria-labelledby="dropdownMenuButton">
                  <div class="d-flex dd-account align-items-center justify-content-center">
                      <div>
                        <img src="{{ Auth::user()->avatar }}" width="48px" height="48px"/>
                      </div>
                      <p class="nama-user">{{ Auth::user()->name }}</p>
                  </div>
                  <a class="dropdown-item d-flex align-items-center" href="{{ route('dashboard') }}">
                    <i class="material-icons-outlined">
                      dashboard
                    </i>
                        Dasbor
                    </a>
                  <a class="dropdown-item d-flex align-items-center" href="{{ route('dashboard.profile', ['id' => Auth::user()->id]) }}">
                    <i class="material-icons">
                        person
                        </i>
                        Profil
                    </a>

                    <form action="{{ route('logout') }}" method="post">
                      @csrf
                      <a class="dropdown-item d-flex align-items-center" href="route('logout')"
                      onclick="event.preventDefault();
                                  this.closest('form').submit();">
                      <i class="material-icons-outlined">
                          logout
                          </i>
                          Keluar
                      </a>
                  </form>
                </div>
              </div>
          </div>
          @endauth
          @guest
          <div class="col-3 d-flex align-items-center justify-content-end">
            <button type="button" class="btn btn-primary btn-daftar" data-toggle="modal" data-target="#modal-daftar">
              Daftar
            </button>
            <button type="button" class="btn btn-masuk" data-toggle="modal" data-target="#modal-masuk">
              Masuk
            </button>
            
            <!-- Modal daftar -->
            <div class="modal fade" id="modal-daftar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="header d-flex justify-content-center">
                    <h4>DAFTAR</h4>
                  </div>
                  <div class="modal-body form">
                      <form method="POST" action="{{ route('register') }}">
                        @csrf
                          <div class="form-control">
                              <input type="text" placeholder="Nama" name="name" class="form-nama">
                          </div>
                          <div class="form-control">
                              <input type="email" placeholder="Email" name="email" class="form-email">
                          </div>
                          <div class="form-control">
                              <input type="password" placeholder="Password" name="password" class="form-password">
                          </div>
                          <div class="form-control">
                            <input type="password" placeholder="Ulang Password" name="password_confirmation" class="form-password">
                          </div>
                              <button type="submit" class="btn btn-primary daftar">DAFTAR</button>
                          <div class="form-control atau-menggunakan">
                              <div class="d-flex justify-content-center">
                                  <div class="col-3 garis"><hr></div>
                                  <div class="col-6 d-flex align-items-center justify-content-center">
                                      <p>Atau Menggunakan</p>
                                  </div>
                                  <div class="col-3 garis"><hr></div>
                              </div>
                          </div>
                      </form>
                      <form action="{{ route('google.login') }}">
                              <button class="btn btn-google">
                                  <img src="{{ asset('/src/img/google.png') }}" width="17px" height="18px"/>
                                  Akun Google
                              </button>
                          <div class="form-control container-daftar d-flex justify-content-center align-items-center">
                              <p>Sudah Mempunyai Akun? </p>&nbsp;
                              <a class="link-daftar" data-dismiss="modal" data-toggle="modal" data-target="#modal-masuk">Masuk</a>
                          </div>
                      </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- MOdal Masuk -->
            <div class="modal fade" id="modal-masuk" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="header d-flex justify-content-center">
                    <h4>MASUK</h4>
                  </div>
                  <div class="modal-body form">
                      <form method="POST" action="{{ route('login') }}">
                        @csrf
                          <div class="form-control">
                              <input type="email" placeholder="Email" name="email" class="form-email">
                          </div>
                          <div class="form-control">
                              <input type="password" placeholder="Password" name="password" class="form-password">
                          </div>
                          @if (Route::has('password.request'))
                            <a class="link-password" href="{{ route('password.request') }}">Lupa Password?</a>
                          @endif
                          <button type="submit" class="btn btn-primary masuk">MASUK</button>
                          <div class="form-control atau-menggunakan">
                              <div class="d-flex justify-content-center">
                                  <div class="col-3 garis"><hr></div>
                                  <div class="col-6 d-flex align-items-center justify-content-center">
                                      <p>Atau Menggunakan</p>
                                  </div>
                                  <div class="col-3 garis"><hr></div>
                              </div>
                          </div>
                      </form>
                      <form action="{{ route('google.login') }}">
                              <button class="btn btn-google google-masuk">
                                  <img src="{{ asset('/src/img/google.png') }}" width="17px" height="18px"/>
                                  Akun Google
                              </button>
                          <div class="form-control container-daftar d-flex justify-content-center align-items-center">
                              <p>Belum Mempunyai Akun? </p>&nbsp;
                              <a class="link-daftar" data-dismiss="modal" data-toggle="modal" data-target="#modal-daftar">Daftar</a>
                          </div>
                      </form>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
          @endguest
      </div>
  </div>
</div>