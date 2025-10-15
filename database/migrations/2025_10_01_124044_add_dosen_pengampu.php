<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('table_matakuliah', function (Blueprint $table) {
            $table->foreignId('dosen_pengampu')->constained('table_dosen')->nullable()->after('jurusan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_matakuliah', function (Blueprint $table) {
            $table->dropColumn('dosen_pengampu');
        });
    }
};
