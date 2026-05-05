<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// 1. Tampilan Dashboard (Halaman Utama)
Route::get('/', function () {
    return view('index');
})->name('dashboard');


// 1. TAMPILAN LOGIN
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// 2. PROSES LOGIKA LOGIN (PENGALIHAN ROLE)
Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'username' => ['required'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        
        $role = Auth::user()->role; 

        // Arahkan ke dashboard masing-masing sesuai folder
        if ($role == 'Admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($role == 'Owner') {
            return redirect()->route('owner.dashboard');
        } elseif ($role == 'Petugas') {
            return redirect()->route('petugas.dashboard');
        }

        return redirect('/');
    }

    return back()->withErrors(['username' => 'Username atau password salah.']);
});

// 3. DAFTAR ALAMAT DASHBOARD (Agar Error Route Not Found Hilang)

// --- DASHBOARD ADMIN ---
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard'); 
})->middleware('auth')->name('admin.dashboard');

Route::get('/admin/user', function () {
    return "Halaman Kelola User";
})->name('admin.user');


// --- DASHBOARD OWNER ---
Route::get('/owner/dashboard', function () {
    return view('owner.dashboard'); 
})->middleware('auth')->name('owner.dashboard');


// --- DASHBOARD PETUGAS ---
Route::get('/petugas/dashboard', function () {
    return view('petugas.dashboard'); 
})->middleware('auth')->name('petugas.dashboard');


// 4. PROSES LOGOUT (WAJIB ADA NAMANYA)
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');
