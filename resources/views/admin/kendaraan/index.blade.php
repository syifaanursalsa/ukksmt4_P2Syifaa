<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin - Kelola Kendaraan</title>
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
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.user') }}">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Kelola User</span>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('admin.kendaraan') }}">
              <i class="ti-car menu-icon"></i>
              <span class="menu-title">Kelola Kendaraan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
              <i class="ti-power-off menu-icon text-danger"></i>
              <span class="menu-title text-danger">Logout</span>
            </a>
          </li>
        </ul>
      </nav>

      <!-- KONTEN UTAMA -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <h3 class="font-weight-bold">Data Kendaraan</h3>
                    <a href="{{ route('admin.kendaraan.create') }}" class="btn btn-primary font-weight-bold shadow-sm">
                    <i class="ti-plus mr-2"></i> Tambah Kendaraan
                    </a>

              </div>
            </div>
          </div>

          <div class="card shadow-sm border-0">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover table-striped">
                  <thead>
                    <tr class="bg-primary text-white text-center">
                      <th>ID</th>
                      <th>Plat Nomor</th>
                      <th>Jenis Kendaraan</th>
                      <th>Warna</th>
                      <th>Pemilik</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    {{-- Robot @foreach untuk mengambil data dari tb_kendaraan --}}
                    @foreach($kendaraans as $k)
                    <tr>
                      <td class="text-center">{{ $k->id_kendaraan }}</td>
                      <td class="font-weight-bold text-primary">{{ $k->plat_nomor }}</td>
                      <td>{{ $k->jenis_kendaraan }}</td>
                      <td>{{ $k->warna }}</td>
                      <td>{{ $k->pemilik }}</td>
                     <td class="text-center">
  <!-- Tombol Edit yang sudah ada -->
  <a href="{{ route('admin.kendaraan.edit', $k->id_kendaraan) }}" class="btn btn-sm btn-info btn-icon d-inline-flex align-items-center justify-content-center">
    <i class="ti-pencil text-white"></i>
  </a>

  <!-- Tombol Hapus (Wajib pakai Form) -->
  <form action="{{ route('admin.kendaraan.delete', $k->id_kendaraan) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger btn-icon ml-1" onclick="return confirm('Apakah Anda yakin ingin menghapus data kendaraan ini?')">
      <i class="ti-trash"></i>
    </button>
  </form>
</td>

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
