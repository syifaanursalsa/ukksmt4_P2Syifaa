<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Petugas - Parkir System</title>
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
      <!-- 2. SIDEBAR KHUSUS PETUGAS -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <!-- Profil Petugas -->
          <li class="nav-item p-3">
             <div class="d-flex align-items-center">
                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mr-2" style="width: 40px; height: 40px; font-weight: bold;">P</div>
                <div>
                   <p class="mb-0 text-dark font-weight-bold" style="font-size: 13px;">Petugas Lapangan</p>
                   <small class="text-muted" style="font-size: 11px;">Shift Pagi</small>
                </div>
             </div>
          </li>

          <li class="nav-item nav-category" style="font-size: 10px; font-weight: bold;">OPERASIONAL</li>
          <li class="nav-item active">
            <a class="nav-link" href="#">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <!-- Fitur: Transaksi & Cetak Struk -->
         <li class="nav-item">
  <!-- Ubah tujuannya ke rute yang baru kita buat -->
  <a class="nav-link" href="{{ route('petugas.transaksi.create') }}">
    <i class="ti-layout-list-post menu-icon"></i>
    <span class="menu-title">Input Transaksi</span>
  </a>
</li>

          <!-- Fitur: Shift -->
          <li class="nav-item">
            <a class="nav-link" href="{{ route('petugas.shift.index') }}">
              <i class="ti-timer menu-icon"></i>
              <span class="menu-title">Riwayat Shift</span>
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
          
          <!-- Banner Petugas (DIUBAH: Menggunakan gradasi Biru Skydash) -->
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card" style="background: linear-gradient(to right, #4B49AC, #7DA7F8); color: white; border-radius: 10px;">
                <div class="card-body d-flex justify-content-between align-items-center p-4">
                  <div>
                    <h2 class="font-weight-bold">Semangat Kerja, Petugas!</h2>
                    <p class="mb-0">Pastikan plat nomor kendaraan diinput dengan benar.</p>
                  </div>
                  <div class="badge badge-light p-2 text-dark font-weight-bold">
                    Shift Aktif: 08:00 - 16:00
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Form Transaksi Cepat -->
          <div class="row">
            <div class="col-md-5 grid-margin stretch-card">
              <div class="card shadow-sm border-0">
                <div class="card-body">
                  <h4 class="card-title text-primary"><i class="ti-plus mr-2"></i>Parkir Masuk Baru</h4>
                  <form action="{{ route('petugas.parkir.masuk') }}" method="POST">
  @csrf {{-- Wajib ada agar tidak error 419 --}}
  
  <div class="form-group">
    <label>Nomor Plat Kendaraan</label>
    <!-- Ditambahkan atribut name="plat_nomor" dan required -->
    <input type="text" name="plat_nomor" class="form-control form-control-lg text-uppercase font-weight-bold" placeholder="Contoh: B 1234 ABC" required>
  </div>
  
  <div class="form-group">
    <label>Jenis Kendaraan</label>
    <!-- Ditambahkan atribut name="jenis_kendaraan" dan value di setiap option -->
    <select name="jenis_kendaraan" class="form-control" required>
      <option value="Motor">Motor</option>
      <option value="Mobil">Mobil</option>
      <option value="Truk/Bus">Truk/Bus</option>
    </select>
  </div>
  
  <button type="submit" class="btn btn-primary btn-block font-weight-bold text-white">SIMPAN & CETAK STRUK</button>
</form>

                </div>
              </div>
            </div>

            <!-- Stats Ringkas -->
            <div class="col-md-7 grid-margin">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body text-center">
                      <p class="mb-4">Kendaraan Masuk (Shift Ini)</p>
                      <h2 class="fs-30 mb-2">24</h2>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body text-center">
                      <p class="mb-4">Total Uang di Kasir</p>
                      <h2 class="fs-30 mb-2">Rp 120,000</h2>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Tabel Kendaraan Masuk Terakhir -->
              <div class="card shadow-sm">
                <div class="card-body p-3">
                  <p class="card-title mb-2">Parkir Terkini</p>
                  <div class="table-responsive">
                    <table class="table table-striped table-sm">
                      <thead>
                        <tr>
                          <th>Jam</th>
                          <th>Plat</th>
                          <th>Jenis</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>14:05</td>
                          <td><b>B 9901 ZZZ</b></td>
                          <td>Mobil</td>
                          <td><button class="btn btn-xs btn-outline-primary"><i class="ti-printer"></i></button></td>
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
