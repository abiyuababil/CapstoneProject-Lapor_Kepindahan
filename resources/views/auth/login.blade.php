<title>Login</title>
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="login-container">
        <h1>Login</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nik">NIK:</label>
                <input type="text" id="nik" name="nik" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <button type="submit">Login</button>
        </form>

        <p>Belum memiliki akun? <a href="{{ route('register') }}">Daftar disini</a></p>
    </div>
</div>

@endsection