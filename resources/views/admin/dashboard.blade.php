<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin - Parkir System</title>
  <!-- CSS Skydash -->
  <link rel="stylesheet" href="{{ asset('asset/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/vertical-layout-light/style.css') }}">
  <link rel="shortcut icon" href="{{ asset('asset/images/favicon.png') }}" />
</head>

<body>
  <div class="container-scroller">
    <!-- 1. NAVBAR ATAS (PUTIH) -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="#"><img src="{{ asset('asset/images/logo.svg') }}" class="mr-2" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>

    <div class="container-fluid page-body-wrapper">
      <!-- 2. SIDEBAR PUTIH (CLEAN STYLE) -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <!-- Profil Singkat di Sidebar -->
          <li class="nav-item p-3">
             <div class="d-flex align-items-center">
                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mr-2" style="width: 40px; height: 40px; font-weight: bold;">A</div>
                <div>
                   <p class="mb-0 text-dark font-weight-bold" style="font-size: 13px;">Admin Utama</p>
                   <small class="text-muted" style="font-size: 11px;">Administrator</small>
                </div>
             </div>
          </li>

          <li class="nav-item nav-category" style="font-size: 10px; font-weight: bold;">NAVIGASI UTAMA</li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

                    <li class="nav-item nav-category" style="font-size: 10px; font-weight: bold;">MANAJEMEN DATA</li>
                  <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.user') }}"> <!-- Pastikan ini admin.user -->
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Kelola User</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.kendaraan') }}"><i class="ti-car menu-icon"></i><span class="menu-title">Kelola Kendaraan</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.tarif') }}"><i class="ti-money menu-icon"></i><span class="menu-title">Kelola Tarif</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="{{ route('admin.area') }}"><i class="ti-location-pin menu-icon"></i><span class="menu-title">Kelola Area Parkir</span></a>
          </li>

           <li class="nav-item">
            <a class="nav-link"  href="{{ route('admin.area') }}"><i class="ti-location-pin menu-icon"></i><span class="menu-title">pengajuan</span></a>
          </li>

          <li class="nav-item nav-category" style="font-size: 10px; font-weight: bold;">LAINNYA</li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.log') }}"><i class="ti-clipboard menu-icon"></i><span class="menu-title">Log Aktivitas</span></a>
          </li>
          <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display: none;">@csrf</form>
            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="ti-power-off menu-icon"></i><span class="menu-title">Logout</span>
            </a>
          </li>
        </ul>
      </nav>

      <!-- 3. KONTEN UTAMA -->
      <div class="main-panel">
        <div class="content-wrapper">
          <!-- Alert -->
         

          <!-- Banner Biru -->
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card" style="background: linear-gradient(to right, #4b49ac, #3f3da1); color: white; border-radius: 10px;">
                <div class="card-body d-flex justify-content-between align-items-center p-5">
                  <div>
                    <h1 class="font-weight-bold">Selamat Datang, Admin Utama!</h1>
                    <p class="mb-0">Sistem Manajemen Parkir - {{ date('d F Y') }}</p>
                  </div>
                  <div class="badge badge-dark p-2" style="background: rgba(0,0,0,0.3);">{{ date('H:i') }} WIB</div>
                </div>
              </div>
            </div>
          </div>

          <!-- Cards Statistik -->
          <div class="row">
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card shadow-sm" style="border-left: 5px solid #4b49ac;">
                <div class="card-body"><p class="text-muted small font-weight-bold">TOTAL KENDARAAN</p><h2>3</h2></div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card shadow-sm" style="border-left: 5px solid #248afd;">
                <div class="card-body"><p class="text-muted small font-weight-bold">PARKIR AKTIF</p><h2 class="text-success">0</h2></div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card shadow-sm" style="border-left: 5px solid #7da7fb;">
                <div class="card-body"><p class="text-muted small font-weight-bold">PENDAPATAN HARI INI</p><h2>Rp 2,000</h2></div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card shadow-sm" style="border-left: 5px solid #f3a3a3;">
                <div class="card-body"><p class="text-muted small font-weight-bold">KAPASITAS AREA</p><h2>0%</h2></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- JS Skydash -->
  <script src="{{ asset('asset/vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('asset/js/off-canvas.js') }}"></script>
  <script src="{{ asset('asset/js/template.js') }}"></script>
</body>
</html>
