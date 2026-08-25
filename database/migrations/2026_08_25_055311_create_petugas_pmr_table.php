<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('petugas_pmr', function (Blueprint $table) {
            $table->id('id_petugas');

            $table->foreignId('id_user')
                  ->constrained('users', 'id_user')
                  ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('petugas_pmr');
    }
};