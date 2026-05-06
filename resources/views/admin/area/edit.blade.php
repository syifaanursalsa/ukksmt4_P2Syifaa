<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin - Edit Area</title>
  <!-- CSS Skydash (Pastikan alamat folder asset kamu benar) -->
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
              <h4 class="font-weight-bold text-primary">Edit Area Parkir</h4>
              <p class="font-weight-light">Mengubah informasi area: <b>{{ $area->nama_area }}</b></p>
              
              <form action="{{ route('admin.area.update', $area->id_area) }}" method="POST" class="pt-3">
                @csrf
                @method('PUT') {{-- Wajib untuk proses Update --}}

                <div class="form-group">
                  <label>Nama Area</label>
                  <input type="text" name="nama_area" class="form-control" value="{{ $area->nama_area }}" required>
                </div>

                <div class="form-group">
                  <label>Kapasitas Total (Slot)</label>
                  <input type="number" name="kapasitas" class="form-control" value="{{ $area->kapasitas }}" required>
                </div>

                <div class="mt-4">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium shadow">UPDATE AREA</button>
                  <a href="{{ route('admin.area') }}" class="btn btn-block btn-light btn-lg mt-2">BATAL</a>
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
