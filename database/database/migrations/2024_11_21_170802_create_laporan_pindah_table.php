<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanPindahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->uuid('id_laporan')->primary();
            $table->string('nama_lengkap');
            $table->string('nik', 16);
            $table->date('tanggal_lahir');
            $table->string('email');
            $table->string('telepon', 15);
            $table->text('alamat_asal');
            $table->text('alamat_tujuan');
            $table->date('tanggal_pindah');
            $table->text('alasan_pindah');
            $table->integer('jumlah_anggota_keluarga');
            $table->string('jenis_kelamin');
            $table->string('status_perkawinan');
            $table->string('dokumen_pendukung')->nullable();
            $table->text('komentar')->nullable();
            $table->date('tanggal_laporan');
            $table->enum('status_laporan', ['Pending', 'Diterima', 'Ditolak'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}