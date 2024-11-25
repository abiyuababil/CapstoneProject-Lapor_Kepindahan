<title>Register</title>
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="register-container">
        <h1>Register</h1>

        @if ($errors->any())
            <div class="alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div>
                <label for="nik">Nomor Induk Kependudukan (16 Digit):</label>
                <input type="text" id="nik" name="nik" required value="{{ old('nik') }}">
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required value="{{ old('email') }}">
            </div>
            <div>
                <label for="nama_lengkap">Nama Lengkap:</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" required value="{{ old('nama_lengkap') }}">
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                <label for="password_confirmation">Konfirmasi Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>
            <button type="submit">Register</button>
        </form>

        <div class="link">
            <p>Sudah memiliki akun? <a href="{{ route('login') }}">Login disini</a></p>
        </div>
    </div>
</div>
@endsection