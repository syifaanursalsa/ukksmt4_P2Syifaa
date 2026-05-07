<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus atau beri tanda // pada baris User::factory()
        // Gunakan kode di bawah ini:
        User::create([
            'username' => 'Admin',
            'password' => Hash::make('admin123'),
            'nama_lengkap' => 'Administrator',
        ]);
    }
}