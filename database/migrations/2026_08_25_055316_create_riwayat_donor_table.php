<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('riwayat_donor', function (Blueprint $table) {
            $table->id('id_riwayat');

            $table->foreignId('id_pendonor')
                  ->constrained('pendonor', 'id_pendonor')
                  ->cascadeOnDelete();

            $table->foreignId('id_hasil')
                  ->constrained('hasil_donor', 'id_hasil')
                  ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('riwayat_donor');
    }
};