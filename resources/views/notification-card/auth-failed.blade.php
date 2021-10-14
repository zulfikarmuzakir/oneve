@if($errors->any())
  <div class="alert-container d-flex justify-content-center">
    <div class="alert alert-warning alert-dismissible fade show d-flex" role="alert">
        <div class="col-10 d-flex align-items-center justify-content-start">
          Gagal melakukan proses autentikasi. mohon untuk mengisi email & kata sandi dengan benar
        </div>
        <div class="col-2 d-flex align-items-center justify-content-end">
            <button type="button" class="btn close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>           
    </div>
  </div>      
@endif