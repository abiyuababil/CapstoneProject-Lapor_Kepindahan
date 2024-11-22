<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Ticket;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ticket::create([
            'id_laporan' => Str::uuid(),
            'nama_lengkap' => 'John Doe',
            'nik' => '1234567890123456',
            'tanggal_lahir' => '1990-01-01',
            'email' => 'johndoe@example.com',
            'telepon' => '081234567890',
            'alamat_asal' => 'Jl. Contoh No. 1',
            'alamat_tujuan' => 'Jl. Contoh No. 2',
            'tanggal_pindah' => '2024-12-01',
            'alasan_pindah' => 'Pindah kerja',
            'jumlah_anggota_keluarga' => 3,
            'jenis_kelamin' => 'Laki-laki',
            'status_perkawinan' => 'Menikah',
            'dokumen_pendukung' => 'dokumen_pendukung/contoh.pdf',
            'komentar' => 'Tidak ada',
            'tanggal_laporan' => now(),
            'status_laporan' => 'Pending',
        ]);

        // Tambahkan lebih banyak data jika diperlukan
    }
}