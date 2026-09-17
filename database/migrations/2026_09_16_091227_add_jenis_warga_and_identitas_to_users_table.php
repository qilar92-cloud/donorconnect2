<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('jenis_warga')
                ->nullable()
                ->after('nama');

            $table->string('identitas')
                ->nullable()
                ->unique()
                ->after('jenis_warga');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['identitas']);
            $table->dropColumn([
                'jenis_warga',
                'identitas',
            ]);
        });
    }
};