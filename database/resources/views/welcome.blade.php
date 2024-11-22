@extends('layouts.app')

@section('content')

    <div class="container">
        <header>
            <div class="logo">
                <h1>RT 11 Kelurahan Teluk Bayur</h1>
            </div>
        </header>

        <section class="intro">
            <h2>Selamat Datang di Website Resmi RT 11 Kelurahan Teluk Bayur</h2>
            <p>Website ini menyediakan informasi terkini dan layanan online untuk warga RT 11 Kelurahan Teluk Bayur.</p>
        </section>

        <section class="contact-info">
            <h2>Informasi Kontak</h2>
            <p><strong>Alamat:</strong> Jl. Contoh No. 123, Teluk Bayur</p>
            <p><strong>Telepon:</strong> (021) 12345678</p>
            <p><strong>Email:</strong> rt11@telukbayur.id</p>
        </section>

        <section class="news">
            <h2>Berita Terbaru</h2>
            <article class="news-item">
                <h3>Gotong Royong Bersama</h3>
                <p>Pada tanggal 25 November 2024, akan diadakan kegiatan gotong royong bersama di lingkungan RT 11. Semua warga diharapkan hadir.</p>
            </article>
            <article class="news-item">
                <h3>Pengumuman Pembayaran Iuran</h3>
                <p>Pengumuman bagi warga RT 11 untuk segera melakukan pembayaran iuran bulanan sebelum tanggal 30 November 2024.</p>
            </article>
        </section>

        <section class="services">
            <h2>Layanan Kami</h2>
            <ul>
                <li><a href="#">Pelaporan Kepindahan</a></li>
                <li><a href="#">Pengajuan Surat Keterangan</a></li>
                <li><a href="#">Jadwal Kegiatan</a></li>
                <li><a href="#">Informasi Iuran</a></li>
            </ul>
        </section>
    </div>

@endsection