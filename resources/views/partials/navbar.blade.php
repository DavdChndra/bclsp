<div id="navbar-example2" class="NamaWebsite bg-light py-3 border-bottom border-5 sticky-top">
  <div class="container">
    <div class="d-flex justify-content-between">
      <div class="kiri d-flex justify-content-start">
        <div class="button">
          <nav class="navbar">
            <div class="container">
              <button class="btn btn-outline-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            </div>
          </nav>
        </div>
        <div class="nama ms-2 fs-4 fw-bold text-primary" style="padding-top: 10px; padding-bottom: 10px">Pengaduan Sekolah</div>
      </div>
      <div class="kanan">
        <img src="img/telkom.png" alt="Logo Telkom" width="55" data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer"/>
      </div>
    </div>
    <div class="collapse" id="navbarToggleExternalContent">
      <ul class="nav nav-pills justify-content-center">
        <li class="nav-item">
          <a class="nav-link" href="#InputAspirasi">Input Aspirasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#LihatAspirasi">Lihat Aspirasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#About">About</a>
        </li>
    </ul>
    </div>
  </div>
</div>

  <div class="container">  @if (session()->has('LoginError'))
    <div class="alert alert-danger my-3 alert-dismissible fade show" role="alert">
      {{ session('LoginError') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif</div>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Login Admin</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/login" method="post">
            @csrf
            <div class="form-floating mb-3">
              <input type="text" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" autofocus name="username"  id="floatingInput" placeholder="username" >
              <label for="floatingInput">Username</label>
              @error('username')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-floating">
              <input type="password" class="form-control @error('password') is-invalid @enderror" autofocus name="password" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">Password</label>
              @error('password')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Login</button>
        </form>
        </div>
      </div>
    </div>
  </div>
