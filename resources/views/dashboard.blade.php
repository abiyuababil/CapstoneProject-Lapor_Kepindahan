<title>Dashboard</title>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="dashboard-container">
        <h1>Dashboard</h1>
        <p class="welcome-message">Selamat datang, {{ $user->nama_lengkap }}</p>
        <div class="dashboard-content">
            <div class="user-info">
                <div class="user-header">
                    <h2>Informasi Profil</h2>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="logout-button">Logout</button>
                    </form>
                </div>
                <p><strong>Nama Lengkap:</strong> {{ $user->nama_lengkap }}</p>
                <p><strong>NIK:</strong> {{ $user->nik }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Tanggal Bergabung:</strong> {{ $user->created_at->format('d M Y, H:i') }}</p>
            </div>
            <!-- Daftar Tiket -->
            <div class="user-tickets">
                <div class="ticket-header">

                    @if ($isAdmin)
                        <h2>Seluruh Data Kepindahan Yang Telah Dibuat</h2>
                        <div class="ticket-button">
                            <a href="{{ route('dashboard.export', ['type' => 'pdf']) }}" class="btn btn-danger">Download
                                PDF</a>
                        </div>
                    @else
                        <h2>Informasi Kepindahan Yang Telah Dibuat</h2>
                        <div class="ticket-button">
                            <a href="{{ route('ticket.create') }}">Buat Informasi Kepindahan</a>
                            <a href="{{ route('dashboard.export', ['type' => 'pdf']) }}" class="btn btn-danger">Download
                                PDF</a>
                        </div>
                    @endif
                </div>

                @if ($tickets->isEmpty())
                    <p>Belum ada tiket yang dibuat.</p>
                @else
                    <div class="ticket-list">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        @if ($isAdmin)
                                            <th>Nama Pembuat</th>
                                        @endif
                                        <th>Tanggal Dibuat</th>
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
                                            @if ($isAdmin)
                                                <td>{{ $ticket->nama_pembuat }}</td>
                                            @endif
                                            <td>{{ \Carbon\Carbon::parse($ticket->created_at)->format('d M Y') }}</td>
                                            <td>{{ $ticket->nama_lengkap }}</td>
                                            <td>{{ $ticket->nik }}</td>
                                            <td>{{ $ticket->telepon }}</td>
                                            <td>{{ \Carbon\Carbon::parse($ticket->tanggal_pindah)->format('d M Y') }}</td>
                                            <td>{{ $ticket->alamat_asal }}</td>
                                            <td>{{ $ticket->alamat_tujuan }}</td>
                                            @if ($isWarga)
                                                <td>{{ $ticket->status_laporan }}</td>
                                            @endif
                                            @if ($isAdmin)
                                                <td>
                                                    <!-- Form untuk mengubah status -->
                                                    <form action="{{ route('ticket.updateStatus', $ticket->id_laporan) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <select name="status_laporan" class="form-control select-status"
                                                            onchange="this.form.submit()">
                                                            <option value="Pending" {{ $ticket->status_laporan == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                            <option value="Diterima" {{ $ticket->status_laporan == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                                                            <option value="Ditolak" {{ $ticket->status_laporan == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                                                        </select>
                                                    </form>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
</div>
@endsection
