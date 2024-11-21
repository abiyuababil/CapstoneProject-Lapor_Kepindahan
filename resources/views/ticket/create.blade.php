<title>Buat Tiket Pelaporan Kepindahan</title>
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@extends('layouts.app')

@section('content')
<div class="ticket-container">
    <h1>Buat Tiket Pelaporan Kepindahan</h1>

    <!-- Menampilkan pesan sukses atau error -->
    @if (session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('ticket.store') }}" method="POST">
        @csrf
        <div>
            <label for="nama_warga">Nama Warga:</label>
            <input type="text" id="nama_warga" name="nama_warga" required>
        </div>
        <div>
            <label for="nik">NIK (16 digit):</label>
            <input type="text" id="nik" name="nik" required maxlength="16">
        </div>
        <div>
            <label for="alamat_asal">Alamat Asal:</label>
            <textarea id="alamat_asal" name="alamat_asal" required></textarea>
        </div>
        <div>
            <label for="alamat_tujuan">Alamat Tujuan:</label>
            <textarea id="alamat_tujuan" name="alamat_tujuan" required></textarea>
        </div>
        <button type="submit">Kirim Informasi Kepindahan</button>
    </form>
</div>
@endsection