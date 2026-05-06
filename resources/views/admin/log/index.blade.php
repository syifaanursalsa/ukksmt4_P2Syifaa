<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin - Log Aktivitas</title>
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
            <a class="nav-link" href="{{ route('admin.log') }}">
              <i class="ti-clipboard menu-icon"></i><span class="menu-title">Log Aktivitas</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
              <i class="ti-power-off menu-icon text-danger"></i><span class="menu-title text-danger">Logout</span>
            </a>
          </li>
        </ul>
      </nav>

      <!-- KONTEN UTAMA -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <h3 class="font-weight-bold">Riwayat Aktivitas Sistem</h3>
              <p class="text-muted">Menampilkan daftar log dari tabel tb_log_aktivitas.</p>
            </div>
          </div>

          <div class="card shadow-sm border-0">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover table-striped">
                  <thead>
                    <tr class="bg-dark text-white text-center">
                      <th>No</th>
                      <th>User ID</th>
                      <th>Aktivitas</th>
                      <th>Waktu Kejadian</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($logs as $index => $log)
                    <tr>
                      <td class="text-center">{{ $index + 1 }}</td>
                      <td class="text-center">
                        {{-- Jika ID User NULL, tampilkan 'Guest' --}}
                        <label class="badge badge-outline-secondary">{{ $log->id_user ?? 'Guest' }}</label>
                      </td>
                      <td class="font-weight-bold">
                        {{-- Logika warna untuk aksi tertentu --}}
                        @if(str_contains($log->aktivitas, 'Login'))
                          <i class="ti-unlock mr-2 text-success"></i>
                        @elseif(str_contains($log->aktivitas, 'Logout'))
                          <i class="ti-lock mr-2 text-danger"></i>
                        @endif
                        {{ $log->aktivitas }}
                      </td>
                      <td class="text-muted text-center">{{ $log->waktu_aktivitas }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
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
