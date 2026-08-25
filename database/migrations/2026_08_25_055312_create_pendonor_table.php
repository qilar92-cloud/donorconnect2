<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendonor', function (Blueprint $table) {
            $table->id('id_pendonor');

            $table->foreignId('id_user')
                  ->constrained('users', 'id_user')
                  ->cascadeOnDelete();

            $table->string('status');
            $table->string('kelas_jabatan');
            $table->date('tanggal_lahir');
            $table->string('golongan_darah');
            $table->string('nomor_telepon');
            $table->text('informasi_kesehatan');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendonor');
    }
};