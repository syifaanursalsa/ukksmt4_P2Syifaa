<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'tb_user'; // Nama tabel kamu
    protected $primaryKey = 'id_user'; // Nama ID kamu
    public $timestamps = false; // Karena di DB kamu tidak ada created_at

    protected $fillable = [
        'nama_lengkap',
        'username',
        'password',
        'role',
        'status_aktif',
    ];
}
