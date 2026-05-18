<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm() {
        return view('auth.login');
    }

    // Proses Login
    public function login(Request $request) {
        // 1. Validasi input: Sesuaikan dengan 'username' bukan 'email'
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // 2. Cek user ke database tb_user
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Ambil role user yang baru login
            $role = Auth::user()->role; 

            // 3. Pengalihan halaman (Redirect) sesuai Role Parkir
            if ($role == 'Admin') {
                return redirect()->intended('/admin/dashboard');
            } 
            
            if ($role == 'Owner') {
                return redirect()->intended('/owner/dashboard');
            } 
            
            if ($role == 'Petugas') {
                return redirect()->intended('/petugas/dashboard');
            }

            // Default jika role tidak ditemukan
            return redirect()->intended('/');
        }

        // Jika login gagal
        return back()->withErrors(['username' => 'Username atau password salah.']);
    }

    // Proses Keluar (Logout)
    public function logout(Request $request) 
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
