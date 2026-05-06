<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Owner - Rekap Transaksi</title>
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
      <!-- 2. SIDEBAR OWNER -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('owner.dashboard') }}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('owner.rekap') }}">
              <i class="ti-bar-chart menu-icon"></i>
              <span class="menu-title">Rekap Transaksi</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('owner.dashboard') }}">
              <i class="ti-power-off menu-icon text-danger"></i>
              <span class="menu-title text-danger">Logout</span>
            </a>
          </li>
        </ul>
      </nav>

      <!-- 3. KONTEN UTAMA -->
      <div class="main-panel">
        <div class="content-wrapper">
          
          <div class="row">
            <div class="col-md-12 grid-margin">
              <h3 class="font-weight-bold">Rekap Transaksi Parkir</h3>
              <p class="text-muted">Pantau pendapatan berdasarkan waktu yang Anda tentukan.</p>
            </div>
          </div>

          <!-- Form Filter Waktu -->
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card shadow-sm border-0">
                <div class="card-body">
                  <h4 class="card-title">Filter Laporan</h4>
                  <form action="{{ route('owner.rekap') }}" method="GET" class="form-inline">
                    <input type="date" name="tgl_mulai" class="form-control mb-2 mr-sm-2" value="{{ request('tgl_mulai') }}">
                    <div class="mb-2 mr-sm-2 text-muted">sampai</div>
                    <input type="date" name="tgl_selesai" class="form-control mb-2 mr-sm-2" value="{{ request('tgl_selesai') }}">
                    <button type="submit" class="btn btn-primary mb-2 shadow-sm">Cari Data</button>
                    <a href="{{ route('owner.rekap') }}" class="btn btn-light mb-2 ml-2">Reset</a>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- Ringkasan Pendapatan -->
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card bg-facebook text-white">
                <div class="card-body text-center p-4">
                  <p class="mb-2">Total Pendapatan Terfilter</p>
                  <h1 class="display-4 font-weight-bold">Rp {{ number_format($total_pendapatan ?? 0, 0, ',', '.') }}</h1>
                </div>
              </div>
            </div>
          </div>

          <!-- Tabel Rekap -->
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card shadow-sm border-0">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover table-striped">
                      <thead>
                        <tr class="bg-primary text-white text-center">
                          <th>No</th>
                          <th>Waktu Keluar</th>
                          <th>Plat Nomor</th>
                          <th>Jenis</th>
                          <th>Durasi</th>
                          <th>Biaya Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($rekap as $index => $data)
                        <tr>
                          <td class="text-center">{{ $index + 1 }}</td>
                          <td class="text-muted">{{ $data->waktu_keluar }}</td>
                          <td class="font-weight-bold text-primary">{{ $data->plat_nomor }}</td>
                          <td>{{ $data->jenis_kendaraan }}</td>
                          <td class="text-center">{{ $data->durasi_jam }} Jam</td>
                          <td class="font-weight-bold text-success text-right">
                            Rp {{ number_format($data->biaya_total, 0, ',', '.') }}
                          </td>
                        </tr>
                        @empty
                        <tr>
                          <td colspan="6" class="text-center text-muted py-5">
                            <i class="ti-info-alt d-block mb-3" style="font-size: 30px;"></i>
                            Data transaksi tidak ditemukan pada rentang waktu ini.
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
  <script src="{{ asset('asset/js/off-canvas.js') }}"></script>
  <script src="{{ asset('asset/js/template.js') }}"></script>
</body>

</html>
