<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'id_user' => 'Str::uuid()', // Generate a UUID
            'nik' => '1234567890123456',
            'password' => Hash::make('password123'),
            'email' => 'example@example.com',
            'role' => 'admin',
            'nama_lengkap' => 'John Doe',
        ]);
    }
}