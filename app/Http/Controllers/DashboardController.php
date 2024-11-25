<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Ticket;
use Barryvdh\DomPDF\Facade\Pdf;
use Shuchkin\SimpleXLSX;

class DashboardController extends Controller
{
    // Di dalam DashboardController
    public function index()
    {
        $user = Auth::user();
        $isAdmin = $user->role === 'admin';  // Periksa apakah user adalah admin
        $isWarga = $user->role === 'warga';  // Periksa apakah user adalah warga

        // Jika admin, tampilkan semua tiket
        if ($isAdmin) {
            $tickets = Ticket::all();
        } else {
            // Jika warga, hanya tampilkan tiket yang dibuat oleh mereka
            $tickets = Ticket::where('nama_pembuat', $user->nama_lengkap)->get();
        }

        return view('dashboard', compact('user', 'tickets', 'isAdmin', 'isWarga'));
    }
    public function exportData($type)
    {
        $user = Auth::user();
        $tickets = Ticket::where('nama_pembuat', $user->nama_lengkap)->get();

        if ($type === 'excel') {
            // Ekspor ke Excel menggunakan Simple Excel

            // Membuat data array untuk Excel
            $data = [
                ['Nama Lengkap', 'NIK', 'No Telepon', 'Tanggal Pindah', 'Alamat Asal', 'Alamat Tujuan', 'Status'] // Header
            ];

            // Menambahkan data tiket ke array
            foreach ($tickets as $ticket) {
                $data[] = [
                    $ticket->nama_lengkap,
                    $ticket->nik,
                    $ticket->telepon,
                    \Carbon\Carbon::parse($ticket->tanggal_pindah)->format('d M Y'),
                    $ticket->alamat_asal,
                    $ticket->alamat_tujuan,
                    $ticket->status_laporan
                ];
            }

            // Menyimpan data ke dalam file Excel
            $xlsx = new SimpleXLSX();
            $xlsx->addSheet($data);

            // Nama file Excel
            $fileName = 'tickets.xlsx';

            // Menyimpan dan mendownload file Excel
            return response()->stream(
                function () use ($xlsx) {
                    echo $xlsx->save();
                },
                200,
                [
                    'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                    'Content-Disposition' => 'attachment; filename="tickets.xlsx"',
                ]
            );
        } elseif ($type === 'pdf') {
            // Ekspor ke PDF
            $pdf = Pdf::loadView('exports.tickets_pdf', compact('tickets'));
            return $pdf->stream('tickets.pdf'); // Menampilkan PDF di browser
        } else {
            return redirect()->back()->with('error', 'Format tidak didukung!');
        }
    }

    // Fungsi untuk update status tiket
    public function updateStatus(Request $request, $id_laporan)
    {

        \Log::info('Update status request received', [
            'id_laporan' => $id_laporan,
            'status' => $request->input('status_laporan')
        ]);

        // Validasi status yang dipilih
        $validated = $request->validate([
            'status_laporan' => 'required|in:Pending,Diterima,Ditolak', // Hanya status yang valid
        ]);

        // Cari tiket berdasarkan ID
        $ticket = Ticket::findOrFail($id_laporan);
        \Log::info('Ticket found', ['ticket' => $ticket]);

        $ticket->status_laporan = $validated['status_laporan'];
        $result = $ticket->save();

        \Log::info('Save result', ['result' => $result]);

        return redirect()->route('dashboard')->with('success', 'Status tiket berhasil diubah.');
    }
}