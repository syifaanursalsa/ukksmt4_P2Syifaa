<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin - Kelola User</title>
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
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('admin.user') }}">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Kelola User</span>
            </a>
          </li>
          <li class="nav-item nav-category" style="font-size: 10px; font-weight: bold; margin-top: 15px;">KEMBALI</li>
          <li class="nav-item">
            <!-- Logout ini mengarah ke Dashboard Admin sesuai permintaanmu -->
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
              <i class="ti-power-off menu-icon text-danger"></i>
              <span class="menu-title text-danger">Logout</span>
            </a>
          </li>
        </ul>
      </nav>

      <!-- KONTEN UTAMA (Yang Tadi Kosong) -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <h3 class="font-weight-bold text-dark">Daftar Pengguna</h3>
                <a href="{{ route('admin.user.create') }}" class="btn btn-primary font-weight-bold shadow-sm">
                  <i class="ti-plus mr-2"></i>Tambah User
                </a>
              </div>
            </div>
          </div>

          <div class="card shadow-sm border-0">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover table-striped">
                  <thead>
                    <tr class="bg-light">
                      <th>ID</th>
                      <th>Nama Lengkap</th>
                      <th>Username</th>
                      <th>Role</th>
                      <th>Status</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                    <tr>
                      <td>{{ $user->id_user }}</td>
                      <td class="font-weight-bold">{{ $user->nama_lengkap }}</td>
                      <td>{{ $user->username }}</td>
                      <td>
                        @if($user->role == 'Admin')
                          <label class="badge badge-primary px-3">Admin</label>
                        @elseif($user->role == 'Owner')
                          <label class="badge badge-success px-3">Owner</label>
                        @else
                          <label class="badge badge-warning px-3 text-white">Petugas</label>
                        @endif
                      </td>
                      <td>
                        @if($user->status_aktif == 1)
                          <span class="text-success font-weight-bold">Aktif</span>
                        @else
                          <span class="text-danger font-weight-bold">Non-Aktif</span>
                        @endif
                      </td>
                     <td class="text-center">
                <!-- Ganti button jadi tag <a> agar bisa pindah halaman -->
                <a href="{{ route('admin.user.edit', $user->id_user) }}" class="btn btn-sm btn-info btn-icon d-inline-flex align-items-center justify-content-center">
                  <i class="ti-pencil text-white"></i>
                </a>
                
                <!-- Tombol Hapus (Nanti kita fungsikan juga) -->
               <form action="{{ route('admin.user.delete', $user->id_user) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger btn-icon ml-1" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
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
      <!-- END KONTEN UTAMA -->
    </div>
  </div>

  <script src="{{ asset('asset/vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('asset/js/off-canvas.js') }}"></script>
  <script src="{{ asset('asset/js/template.js') }}"></script>
</body>
</html>
