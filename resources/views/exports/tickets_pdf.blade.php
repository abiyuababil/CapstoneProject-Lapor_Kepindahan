<!DOCTYPE html>
<html>
<head>
    <title>Data Kepindahan Yang Telah Dibuat</title>
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
    <h2>Data Tiket</h2>
    <table>
        <thead>
            <tr>
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
                    <td>{{ $ticket->nama_lengkap }}</td>
                    <td>{{ $ticket->nik }}</td>
                    <td>{{ $ticket->telepon }}</td>
                    <td>{{ \Carbon\Carbon::parse($ticket->tanggal_pindah)->format('d M Y') }}</td>
                    <td class="alamat">{{ $ticket->alamat_asal }}</td>
                    <td class="alamat-tujuan">{{ $ticket->alamat_tujuan }}</td>
                    <td>{{ $ticket->status_laporan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
