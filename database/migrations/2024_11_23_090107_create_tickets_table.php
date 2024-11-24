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
        Schema::create('tickets', function (Blueprint $table) {
            $table->uuid('id_laporan')->primary(); // ID laporan sebagai UUID
            $table->string('nama_pembuat')->nullable();
            $table->string('nama_lengkap'); // Nama lengkap warga
            $table->string('nik', 16); // NIK
            $table->date('tanggal_lahir'); // Tanggal lahir
            $table->string('email'); // Email
            $table->string('telepon',15); // Nomor telepon
            $table->text('alamat_asal'); // Alamat asal
            $table->text('alamat_tujuan'); // Alamat tujuan
            $table->date('tanggal_pindah'); // Tanggal pindah
            $table->text('alasan_pindah'); // Alasan pindah
            $table->integer('jumlah_anggota_keluarga'); // Jumlah anggota keluarga yang pindah
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']); // Jenis kelamin
            $table->enum('status_perkawinan', ['Belum Menikah', 'Menikah', 'Cerai']); // Status perkawinan
            $table->string('dokumen_pendukung')->nullable(); // Dokumen pendukung (file path)
            $table->text('komentar')->nullable(); // Komentar tambahan
            $table->enum('status_laporan', ['Pending', 'Diterima', 'Ditolak'])->default('Pending'); // Status laporan
            $table->timestamps(); // Timestamps (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
