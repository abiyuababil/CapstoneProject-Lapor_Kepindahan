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
        Schema::create('laporan_pindah', function (Blueprint $table) {
            $table->uuid('id_laporan')->primary();
            $table->string('nama_warga');
            $table->string('nik', 16);
            $table->text('alamat_asal');
            $table->text('alamat_tujuan');
            $table->date('tanggal_laporan');
            $table->enum('status_laporan', ['Pending', 'Diterima', 'Ditolak'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_pindah');
    }
};
