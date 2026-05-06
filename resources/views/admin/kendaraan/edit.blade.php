<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin - Edit Kendaraan</title>
  <link rel="stylesheet" href="{{ asset('asset/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/vertical-layout-light/style.css') }}">
</head>
<body>
  <div class="container-scroller">
    <div class="main-panel w-100">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-6 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5 shadow rounded">
              <h4 class="font-weight-bold text-primary">Edit Data Kendaraan</h4>
              <p class="font-weight-light">Ubah informasi kendaraan <b>{{ $kendaraan->plat_nomor }}</b></p>
              
              <form action="{{ route('admin.kendaraan.update', $kendaraan->id_kendaraan) }}" method="POST" class="pt-3">
                @csrf
                @method('PUT')

                <div class="form-group">
                  <label>Plat Nomor</label>
                  <input type="text" name="plat_nomor" class="form-control text-uppercase" value="{{ $kendaraan->plat_nomor }}" required>
                </div>

                <div class="form-group">
                  <label>Jenis Kendaraan</label>
                  <select name="jenis_kendaraan" class="form-control text-dark">
                    <option value="Motor" {{ $kendaraan->jenis_kendaraan == 'Motor' ? 'selected' : '' }}>Motor</option>
                    <option value="Mobil" {{ $kendaraan->jenis_kendaraan == 'Mobil' ? 'selected' : '' }}>Mobil</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Warna</label>
                  <input type="text" name="warna" class="form-control" value="{{ $kendaraan->warna }}" required>
                </div>

                <div class="form-group">
                  <label>Pemilik</label>
                  <input type="text" name="pemilik" class="form-control" value="{{ $kendaraan->pemilik }}" required>
                </div>

                <div class="mt-4">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium shadow">SIMPAN PERUBAHAN</button>
                  <a href="{{ route('admin.kendaraan') }}" class="btn btn-block btn-light btn-lg mt-2">BATAL</a>
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
