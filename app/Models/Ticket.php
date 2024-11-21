<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'user_id',
    ];

    // Relasi dengan user (jika diperlukan)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
