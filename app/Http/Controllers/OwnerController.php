<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse; // Pengaman untuk fungsi redirect

class OwnerController extends Controller
{
    public function dashboard(): View 
    { 
        return view('owner.dashboard'); 
    }

    // Menampilkan Rekap Pendapatan & Filter Tanggal
    public function rekap_index(Request $request): View 
    {
        $query = DB::table('tb_transaksi')
            ->join('tb_kendaraan', 'tb_transaksi.id_kendaraan', '=', 'tb_kendaraan.id_kendaraan')
            ->select('tb_transaksi.*', 'tb_kendaraan.plat_nomor', 'tb_kendaraan.jenis_kendaraan');

        // Menyempurnakan filter agar mencakup jam penuh di hari tersebut
        if ($request->tgl_mulai && $request->tgl_selesai) {
            $query->whereBetween('waktu_keluar', [$request->tgl_mulai . ' 00:00:00', $request->tgl_selesai . ' 23:59:59']);
        }

        $rekap = $query->orderBy('waktu_keluar', 'desc')->get();
        $total_pendapatan = $rekap->sum('biaya_total');
        
        return view('owner.rekap.index', compact('rekap', 'total_pendapatan'));
    }

    // Menampilkan Daftar Pengajuan (Di-join dengan tabel user agar nama pengaju muncul)
    public function appeal_index(): View 
    {
        $pengajuans = DB::table('tb_appeal')
            ->join('tb_user', 'tb_appeal.id_user', '=', 'tb_user.id_user')
            ->select('tb_appeal.*', 'tb_user.nama_lengkap as pengaju')
            ->orderBy('created_at', 'desc') // Menggunakan created_at sesuai phpMyAdmin kamu
            ->get();
            
        return view('owner.appeal.index', compact('pengajuans'));
    }

    // Memproses Aksi Persetujuan/Penolakan Pengajuan
    public function appeal_status(Request $request, $id): RedirectResponse 
    {
        DB::table('tb_appeal')->where('id_appeal', $id)->update([
            'status' => $request->status,
            'balasan' => $request->keterangan_owner // Kolom 'balasan' sesuai dengan isi phpMyAdmin kamu
        ]);
        
        return redirect()->back()->with('sukses', 'Status pengajuan diperbarui!');
    }
}
