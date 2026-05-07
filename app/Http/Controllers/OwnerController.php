<?php

namespace App\Http\Controllers;

use App\Models\Appeal;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
    {
        // Ambil semua data pengajuan beserta nama usernya
        $data = Appeal::with('user')->orderBy('created_at', 'desc')->get();
        return view('owner.pengajuan', compact('data'));
    }

    public function updateStatus($id, $status)
    {
        $pengajuan = Appeal::findOrFail($id);
        $pengajuan->update(['status' => $status]);

        return back()->with('success', 'Status berhasil diubah!');
    }
}
