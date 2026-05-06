<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin - Tambah Tarif</title>
  <!-- CSS Skydash -->
  <link rel="stylesheet" href="{{ asset('asset/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/vertical-layout-light/style.css') }}">
</head>
<body>
  <div class="container-scroller">
    <!-- NAVBAR ATAS -->
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
              <i class="icon-grid menu-icon"></i><span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('admin.tarif') }}">
              <i class="ti-money menu-icon"></i><span class="menu-title">Kelola Tarif</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
              <i class="ti-power-off menu-icon text-danger"></i><span class="menu-title text-danger">Logout</span>
            </a>
          </li>
        </ul>
      </nav>

      <!-- FORM TAMBAH -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card mx-auto">
              <div class="card shadow-sm border-0">
                <div class="card-body">
                  <h4 class="card-title text-primary">Tambah Tarif Baru</h4>
                  <p class="card-description">Masukkan nominal tarif per jam sesuai jenis kendaraan.</p>
                  
                  <form action="{{ route('admin.tarif.store') }}" method="POST" class="forms-sample">
                    @csrf
                    <div class="form-group">
                      <label>Jenis Kendaraan</label>
                      <input type="text" name="jenis_kendaraan" class="form-control" placeholder="Contoh: Bus / Alat Berat" required>
                    </div>
                    <div class="form-group">
                      <label>Tarif Per Jam (Rp)</label>
                      <input type="number" name="tarif_per_jam" class="form-control" placeholder="Contoh: 15000" required>
                    </div>
                    
                    <div class="mt-4">
                      <button type="submit" class="btn btn-primary mr-2 font-weight-bold">SIMPAN TARIF</button>
                      <a href="{{ route('admin.tarif') }}" class="btn btn-light">BATAL</a>
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
