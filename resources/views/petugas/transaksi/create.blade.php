<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Petugas - Input Transaksi</title>
  <link rel="stylesheet" href="{{ asset('asset/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/vertical-layout-light/style.css') }}">
</head>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
      
      <!-- SIDEBAR -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('petugas.dashboard') }}"><i class="icon-grid menu-icon"></i><span class="menu-title">Dashboard</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('petugas.transaksi.create') }}"><i class="ti-layout-list-post menu-icon"></i><span class="menu-title">Input Transaksi</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="ti-timer menu-icon"></i><span class="menu-title">Riwayat Shift</span></a>
          </li>
          <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display: none;">@csrf</form>
            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="ti-power-off menu-icon"></i><span class="menu-title">Logout</span></a>
          </li>
        </ul>
      </nav>

      <!-- KONTEN FORM INPUT TRANSAKSI -->
      <div class="main-panel">
        <div class="content-wrapper">
          <h3 class="font-weight-bold text-dark">Input Kendaraan Masuk</h3>
          <p class="text-muted">Gunakan form ini untuk mencatat karcis parkir baru.</p>

          @if(session('sukses'))
            <div class="alert alert-success">{{ session('sukses') }}</div>
          @endif

          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card shadow-sm border-0">
                <div class="card-body">
                  <h4 class="card-title text-primary"><i class="ti-plus mr-2"></i>Parkir Masuk Baru</h4>
                  <form action="{{ route('petugas.parkir.masuk') }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                      <label>Nomor Plat Kendaraan</label>
                      <input type="text" name="plat_nomor" class="form-control form-control-lg text-uppercase font-weight-bold" placeholder="Contoh: B 1234 ABC" required>
                    </div>
                    
                    <div class="form-group">
                      <label>Jenis Kendaraan</label>
                      <select name="jenis_kendaraan" class="form-control" required>
                        <option value="Motor">Motor</option>
                        <option value="Mobil">Mobil</option>
                      </select>
                    </div>

                    <!-- BARU: Input Warna Kendaraan -->
                    <div class="form-group">
                      <label>Warna Kendaraan (Opsional)</label>
                      <input type="text" name="warna" class="form-control" placeholder="Contoh: Hitam / Biru">
                    </div>

                    <!-- BARU: Input Nama Pemilik -->
                    <div class="form-group">
                      <label>Nama Pemilik (Opsional)</label>
                      <input type="text" name="pemilik" class="form-control" placeholder="Contoh : nana ">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block font-weight-bold text-white">SIMPAN & CETAK STRUK</button>
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
  <script src="{{ asset('asset/js/template.js') }}"></script>
</body>
</html>
