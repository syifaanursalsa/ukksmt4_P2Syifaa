<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin - Kelola Area Parkir</title>
  <!-- CSS Skydash -->
  <link rel="stylesheet" href="{{ asset('asset/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/vertical-layout-light/style.css') }}">
  <link rel="shortcut icon" href="{{ asset('asset/images/favicon.png') }}" />
</head>
<body>
  <div class="container-scroller">
    <!-- NAVBAR -->
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
      <!-- SIDEBAR ADMIN -->
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
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.kendaraan') }}">
              <i class="ti-car menu-icon"></i>
              <span class="menu-title">Kelola Kendaraan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.tarif') }}">
              <i class="ti-money menu-icon"></i>
              <span class="menu-title">Kelola Tarif</span>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('admin.area') }}">
              <i class="ti-location-pin menu-icon"></i>
              <span class="menu-title">Kelola Area Parkir</span>
            </a>
          </li>
          
          <li class="nav-item nav-category" style="font-size: 10px; font-weight: bold; margin-top: 15px;">AKUN</li>
          <li class="nav-item">
            <!-- Logout mengarah ke Dashboard sesuai permintaanmu sebelumnya -->
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
              <i class="ti-power-off menu-icon text-danger"></i>
              <span class="menu-title text-danger">Logout</span>
            </a>
          </li>
        </ul>
      </nav>

      <!-- MAIN CONTENT -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h3 class="font-weight-bold text-dark">Data Area Parkir</h3>
                  <p class="text-muted">Manajemen kapasitas dan ketersediaan slot parkir.</p>
                </div>
                <a href="{{ route('admin.area.create') }}" class="btn btn-primary font-weight-bold shadow-sm">
                  <i class="ti-plus mr-2"></i> Tambah Area
                </a>
              </div>
            </div>
          </div>

          <!-- Tabel Area -->
          <div class="card shadow-sm border-0">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover table-striped">
                  <thead>
                    <tr class="bg-primary text-white text-center">
                      <th>ID</th>
                      <th>Nama Area</th>
                      <th>Kapasitas Total</th>
                      <th>Terisi Saat Ini</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($areas as $area)
                    <tr>
                      <td class="text-center">{{ $area->id_area }}</td>
                      <td class="font-weight-bold text-dark">{{ $area->nama_area }}</td>
                      <td class="text-center text-primary font-weight-bold">{{ $area->kapasitas }} Slot</td>
                      <td class="text-center">
                        <label class="badge badge-info">{{ $area->terisi }} Kendaraan</label>
                      </td>
                      <td class="text-center">
                        @if($area->terisi >= $area->kapasitas)
                           <span class="badge badge-danger">Penuh</span>
                        @else
                           <span class="badge badge-success">Tersedia</span>
                        @endif
                      </td>
                                        <td class="text-center">
                <!-- Tombol Edit yang sudah jadi -->
                <a href="{{ route('admin.area.edit', $area->id_area) }}" class="btn btn-sm btn-info btn-icon d-inline-flex align-items-center justify-content-center">
                    <i class="ti-pencil text-white"></i>
                </a>

                <!-- Tombol Hapus (Wajib pakai Form) -->
                <form action="{{ route('admin.area.delete', $area->id_area) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger btn-icon ml-1" onclick="return confirm('Apakah Anda yakin ingin menghapus area parkir ini?')">
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

  <!-- Script Skydash -->
  <script src="{{ asset('asset/vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('asset/js/off-canvas.js') }}"></script>
  <script src="{{ asset('asset/js/template.js') }}"></script>
</body>
</html>
