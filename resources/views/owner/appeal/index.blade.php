<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Owner - Daftar Pengajuan</title>
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
            <a class="nav-link" href="{{ route('owner.dashboard') }}"><i class="icon-grid menu-icon"></i><span class="menu-title">Dashboard</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('owner.rekap') }}"><i class="ti-receipt menu-icon"></i><span class="menu-title">Rekap Transaksi</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('owner.pengajuan') }}"><i class="ti-email menu-icon"></i><span class="menu-title">Daftar Pengajuan</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('owner.dashboard') }}"><i class="ti-power-off menu-icon text-danger"></i><span class="menu-title text-danger">Logout</span></a>
          </li>
        </ul>
      </nav>

      <!-- KONTEN -->
      <div class="main-panel">
        <div class="content-wrapper">
          <h3 class="font-weight-bold text-dark">Daftar Pengajuan</h3>
          <p class="text-muted">Tinjau dan proses permohonan dari petugas/admin.</p>

          @if(session('sukses'))
            <div class="alert alert-success">{{ session('sukses') }}</div>
          @endif

          <div class="card shadow-sm border-0">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover table-striped">
                  <thead class="bg-primary text-white">
                    <tr>
                      <th>Waktu</th>
                      <th>Pengaju</th>
                      <th>Judul</th>
                      <th>Deskripsi</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($pengajuans as $p)
                    <tr>
                      <!-- 1. DISESUAIKAN: Menggunakan created_at sesuai database -->
                      <td>{{ $p->created_at }}</td>
                      <td class="font-weight-bold">{{ $p->pengaju }}</td>
                      <!-- 2. DISESUAIKAN: Diubah dari perihal menjadi judul -->
                      <td>{{ $p->judul }}</td>
                      <!-- 3. DITAMBAHKAN: Kolom deskripsi pengajuan -->
                      <td>{{ $p->deskripsi }}</td>
                      <td>
                        <!-- 4. DISESUAIKAN: Pengecekan status huruf kecil sesuai phpMyAdmin -->
                        @if($p->status == 'proses')
                          <label class="badge badge-warning">Proses</label>
                        @elseif($p->status == 'selesai')
                          <label class="badge badge-success">Selesai</label>
                        @else
                          <label class="badge badge-secondary">{{ $p->status }}</label>
                        @endif
                      </td>
                      <td>
                        @if($p->status == 'proses')
                          <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalProses{{ $p->id_appeal }}">Proses</button>
                        @else
                          <small class="text-muted">Sudah diproses</small>
                        @endif
                      </td>
                    </tr>

                    <!-- Modal Proses -->
                    <div class="modal fade" id="modalProses{{ $p->id_appeal }}" tabindex="-1" role="dialog">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <form action="{{ route('owner.pengajuan.status', $p->id_appeal) }}" method="POST">
                            @csrf
                            <div class="modal-header">
                              <h5 class="modal-title">Proses Pengajuan</h5>
                              <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            </div>
                            <div class="modal-body">
                              <!-- 5. DISESUAIKAN: Menampilkan isi deskripsi pengajuan di modal -->
                              <p><b>Isi Pengajuan:</b><br>{{ $p->deskripsi }}</p>
                              <div class="form-group">
                                <label>Keputusan</label>
                                <select name="status" class="form-control text-dark" required>
                                  <option value="selesai">Selesaikan</option>
                                  <option value="proses">Biarkan Proses</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Catatan Owner (Balasan)</label>
                                <textarea name="keterangan_owner" class="form-control" rows="3" required>{{ $p->balasan }}</textarea>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary">Simpan Keputusan</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    @empty
                    <tr><td colspan="6" class="text-center">Belum ada pengajuan.</td></tr>
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

  <script src="{{ asset('asset/vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('asset/js/template.js') }}"></script>
</body>
</html>
