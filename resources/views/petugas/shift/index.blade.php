<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Petugas - Riwayat Shift</title>
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
      <!-- 2. SIDEBAR -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <!-- Profil Petugas -->
          <li class="nav-item p-3">
             <div class="d-flex align-items-center">
                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mr-2" style="width: 40px; height: 40px; font-weight: bold;">P</div>
                <div>
                   <p class="mb-0 text-dark font-weight-bold" style="font-size: 13px;">Petugas Lapangan</p>
                   <small class="text-muted" style="font-size: 11px;">Shift Kerja</small>
                </div>
             </div>
          </li>

          <li class="nav-item nav-category" style="font-size: 10px; font-weight: bold;">OPERASIONAL</li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('petugas.dashboard') }}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('petugas.transaksi.create') }}">
              <i class="ti-layout-list-post menu-icon"></i>
              <span class="menu-title">Input Transaksi</span>
            </a>
          </li>

          <li class="nav-item active"> <!-- Menu Riwayat Shift Aktif Menyala Biru -->
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

      <!-- 3. KONTEN UTAMA TABLE SHIFT -->
      <div class="main-panel">
        <div class="content-wrapper">
          <h3 class="font-weight-bold text-dark">Riwayat Shift Kerja</h3>
          <p class="text-muted">Catatan jadwal kehadiran kerja kamu yang terdata di sistem database.</p>

          <div class="row mt-4">
            <div class="col-md-10 grid-margin stretch-card">
              <div class="card shadow-sm border-0">
                <div class="card-body">
                  <h4 class="card-title text-primary"><i class="ti-calendar mr-2"></i>Jadwal Kerja Kamu</h4>
                  <div class="table-responsive">
                    <table class="table table-hover table-striped">
                      <thead class="bg-primary text-white">
                        <tr>
                          <th>No</th>
                          <th>Tanggal Kerja</th>
                          <th>Jam Masuk</th>
                          <th>Jam Keluar</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($shifts as $index => $s)
                        <tr>
                          <td>{{ $index + 1 }}</td>
                          <!-- Menampilkan kolom tanggal dari user_shift -->
                          <td class="font-weight-bold text-dark">{{ date('d F Y', strtotime($s->tanggal)) }}</td>
                          <!-- Menampilkan kolom jam_masuk dari tabel shift -->
                          <td><label class="badge badge-outline-success font-weight-bold">{{ $s->jam_masuk }}</label></td>
                          <!-- Menampilkan kolom jam_keluar dari tabel shift -->
                          <td><label class="badge badge-outline-danger font-weight-bold">{{ $s->jam_keluar }}</label></td>
                        </tr>
                        @empty
                        <tr>
                          <td colspan="4" class="text-center text-muted p-4">
                            <i class="ti-info-alt d-block mb-2 style-font-size" style="font-size: 24px;"></i>
                            Belum ada riwayat jadwal shift kerja untuk akun kamu di database.
                          </td>
                        </tr>
                        @endforelse
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
  <script src="{{ asset('asset/js/template.js') }}"></script>
</body>
</html>
