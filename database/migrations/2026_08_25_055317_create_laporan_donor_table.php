<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
   Schema::create('laporan_donor', function (Blueprint $table) {
    $table->id('id_laporan');

    $table->foreignId('id_hasil')
          ->constrained('hasil_donor', 'id_hasil')
          ->cascadeOnDelete();

    $table->foreignId('id_kegiatan')
          ->constrained('kegiatan_donor', 'id_kegiatan')
          ->cascadeOnDelete();

    $table->timestamps();
   });
}

    public function down(): void
    {
        Schema::dropIfExists('laporan_donor');
    }
};