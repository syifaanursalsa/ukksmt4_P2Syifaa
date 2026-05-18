<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PetugasController extends Controller
{
    public function dashboard(): View
    {
        return view('petugas.dashboard');
    }

    // Membuka halaman form transaksi baru
    public function create(): View
    {
        return view('petugas.transaksi.create');
    }

    // Memproses penyimpanan kendaraan masuk ke database
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'plat_nomor' => 'required',
            'jenis_kendaraan' => 'required'
        ]);

        $plat = strtoupper($request->plat_nomor);

        // 1. Ambil data id_tarif berdasarkan jenis kendaraan (Motor / Mobil)
        $tarif = DB::table('tb_tarif')->where('jenis_kendaraan', $request->jenis_kendaraan)->first();
        $id_tarif = $tarif ? $tarif->id_tarif : 1; 

        // 2. Ambil data id_area parkir yang tersedia secara otomatis dari tb_area_parkir
        $area = DB::table('tb_area_parkir')->first(); 
        $id_area = $area ? $area->id_area : 1; 

        // 3. Cek apakah kendaraan dengan plat nomor ini sudah pernah terdaftar
        $kendaraan = DB::table('tb_kendaraan')->where('plat_nomor', $plat)->first();

        if ($kendaraan) {
            $id_kendaraan = $kendaraan->id_kendaraan;
        } else {
            $id_kendaraan = DB::table('tb_kendaraan')->insertGetId([
                'plat_nomor' => $plat,
                'jenis_kendaraan' => $request->jenis_kendaraan,
                'warna' => $request->warna,
                'pemilik' => $request->pemilik,
                'id_user' => Auth::id()
            ]);
        }

        // 4. Simpan ke tabel transaksi dengan menyertakan id_tarif dan id_area
        DB::table('tb_transaksi')->insert([
            'id_kendaraan' => $id_kendaraan,
            'id_tarif'     => $id_tarif, 
            'id_area'      => $id_area,  
            'waktu_masuk'  => now(), 
            'status'       => 'Masuk',   
            'id_user'      => Auth::id() 
        ]);

        return redirect()->back()->with('sukses', 'Kendaraan ' . $plat . ' berhasil dicatat masuk!');
    }  

    // Membuka halaman Riwayat Shift Petugas
    public function shift_index(): View
    {
        $id_petugas = Auth::id();

        // DISESUAIKAN: Kolom diganti ke jam_masuk & jam_keluar sesuai isi database phpMyAdmin kamu
        $shifts = DB::table('user_shift')
            ->join('shift', 'user_shift.id_shift', '=', 'shift.id_shift')
            ->where('user_shift.id_user', $id_petugas)
            ->select('user_shift.tanggal', 'shift.jam_masuk', 'shift.jam_keluar')
            ->orderBy('user_shift.id_user_shift', 'desc') 
            ->get();

        return view('petugas.shift.index', compact('shifts'));
    }
}
