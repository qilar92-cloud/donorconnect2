<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('hasil_donor', function (Blueprint $table) {
            $table->integer('volume_ml')->after('jumlah_kantong');
        });
    }

    public function down(): void
    {
        Schema::table('hasil_donor', function (Blueprint $table) {
            $table->dropColumn('volume_ml');
        });
    }
};

