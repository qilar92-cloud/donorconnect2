<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendaftaran_donor', function (Blueprint $table) {
            $table->id('id_pendaftaran');

            $table->foreignId('id_pendonor')
                  ->constrained('pendonor', 'id_pendonor')
                  ->cascadeOnDelete();

            $table->foreignId('id_kegiatan')
                  ->constrained('kegiatan_donor', 'id_kegiatan')
                  ->cascadeOnDelete();

            $table->string('status_pendaftaran');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_donor');
    }
};