<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appeal extends Model
{
    use HasFactory;

    protected $table = 'tb_appeal'; // Nama tabel di phpMyAdmin
    protected $primaryKey = 'id_appeal'; // Primary key kamu

    protected $fillable = [
        'id_user',
        'judul',
        'deskripsi',
        'status',
        'balasan',
        'dibalas_oleh'
    ];
}
