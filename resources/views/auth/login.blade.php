    <title>Login</title>
    @extends('layouts.app')
    @section('content')
    <div class="container">
        <h1>Login</h1>
        @if ($errors->any())
            <div class="alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div>
                <label for="nik">NIK:</label>
                <input type="text" id="nik" name="nik" required value="{{ old('nik') }}">
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>

        <div class="link">
            <p>Belum memiliki akun? <a href="{{ route('register') }}">Daftar disini</a></p>
        </div>
    </div>
    @endsection