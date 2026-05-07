<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Owner - Parkir System</title>
  <!-- CSS Skydash -->
  <link rel="stylesheet" href="{{ asset('asset/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/vertical-layout-light/style.css') }}">
  <link rel="shortcut icon" href="{{ asset('asset/images/favicon.png') }}" />
</head>

<body>
  <div class="container-scroller">
    <!-- 1. NAVBAR ATAS -->
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
      <!-- 2. SIDEBAR KHUSUS OWNER -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <!-- Profil Owner -->
          <li class="nav-item p-3">
             <div class="d-flex align-items-center">
                <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center mr-2" style="width: 40px; height: 40px; font-weight: bold;">O</div>
                <div>
                   <p class="mb-0 text-dark font-weight-bold" style="font-size: 13px;">Owner Parkir</p>
                   <small class="text-muted" style="font-size: 11px;">Management Role</small>
                </div>
             </div>
          </li>

          <li class="nav-item nav-category" style="font-size: 10px; font-weight: bold;">RINGKASAN</li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item nav-category" style="font-size: 10px; font-weight: bold;">LAPORAN & PENGAJUAN</li>
          
          <!-- Fitur: Rekap Transaksi Sesuai Waktu -->
         <li class="nav-item">
  {{-- Hubungkan ke route owner.rekap yang sudah kita buat di web.php --}}
  <a class="nav-link" href="{{ route('owner.rekap') }}">
    <i class="ti-bar-chart menu-icon"></i>
    <span class="menu-title">Rekap Transaksi</span>
  </a>
</li>

          <!-- Fitur: Pengajuan -->
          <li class="nav-item">
            <a class="nav-link" href="{{ route('owner.appeal') }}">
              <i class="ti-email menu-icon"></i>
              <span class="menu-title">Daftar Pengajuan</span>
            </a>
          </li>

          <li class="nav-item nav-category" style="font-size: 10px; font-weight: bold;">AKUN</li>
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
          
          <!-- Banner Owner (Hijau/Cyan agar beda dengan Admin) -->
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card" style="background: linear-gradient(to right, #248afd, #28c7d0); color: white; border-radius: 10px;">
                <div class="card-body d-flex justify-content-between align-items-center p-5">
                  <div>
                    <h1 class="font-weight-bold">Halo Owner, Selamat Datang!</h1>
                    <p class="mb-0">Pantau performa bisnis dan rekap transaksi hari ini.</p>
                  </div>
                  <div class="text-right">
                    <h3 class="mb-0">{{ date('d F Y') }}</h3>
                    <p class="mb-0 text-white-50">Laporan Real-time</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Filter Rekap Sesuai Waktu (Fitur Spesifik Owner) -->
          <div class="row mb-4">
            <div class="col-md-12">
              <div class="card shadow-sm">
                <div class="card-body">
                  <h4 class="card-title">Cari Rekap Transaksi</h4>
                  <form class="form-inline">
                    <label class="sr-only">Tanggal Mulai</label>
                    <input type="date" class="form-control mb-2 mr-sm-2" placeholder="Tanggal Mulai">
                    <label class="sr-only">Tanggal Selesai</label>
                    <input type="date" class="form-control mb-2 mr-sm-2" placeholder="Tanggal Selesai">
                    <button type="submit" class="btn btn-primary mb-2">Tampilkan Rekap</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- Cards Statistik Khusus Owner -->
          <div class="row">
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card shadow-sm" style="border-left: 5px solid #28c7d0;">
                <div class="card-body">
                  <p class="text-muted small font-weight-bold">TOTAL PENDAPATAN</p>
                  <h2 class="text-primary">Rp 1,250,000</h2>
                  <small class="text-success font-weight-bold">+5% dari kemarin</small>
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card shadow-sm" style="border-left: 5px solid #4b49ac;">
                <div class="card-body">
                  <p class="text-muted small font-weight-bold">TRANSAKSI SELESAI</p>
                  <h2>45</h2>
                  <small class="text-muted">Kendaraan keluar</small>
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card shadow-sm" style="border-left: 5px solid #ffaf00;">
                <div class="card-body">
                  <p class="text-muted small font-weight-bold">PENGAJUAN BARU</p>
                  <h2 class="text-warning">3</h2>
                  <small class="text-muted">Butuh persetujuan</small>
                </div>
              </div>
            </div>
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card shadow-sm" style="border-left: 5px solid #f3a3a3;">
                <div class="card-body">
                  <p class="text-muted small font-weight-bold">OKUPANSI AREA</p>
                  <h2>65%</h2>
                  <div class="progress progress-sm mt-2">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 65%"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Preview Tabel Laporan -->
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card shadow-sm">
                <div class="card-body">
                  <p class="card-title text-dark">Aktivitas Transaksi Terbaru</p>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead class="bg-light">
                        <tr>
                          <th>Waktu</th>
                          <th>Petugas</th>
                          <th>Area</th>
                          <th>Pendapatan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>14:20 WIB</td>
                          <td>Budi (Shift Siang)</td>
                          <td>Area A</td>
                          <td><b class="text-dark">Rp 5.000</b></td>
                        </tr>
                        <tr>
                          <td>14:35 WIB</td>
                          <td>Siti (Shift Siang)</td>
                          <td>Area B</td>
                          <td><b class="text-dark">Rp 10.000</b></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
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
