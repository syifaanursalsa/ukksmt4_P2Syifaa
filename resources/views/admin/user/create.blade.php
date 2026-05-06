<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin - Tambah User</title>
  <!-- CSS Skydash -->
  <link rel="stylesheet" href="{{ asset('asset/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/vertical-layout-light/style.css') }}">
</head>
<body>
  <div class="container-scroller">
    <!-- NAVBAR -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="#"><img src="{{ asset('asset/images/logo.svg') }}" alt="logo"/></a>
      </div>
    </nav>

    <div class="container-fluid page-body-wrapper">
      <!-- SIDEBAR -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('admin.user') }}">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Kelola User</span>
            </a>
          </li>
          <li class="nav-item nav-category" style="font-size: 10px; font-weight: bold; margin-top: 15px;">KEMBALI</li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
              <i class="ti-power-off menu-icon text-danger"></i>
              <span class="menu-title text-danger">Logout</span>
            </a>
          </li>
        </ul>
      </nav>

      <!-- FORM TAMBAH USER -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-8 grid-margin stretch-card mx-auto">
              <div class="card shadow-sm border-0">
                <div class="card-body">
                  <h4 class="card-title text-primary">Tambah User Baru</h4>
                  <p class="card-description">Silakan isi formulir di bawah ini dengan benar.</p>
                  
                  <!-- FORM ACTION -->
                  <form action="{{ route('admin.user.store') }}" method="POST" class="forms-sample">
                    @csrf <!-- WAJIB ADA agar tidak error 419 -->

                    <div class="form-group">
                      <label for="nama_lengkap">Nama Lengkap</label>
                      <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Masukkan Nama Lengkap" required>
                    </div>

                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username" required>
                    </div>

                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password" required>
                    </div>

                    <div class="form-group">
                      <label for="role">Role / Jabatan</label>
                      <select class="form-control text-dark" name="role" id="role" required>
                        <option value="Admin">Admin</option>
                        <option value="Owner">Owner</option>
                        <option value="Petugas">Petugas</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="status_aktif">Status Akun</label>
                      <select class="form-control text-dark" name="status_aktif" id="status_aktif" required>
                        <option value="1">Aktif</option>
                        <option value="0">Non-Aktif</option>
                      </select>
                    </div>
                    
                    <div class="mt-4">
                      <button type="submit" class="btn btn-primary mr-2 font-weight-bold shadow-sm">SIMPAN USER</button>
                      <a href="{{ route('admin.user') }}" class="btn btn-light shadow-sm">BATAL</a>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('asset/vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('asset/js/off-canvas.js') }}"></script>
  <script src="{{ asset('asset/js/template.js') }}"></script>
</body>
</html>
