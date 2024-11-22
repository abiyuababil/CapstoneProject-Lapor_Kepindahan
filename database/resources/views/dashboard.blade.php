@extends('layouts.app')

@section('content')
<div class="dashboard-container">
    <div class="dashboard-header">
        <h1>Dashboard</h1>
        <p>Welcome, {{ $user->nama_lengkap }}</p>
    </div>

    <div class="user-info">
        <h2>Profile Information</h2>
        <p><strong>Nama Lengkap:</strong> {{ $user->nama_lengkap }}</p>
        <p><strong>NIK:</strong> {{ $user->nik }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <br>
        <p>Akun ini dibuat pada {{ $user->created_at }}</p>
        <!-- <p><strong>Role:</strong> {{ $user->role }}</p> -->
    </div>
    <div class="ticket-button">
        <a href="{{ route('ticket.create') }}">
            <button class="btn-ticket">Buat Informasi Kepindahan</button>
        </a>
    </div>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout-button">Logout</button>
    </form>
</div>
@endsection