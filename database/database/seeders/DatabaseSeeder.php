<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        User::create([
            'id_user' => Str::uuid(),
            'nik' => '1234567890123426',
            'email' => 'test@example.com',
            'nama_lengkap' => 'Test User',
            'password' => Hash::make('password'),
            'role' => 'warga',
        ]);

        $this->call([
            TicketSeeder::class,
        ]);
    }
}
