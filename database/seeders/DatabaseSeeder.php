<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
  public function run(): void
{
    // Akun Admin
    \App\Models\User::create([
        'username' => 'admin',
        'password' => \Illuminate\Support\Facades\Hash::make('123'),
        'nama_lengkap' => 'Administrator',
        'role' => 'admin', // Pastikan kolom 'role' ada di migration
    ]);

    // Akun Petugas
    \App\Models\User::create([
        'username' => 'petugas',
        'password' => \Illuminate\Support\Facades\Hash::make('123'),
        'nama_lengkap' => 'Petugas Lapangan',
        'role' => 'petugas',
    ]);

    // Akun Owner
    \App\Models\User::create([
        'username' => 'owner',
        'password' => \Illuminate\Support\Facades\Hash::make('123'),
        'nama_lengkap' => 'Pemilik Toko',
        'role' => 'owner',
    ]);
}

}