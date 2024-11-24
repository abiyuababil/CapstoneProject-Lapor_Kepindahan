<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id_user')->primary(); // ID unik
            $table->string('nik')->unique();    // NIK untuk login
            $table->string('password');         // Password hash
            $table->string('email')->nullable(); // Email (opsional)
            $table->string('role')->default('warga'); // Role pengguna (admin/warga)
            $table->string('nama_lengkap');     // Nama lengkap pengguna
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
