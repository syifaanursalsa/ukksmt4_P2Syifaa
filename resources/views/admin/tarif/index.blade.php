<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin - Kelola Tarif</title>
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
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.kendaraan') }}">
              <i class="ti-car menu-icon"></i>
              <span class="menu-title">Kelola Kendaraan</span>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('admin.tarif') }}">
              <i class="ti-money menu-icon"></i>
              <span class="menu-title">Kelola Tarif</span>
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
                <h3 class="font-weight-bold">Pengaturan Tarif Parkir</h3>
                <a href="{{ route('admin.tarif.create') }}" class="btn btn-primary font-weight-bold shadow-sm">
                  <i class="ti-plus mr-2"></i> Tambah Tarif
                </a>
              </div>
            </div>
          </div>

          <div class="card shadow-sm border-0">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover table-striped">
                  <thead>
                    <tr class="bg-primary text-white">
                      <th>No</th>
                      <th>Jenis Kendaraan</th>
                      <th>Biaya (IDR)</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($tarifs as $index => $t)
                    <tr>
                      <td>{{ $index + 1 }}</td>
                      <td class="font-weight-bold">{{ $t->jenis_kendaraan }}</td>
                      <td class="text-success font-weight-bold">
                        {{-- PERBAIKAN: Menggunakan tarif_per_jam sesuai nama kolom di database --}}
                        Rp {{ number_format($t->tarif_per_jam, 0, ',', '.') }}
                      </td>
                      <td class="text-center">
                        <a href="{{ route('admin.tarif.edit', $t->id_tarif) }}" class="btn btn-sm btn-info btn-icon d-inline-flex align-items-center justify-content-center">
                          <i class="ti-pencil text-white"></i>
                        </a>
                        <form action="{{ route('admin.tarif.delete', $t->id_tarif) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger btn-icon ml-1" onclick="return confirm('Yakin hapus tarif ini?')">
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
