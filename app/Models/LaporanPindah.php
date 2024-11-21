<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPindah extends Model
{
    use HasFactory;

    protected $table = 'laporan_pindah';
    protected $primaryKey = 'id_laporan';

    protected $fillable = [
        'id_laporan',
        'nama_warga',
        'nik',
        'alamat_asal',
        'alamat_tujuan',
        'tanggal_laporan',
        'status_laporan'
    ];
}
