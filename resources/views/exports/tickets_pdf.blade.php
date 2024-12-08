<!DOCTYPE html>
<html>
<head>
    <title>Data Laporan Kepindahan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        td {
            word-wrap: break-word; /* Agar teks panjang pada alamat dapat dibungkus */
            max-width: 200px; /* Menentukan lebar maksimal untuk kolom alamat */
        }
        td.alamat {
            max-width: 250px; /* Menyesuaikan kolom alamat agar lebih lebar dari kolom lain */
            word-wrap: break-word;
        }
        td.alamat-tujuan {
            max-width: 250px;
            word-wrap: break-word;
        }
    </style>
</head>
<body>
    <h1>Data Laporan Kepindahan</h1>
    <p><strong>Diunduh oleh:</strong> {{ $user->nama_lengkap }} ({{ $user->role }})</p>

    @if ($user->role === 'admin')
        <p>Berikut adalah semua laporan kepindahan yang telah tercatat di sistem.</p>
    @else
        <p>Berikut adalah laporan kepindahan yang telah Anda buat.</p>
    @endif

    <table>
        <thead>
            <tr>
                @if ($user->role === 'admin')
                    <th>Nama Pembuat</th>
                @endif
                <th>Nama Lengkap</th>
                <th>NIK</th>
                <th>No Telepon</th>
                <th>Tanggal Pindah</th>
                <th>Alamat Asal</th>
                <th>Alamat Tujuan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
                <tr>
                    @if ($user->role === 'admin')
                        <td>{{ $ticket->nama_pembuat }}</td>
                    @endif
                    <td>{{ $ticket->nama_lengkap }}</td>
                    <td>{{ $ticket->nik }}</td>
                    <td>{{ $ticket->telepon }}</td>
                    <td>{{ \Carbon\Carbon::parse($ticket->tanggal_pindah)->format('d M Y') }}</td>
                    <td>{{ $ticket->alamat_asal }}</td>
                    <td>{{ $ticket->alamat_tujuan }}</td>
                    <td>{{ $ticket->status_laporan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
