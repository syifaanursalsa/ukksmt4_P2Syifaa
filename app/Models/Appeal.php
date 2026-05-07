<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appeal extends Model
{
    // Karena nama tabelmu pakai tb_ , harus didefinisikan manual
    protected $table = 'tb_appeal';
    protected $primaryKey = 'id_appeal';
    
    // Kolom yang boleh diisi otomatis
    protected $fillable = ['id_user', 'perihal', 'deskripsi', 'nominal', 'status'];

    // Relasi ke User (biar tahu siapa yang ngajuin)
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
