<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    protected $table = 'tb_tarif';
    protected $primaryKey = 'id_tarif';
    public $timestamps = false;

    // Pastikan kolom tarif_per_jam ada di sini
    protected $fillable = ['jenis_kendaraan', 'tarif_per_jam'];
}
