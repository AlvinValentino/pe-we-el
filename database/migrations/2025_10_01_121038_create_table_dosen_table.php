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
        Schema::create('table_dosen', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->unique();
            $table->string('nama_dosen');
            $table->string('pendidikan_terakhir');
            $table->enum('jurusan', ['Bisnis Digital', 'Sistem dan Teknologi Informasi', 'Kewirausahaan']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_dosen');
    }
};
