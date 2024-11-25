@extends('layouts.app')

@section('content')

<div class="homepage-container">
    <section class="intro">
        <h2>Selamat Datang di Website Resmi RT 11 Kelurahan Teluk Bayur</h2>
        <p>Website ini menyediakan informasi terkini dan layanan online untuk warga RT 11 Kelurahan Teluk Bayur.</p>
        <a href="#services" class="btn-secondary">Lihat Layanan Kami</a>
    </section>

    <section id="services" class="services">
        <h2>Layanan Kami</h2>
        <div class="services-grid">
            <div class="service-item">
                <h3>Pelaporan Kepindahan</h3>
                <p>Mudah laporkan kepindahan Anda secara online.</p>
                <a href="/ticket/create" class="btn-secondary">Lapor</a>
            </div>
            <div class="service-item">
                <h3>Pengajuan Surat Keterangan</h3>
                <p>Ajukan surat keterangan dengan proses cepat.</p>
                <a href="#" class="btn-secondary">Segera hadir</a>
            </div>
            <div class="service-item">
                <h3>Jadwal Kegiatan</h3>
                <p>Ketahui jadwal kegiatan terbaru di lingkungan RT.</p>
                <a href="#" class="btn-secondary">Segera hadir</a>
            </div>
            <div class="service-item">
                <h3>Informasi Iuran</h3>
                <p>Informasi iuran dan laporan transparan untuk warga.</p>
                <a href="#" class="btn-secondary">Segera hadir</a>
            </div>
        </div>
    </section>

    <section id="news" class="news">
        <h2>Berita Terbaru</h2>
        <div class="news-grid">
            <article class="news-item">
                <h3>Gotong Royong Bersama</h3>
                <p>Pada tanggal 25 November 2024, akan diadakan kegiatan gotong royong bersama di lingkungan RT 11.
                    Semua warga diharapkan hadir.</p>
            </article>
            <article class="news-item">
                <h3>Pengumuman Pembayaran Iuran</h3>
                <p>Pengumuman bagi warga RT 11 untuk segera melakukan pembayaran iuran bulanan sebelum tanggal 30
                    November 2024.</p>
            </article>
        </div>
    </section>

    <!-- Kegiatan -->
    <section id="activities" class="activities">
        <h2>Kegiatan Kami</h2>
        <div class="activities-grid">
            <div class="activity-card">
                <img src="https://www.panggungharjo.desa.id/wp-content/uploads/2022/06/BBGRM.jpg" alt="Gotong Royong"
                    class="activity-img">
                <h3>Gotong Royong Bersama</h3>
                <p>Pada tanggal 3 Februari 2024, telah diadakan kegiatan gotong royong bersama di lingkungan RT 11.</p>
            </div>
            <div class="activity-card">
                <img src="https://www.ksbnindonesia.org/wp-content/uploads/2019/05/eb64f0da-2524-406c-8724-329f3602350f-1024x576.jpg"
                    alt="Festival Seni dan Budaya Desa" class="activity-img">
                <h3>Festival Seni dan Budaya Desa</h3>
                <p>Pada 2 Agustus 2024, RT 11 menyelenggarakan Festival Seni dan Budaya untuk merayakan hari
                    kemerdekaan. Kegiatan ini meliputi lomba seni tradisional seperti tari, musik daerah, dan lomba
                    masak khas desa. Festival ini menjadi ajang bagi warga untuk mengekspresikan kreativitas mereka
                    sekaligus melestarikan budaya lokal.</p>
            </div>
            <div class="activity-card">
                <img src="https://bendoroto-munjungan.trenggalekkab.go.id/assets/files/artikel/sedang_1691983023PPHBN%203.jpeg"
                    alt="Peringatan Hari Besar Nasional" class="activity-img">
                <h3>Peringatan Hari Besar Nasional</h3>
                <p>Pada 17 Agustus 2024, RT 11 mengadakan perayaan Hari Kemerdekaan Republik Indonesia. Kegiatan ini
                    meliputi lomba 17-an, seperti tarik tambang, balap karung, dan panjat pinang yang melibatkan seluruh
                    warga dari berbagai usia. Selain itu, acara ini juga menjadi ajang untuk memperkenalkan sejarah
                    kemerdekaan Indonesia kepada generasi muda.</p>
            </div>
        </div>
    </section>

    <section id="contact" class="contact-info">
        <h2>Informasi Kontak</h2>
        <p><strong>Alamat:</strong> Jl. Contoh No. 123, Teluk Bayur</p>
        <p><strong>Telepon:</strong> (021) 12345678</p>
        <p><strong>Email:</strong> abiyuababil@gmail.com</p>
    </section>
</div>

@endsection