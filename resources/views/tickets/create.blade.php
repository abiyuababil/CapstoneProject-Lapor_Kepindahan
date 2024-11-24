<title>Buat Tiket Pelaporan Kepindahan</title>
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="ticket-container">
        <h1>Buat Tiket Pelaporan Kepindahan</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div id="errorMessages"></div>
        <form id="ticketForm" action="{{ route('ticket.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap:</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="nik">Nomor Induk Kependudukan (NIK):</label>
                <input type="text" id="nik" name="nik" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir:</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Alamat Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="telepon">Nomor Telepon:</label>
                <input type="text" id="telepon" name="telepon" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="alamat_asal">Alamat Asal:</label>
                <input type="text" id="alamat_asal" name="alamat_asal" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="alamat_tujuan">Alamat Tujuan:</label>
                <input type="text" id="alamat_tujuan" name="alamat_tujuan" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="tanggal_pindah">Tanggal Pindah:</label>
                <input type="date" id="tanggal_pindah" name="tanggal_pindah" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="alasan_pindah">Alasan Pindah:</label>
                <textarea id="alasan_pindah" name="alasan_pindah" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="jumlah_anggota_keluarga">Jumlah Anggota Keluarga yang Pindah:</label>
                <input type="number" id="jumlah_anggota_keluarga" name="jumlah_anggota_keluarga" class="form-control"
                    required>
            </div>

            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="status_perkawinan">Status Perkawinan:</label>
                <select id="status_perkawinan" name="status_perkawinan" class="form-control" required>
                    <option value="Belum Menikah">Belum Menikah</option>
                    <option value="Menikah">Menikah</option>
                    <option value="Cerai">Cerai</option>
                </select>
            </div>

            <div class="form-group">
                <label for="dokumen_pendukung">Upload Dokumen Pendukung:</label>
                <input type="file" id="dokumen_pendukung" name="dokumen_pendukung" class="form-control">
            </div>

            <div class="form-group">
                <label for="komentar">Komentar atau Catatan Tambahan:</label>
                <textarea id="komentar" name="komentar" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Kirim Informasi Kepindahan</button>
        </form>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#ticketForm').on('submit', function (e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: "{{ route('ticket.store') }}",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    alert('Tiket pelaporan kepindahan berhasil dibuat.');
                    window.location.href = "{{ route('ticket.create') }}";
                },
                error: function (xhr) {
                    console.log(xhr); // Tambahkan log ini
                    var errors = xhr.responseJSON;
                    var errorMessages = '';

                    if (errors.error) {
                        errorMessages += '<p>' + errors.error + '</p>';
                    }

                    $('#errorMessages').html(errorMessages);
                }
            });
        });
    });
</script>

@endsection