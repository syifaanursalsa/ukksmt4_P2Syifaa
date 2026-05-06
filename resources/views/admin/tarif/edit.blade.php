<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin - Edit Tarif</title>
  <!-- CSS Skydash -->
  <link rel="stylesheet" href="{{ asset('asset/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/vertical-layout-light/style.css') }}">
</head>
<body>
  <div class="container-scroller">
    <!-- Konten Utama -->
    <div class="main-panel w-100">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-6 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5 shadow rounded">
              <h4 class="font-weight-bold text-primary">Edit Tarif Parkir</h4>
              <p class="font-weight-light text-muted">Silakan ubah nominal tarif untuk kendaraan <b>{{ $tarif->jenis_kendaraan }}</b></p>
              
              <form action="{{ route('admin.tarif.update', $tarif->id_tarif) }}" method="POST" class="pt-3">
                @csrf
                @method('PUT') {{-- PENTING: Untuk proses Update --}}

                <div class="form-group">
                  <label>Jenis Kendaraan</label>
                  <input type="text" name="jenis_kendaraan" class="form-control" value="{{ $tarif->jenis_kendaraan }}" required>
                </div>

                <div class="form-group">
                  <label>Tarif Per Jam (Rp)</label>
                  <input type="number" name="tarif_per_jam" class="form-control" value="{{ $tarif->tarif_per_jam }}" required>
                  <small class="text-muted">Masukkan angka saja tanpa titik (Contoh: 5000)</small>
                </div>

                <div class="mt-4">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium shadow">SIMPAN PERUBAHAN</button>
                  <a href="{{ route('admin.tarif') }}" class="btn btn-block btn-light btn-lg mt-2">BATAL</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
