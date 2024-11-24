<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use DB;

class LaporanPindahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tickets')->insert([
            'id_laporan' => Str::uuid(),
            'nama_lengkap' => 'Abiyu',
            'nik' => '3171040501021001',
            'tanggal_lahir' => '1990-12-15', // Sesuaikan tanggal lahir
            'email' => 'abiyuababil@gmail.com',
            'telepon' => '085155477845',
            'alamat_asal' => 'Jl. Mawar No. 1, Jakarta',
            'alamat_tujuan' => 'Jl. Melati No. 2, Bandung',
            'tanggal_pindah' => '2024-12-01', // Sesuaikan tanggal pindah
            'alasan_pindah' => 'Magerrrrr',
            'jumlah_anggota_keluarga' => 3, // Jumlah anggota keluarga yang pindah
            'jenis_kelamin' => 'Laki-laki', // Jenis kelamin
            'status_perkawinan' => 'Menikah', // Status perkawinan
            'dokumen_pendukung' => null, // Bisa null jika tidak ada dokumen
            'komentar' => 'Tidak ada komentar',
            'status_laporan' => 'Pending',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}