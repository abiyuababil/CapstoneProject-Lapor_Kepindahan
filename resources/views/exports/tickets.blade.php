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
                <td>{{ $ticket->alamat_asal }}</td>
                <td>{{ $ticket->alamat_tujuan }}</td>
                <td>{{ $ticket->status_laporan }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
