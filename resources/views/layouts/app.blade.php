<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RT 11 Kelurahan Teluk Bayur</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <header>
        <div class="logo">
            <a href="/">
                <h1>RT 11 Kelurahan Teluk Bayur</h1>
            </a>
        </div>
        <button class="menu-toggle" aria-label="Toggle menu">
            &#9776;
        </button>
        <nav class="main-nav">
            <ul>
                <li><a href="/#services">Layanan</a></li>
                <li><a href="/#news">Berita</a></li>
                <li><a href="/#activities">Kegiatan</a></li>
                <li><a href="/#contact">Kontak</a></li>
                <li class="auth-links">
                    @if(Auth::check())
                        <div class="dropdown">
                            <button class="dropdown-toggle">
                                {{ Auth::user()->nama_lengkap }}
                            </button>
                            <div class="dropdown-menu">
                                <a href="{{ route('dashboard') }}">Dashboard</a>
                                <form action="{{ route('logout') }}" method="POST" class="logout-form">
                                    @csrf
                                    <button class="logout-item">Logout</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="/login" class="login-link">Masuk</a> |
                        <a href="/register" class="register-link">Daftar</a>
                    @endif
                </li>

            </ul>
        </nav>
    </header>

    <main>
        @yield('content')<!-- Konten utama halaman -->
    </main>
    <footer>
        <p>&copy; 2024 RT 11 Kelurahan Teluk Bayur. All rights reserved.</p>
    </footer>
    <!-- Menambahkan JavaScript di bawah -->
    <script>
        // Mengambil elemen menu dan tombol hamburger
        const menuToggle = document.querySelector('.menu-toggle');
        const mainNav = document.querySelector('.main-nav');

        // Menambahkan event listener untuk tombol hamburger
        menuToggle.addEventListener('click', () => {
            mainNav.classList.toggle('open');
        });
    </script>
</body>

</html>