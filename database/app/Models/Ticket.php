<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_laporan',
        'nama_lengkap',
        'nik',
        'tanggal_lahir',
        'email',
        'telepon',
        'alamat_asal',
        'alamat_tujuan',
        'tanggal_pindah',
        'alasan_pindah',
        'jumlah_anggota_keluarga',
        'jenis_kelamin',
        'status_perkawinan',
        'dokumen_pendukung',
        'komentar',
        'tanggal_laporan',
        'status_laporan',
    ];
}