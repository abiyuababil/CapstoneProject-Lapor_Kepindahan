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
            'id_user' => 'Str::uuid(1)', // Generate a UUID
            'nik' => '0000000000000001',
            'password' => Hash::make('123456'),
            'email' => 'admin@example.com',
            'role' => 'admin',
            'nama_lengkap' => 'Abiyu-admin',
        ]);

        User::create([
            'id_user' => 'Str::uuid(2)', // Generate a UUID
            'nik' => '0000000000000002',
            'password' => Hash::make('123456'),
            'email' => 'warga@example.com',
            'role' => 'warga',
            'nama_lengkap' => 'Abiyu-warga',
        ]);
    }
}