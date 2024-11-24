<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Ticket extends Model
{
    protected $primaryKey = 'id_laporan';
    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }
    protected $table = 'tickets'; // Specify the table name
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