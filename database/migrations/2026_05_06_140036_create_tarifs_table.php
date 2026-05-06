<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel tarifs.
     */
    public function up(): void
    {
        Schema::create('tarifs', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_kendaraan'); // Contoh: Motor, Mobil
            $table->integer('biaya');          // Contoh: 2000, 5000
            $table->timestamps();
        });
    }

    /**
     * Batalkan migrasi (hapus tabel).
     */
    public function down(): void
    {
        Schema::dropIfExists('tarifs');
    }
};
