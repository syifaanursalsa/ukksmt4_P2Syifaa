<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tarif;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View; // Tambahan pengaman tipe output tampilan

class AdminController extends Controller
{
    public function dashboard(): View 
    { 
        return view('admin.dashboard'); 
    }
    
    // Kelola Akun User/Petugas
    public function user_index(): View 
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    // Kelola Tarif Parkir
    public function tarif_index(): View 
    {
        $tarifs = Tarif::all();
        return view('admin.tarif.index', compact('tarifs'));
    }

    // Kelola Denah/Area Parkir
    public function area_index(): View 
    {
        $areas = DB::table('tb_area_parkir')->get();
        return view('admin.area.index', compact('areas'));
    }

    // Melihat Catatan Aktivitas Sistem
    public function log_index(): View 
    {
        // id_log disesuaikan dengan Primary Key tabel log kamu
        $logs = DB::table('tb_log_aktivitas')->orderBy('id_log', 'desc')->get();
        return view('admin.log.index', compact('logs'));
    }
}
