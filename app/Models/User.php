<?php
namespace App\Models;

use Illuminate\Support\Str;  // Pastikan ini ada
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'id_user';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_user',
        'nik',
        'password',
        'email',
        'role',
        'nama_lengkap'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (empty($user->id_user)) {
                $user->id_user = (string) Str::uuid();  // Generate UUID untuk id_user
                \Log::info('Generated UUID: ' . $user->id_user);  // Debug: log UUID yang di-generate
            }
        });
    }


}