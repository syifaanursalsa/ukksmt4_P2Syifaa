<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User; 
use App\Models\Tarif;

// --- 1. HALAMAN UMUM & LOGIN ---
Route::get('/', function () {
    return view('index');
})->name('dashboard');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'username' => ['required'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        $role = Auth::user()->role; 

        if ($role == 'Admin') return redirect()->route('admin.dashboard');
        if ($role == 'Owner') return redirect()->route('owner.dashboard');
        if ($role == 'Petugas') return redirect()->route('petugas.dashboard');
        
        return redirect('/');
    }
    return back()->withErrors(['username' => 'Username atau password salah.']);
});

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');


// --- 2. GRUP ADMIN (HANYA BISA DIAKSES SETELAH LOGIN) ---
Route::middleware('auth')->group(function () {
    
    // Dashboard Admin
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard'); 
    })->name('admin.dashboard');

    // --- MANAJEMEN USER ---
    Route::get('/admin/user', function () {
        $users = User::all();
        return view('admin.user.index', compact('users')); 
    })->name('admin.user');

    Route::get('/admin/user/create', function () {
        return view('admin.user.create'); 
    })->name('admin.user.create');

    Route::post('/admin/user/store', function (Request $request) {
        User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'status_aktif' => $request->status_aktif,
        ]);
        return redirect()->route('admin.user')->with('sukses', 'User berhasil ditambahkan!');
    })->name('admin.user.store');

    Route::get('/admin/user/edit/{id}', function ($id) {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    })->name('admin.user.edit');

    Route::put('/admin/user/update/{id}', function (Request $request, $id) {
        $user = User::findOrFail($id);
        $data = $request->only(['nama_lengkap', 'username', 'role', 'status_aktif']);
        if ($request->password) $data['password'] = bcrypt($request->password);
        $user->update($data);
        return redirect()->route('admin.user')->with('sukses', 'Data berhasil diubah!');
    })->name('admin.user.update');

    Route::delete('/admin/user/delete/{id}', function ($id) {
        User::findOrFail($id)->delete();
        return redirect()->route('admin.user')->with('sukses', 'User berhasil dihapus!');
    })->name('admin.user.delete');


    // --- MANAJEMEN KENDARAAN ---
    Route::get('/admin/kendaraan', function () {
        $kendaraans = DB::table('tb_kendaraan')->get(); 
        return view('admin.kendaraan.index', compact('kendaraans'));
    })->name('admin.kendaraan');

    Route::get('/admin/kendaraan/create', function () {
        return view('admin.kendaraan.create'); 
    })->name('admin.kendaraan.create');

    Route::post('/admin/kendaraan/store', function (Request $request) {
        DB::table('tb_kendaraan')->insert([
            'plat_nomor' => $request->plat_nomor,
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'warna' => $request->warna,
            'pemilik' => $request->pemilik,
            'id_user' => Auth::user()->id_user,
        ]);
        return redirect()->route('admin.kendaraan')->with('sukses', 'Kendaraan didaftarkan!');
    })->name('admin.kendaraan.store');

    Route::get('/admin/kendaraan/edit/{id}', function ($id) {
        $kendaraan = DB::table('tb_kendaraan')->where('id_kendaraan', $id)->first();
        return view('admin.kendaraan.edit', compact('kendaraan'));
    })->name('admin.kendaraan.edit');

    Route::put('/admin/kendaraan/update/{id}', function (Request $request, $id) {
        DB::table('tb_kendaraan')->where('id_kendaraan', $id)->update([
            'plat_nomor' => $request->plat_nomor,
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'warna' => $request->warna,
            'pemilik' => $request->pemilik,
        ]);
        return redirect()->route('admin.kendaraan')->with('sukses', 'Data diupdate!');
    })->name('admin.kendaraan.update');

    Route::delete('/admin/kendaraan/delete/{id}', function ($id) {
        DB::table('tb_kendaraan')->where('id_kendaraan', $id)->delete();
        return redirect()->route('admin.kendaraan')->with('sukses', 'Data dihapus!');
    })->name('admin.kendaraan.delete');


    // --- MANAJEMEN TARIF (SESUAI DATABASE TB_TARIF) ---
    Route::get('/admin/tarif', function () {
        $tarifs = Tarif::all(); 
        return view('admin.tarif.index', compact('tarifs'));
    })->name('admin.tarif');

    Route::get('/admin/tarif/create', function () {
        return view('admin.tarif.create');
    })->name('admin.tarif.create');

    Route::post('/admin/tarif/store', function (Request $request) {
        Tarif::create([
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'tarif_per_jam' => $request->tarif_per_jam, // Sesuai nama kolom di gambar kamu
        ]);
        return redirect()->route('admin.tarif')->with('sukses', 'Tarif ditambahkan!');
    })->name('admin.tarif.store');

});

// --- 3. DASHBOARD LAINNYA ---
Route::get('/owner/dashboard', function () { return view('owner.dashboard'); })->middleware('auth')->name('owner.dashboard');
Route::get('/petugas/dashboard', function () { return view('petugas.dashboard'); })->middleware('auth')->name('petugas.dashboard');

// --- MANAJEMEN TARIF ---
Route::get('/admin/tarif', function () {
    $tarifs = App\Models\Tarif::all(); 
    return view('admin.tarif.index', compact('tarifs'));
})->name('admin.tarif');

Route::get('/admin/tarif/create', function () {
    return view('admin.tarif.create');
})->name('admin.tarif.create');

Route::post('/admin/tarif/store', function (Request $request) {
    App\Models\Tarif::create([
        'jenis_kendaraan' => $request->jenis_kendaraan,
        'tarif_per_jam' => $request->tarif_per_jam,
    ]);
    return redirect()->route('admin.tarif')->with('sukses', 'Tarif ditambahkan!');
})->name('admin.tarif.store');

// TAMBAHKAN INI UNTUK EDIT
Route::get('/admin/tarif/edit/{id}', function ($id) {
    $tarif = App\Models\Tarif::findOrFail($id);
    return view('admin.tarif.edit', compact('tarif'));
})->name('admin.tarif.edit');

// TAMBAHKAN INI UNTUK UPDATE
Route::put('/admin/tarif/update/{id}', function (Request $request, $id) {
    $tarif = App\Models\Tarif::findOrFail($id);
    $tarif->update([
        'jenis_kendaraan' => $request->jenis_kendaraan,
        'tarif_per_jam' => $request->tarif_per_jam,
    ]);
    return redirect()->route('admin.tarif')->with('sukses', 'Tarif diupdate!');
})->name('admin.tarif.update');

// TAMBAHKAN INI UNTUK DELETE
Route::delete('/admin/tarif/delete/{id}', function ($id) {
    App\Models\Tarif::findOrFail($id)->delete();
    return redirect()->route('admin.tarif')->with('sukses', 'Tarif dihapus!');
})->name('admin.tarif.delete');

// Halaman Form Tambah Tarif
Route::get('/admin/tarif/create', function () {
    return view('admin.tarif.create');
})->name('admin.tarif.create');



Route::post('/admin/tarif/store', function (Illuminate\Http\Request $request) {
    // 1. Bersihkan titik (.) dari inputan biaya agar menjadi angka murni
    // Contoh: '89.000' menjadi '89000'
    $tarifBersih = str_replace('.', '', $request->tarif_per_jam);

    // 2. Simpan ke database
    App\Models\Tarif::create([
        'jenis_kendaraan' => $request->jenis_kendaraan,
        'tarif_per_jam' => $tarifBersih,
    ]);
    
    return redirect()->route('admin.tarif')->with('sukses', 'Tarif berhasil ditambahkan!');
})->name('admin.tarif.store');

// --- MANAJEMEN AREA PARKIR ---
Route::get('/admin/area', function () {
    $areas = DB::table('tb_area_parkir')->get(); 
    return view('admin.area.index', compact('areas'));
})->name('admin.area');

// Route Tambah Area
Route::get('/admin/area/create', function () {
    return view('admin.area.create');
})->name('admin.area.create');

// Proses Simpan Area
Route::post('/admin/area/store', function (Illuminate\Http\Request $request) {
    DB::table('tb_area_parkir')->insert([
        'nama_area' => $request->nama_area,
        'kapasitas' => $request->kapasitas,
        'lokasi'    => $request->lokasi,
    ]);
    return redirect()->route('admin.area')->with('sukses', 'Area parkir berhasil ditambahkan!');
})->name('admin.area.store');

// Proses Simpan Area
Route::post('/admin/area/store', function (Illuminate\Http\Request $request) {
    DB::table('tb_area_parkir')->insert([
        'nama_area' => $request->nama_area,
        'kapasitas' => $request->kapasitas,
        'terisi'    => 0, // Set default 0 karena area baru masih kosong
    ]);
    
    return redirect()->route('admin.area')->with('sukses', 'Area parkir berhasil ditambahkan!');
})->name('admin.area.store');

// Halaman Edit Area Parkir
Route::get('/admin/area/edit/{id}', function ($id) {
    $area = DB::table('tb_area_parkir')->where('id_area', $id)->first();
    return view('admin.area.edit', compact('area'));
})->name('admin.area.edit');

// Proses Update Area Parkir
Route::put('/admin/area/update/{id}', function (Illuminate\Http\Request $request, $id) {
    DB::table('tb_area_parkir')->where('id_area', $id)->update([
        'nama_area' => $request->nama_area,
        'kapasitas' => $request->kapasitas,
        // Kolom 'terisi' biasanya tidak diubah manual di sini
    ]);
    return redirect()->route('admin.area')->with('sukses', 'Data area berhasil diperbarui!');
})->name('admin.area.update');

// Route untuk proses hapus area parkir
Route::delete('/admin/area/delete/{id}', function ($id) {
    DB::table('tb_area_parkir')->where('id_area', $id)->delete();

    return redirect()->route('admin.area')->with('sukses', 'Area parkir berhasil dihapus!');
})->name('admin.area.delete');

// Route Log Aktivitas
Route::get('/admin/log', function () {
    // Mengambil data log terbaru (yang paling baru di atas)
    $logs = DB::table('tb_log_aktivitas')
            ->orderBy('id_log', 'desc')
            ->get(); 
    return view('admin.log.index', compact('logs'));
})->name('admin.log');

// --- GROUP OWNER ---
Route::middleware('auth')->group(function () {
    Route::get('/owner/dashboard', function () {
        return view('owner.dashboard'); 
    })->name('owner.dashboard');

    // FITUR UTAMA: Rekap Transaksi
    Route::get('/owner/rekap', function (Illuminate\Http\Request $request) {
        $query = DB::table('tb_transaksi')
            ->join('tb_kendaraan', 'tb_transaksi.id_kendaraan', '=', 'tb_kendaraan.id_kendaraan')
            ->select('tb_transaksi.*', 'tb_kendaraan.plat_nomor', 'tb_kendaraan.jenis_kendaraan');

        // Logika Filter Waktu yang Diminta
        if ($request->tgl_mulai && $request->tgl_selesai) {
            $query->whereBetween('waktu_keluar', [$request->tgl_mulai . ' 00:00:00', $request->tgl_selesai . ' 23:59:59']);
        }

        $rekap = $query->orderBy('waktu_keluar', 'desc')->get();
        $total_pendapatan = $rekap->sum('total_bayar');

        return view('owner.rekap.index', compact('rekap', 'total_pendapatan'));
    })->name('owner.rekap');
});

Route::get('/owner/rekap', function (Illuminate\Http\Request $request) {
    $query = DB::table('tb_transaksi')
        ->join('tb_kendaraan', 'tb_transaksi.id_kendaraan', '=', 'tb_kendaraan.id_kendaraan')
        ->select('tb_transaksi.*', 'tb_kendaraan.plat_nomor', 'tb_kendaraan.jenis_kendaraan');

    // Filter Tanggal
    if ($request->tgl_mulai && $request->tgl_selesai) {
        $query->whereBetween('waktu_keluar', [$request->tgl_mulai . ' 00:00:00', $request->tgl_selesai . ' 23:59:59']);
    }

    $rekap = $query->orderBy('waktu_keluar', 'desc')->get();
    
    // PERBAIKAN: Gunakan kolom biaya_total
    $total_pendapatan = $rekap->sum('biaya_total');

    return view('owner.rekap.index', compact('rekap', 'total_pendapatan'));
})->name('owner.rekap');




