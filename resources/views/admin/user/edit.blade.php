<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin - Edit User</title>
  <link rel="stylesheet" href="{{ asset('asset/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/vertical-layout-light/style.css') }}">
</head>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-6 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5 shadow rounded">
              <h4 class="font-weight-bold text-primary">Edit User: {{ $user->nama_lengkap }}</h4>
              
              <form action="{{ route('admin.user.update', $user->id_user) }}" method="POST" class="pt-3">
                @csrf
                @method('PUT') <!-- Wajib untuk proses Update -->

                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" name="nama_lengkap" class="form-control" value="{{ $user->nama_lengkap }}" required>
                </div>

                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control" value="{{ $user->username }}" required>
                </div>

                <div class="form-group text-warning">
                  <small>*Kosongkan password jika tidak ingin diubah</small>
                </div>
                <div class="form-group">
                  <label>Password Baru</label>
                  <input type="password" name="password" class="form-control" placeholder="Isi hanya jika ingin ganti password">
                </div>

                <div class="form-group">
                  <label>Role</label>
                  <select name="role" class="form-control text-dark">
                    <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="Owner" {{ $user->role == 'Owner' ? 'selected' : '' }}>Owner</option>
                    <option value="Petugas" {{ $user->role == 'Petugas' ? 'selected' : '' }}>Petugas</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Status Akun</label>
                  <select name="status_aktif" class="form-control text-dark">
                    <option value="1" {{ $user->status_aktif == 1 ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ $user->status_aktif == 0 ? 'selected' : '' }}>Non-Aktif</option>
                  </select>
                </div>

                <div class="mt-4">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium shadow">UPDATE DATA</button>
                  <a href="{{ route('admin.user') }}" class="btn btn-block btn-light btn-lg mt-2">BATAL</a>
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
