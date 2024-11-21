<?php
namespace App\Http\Controllers;

use App\Models\LaporanPindah;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TicketController extends Controller
{
    public function create()
    {
        return view('ticket.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_warga' => 'required|max:255',
            'nik' => 'required|size:16',
            'alamat_asal' => 'required',
            'alamat_tujuan' => 'required',
        ]);

        // Membuat laporan kepindahan
        LaporanPindah::create([
            'id_laporan' => Str::uuid(),
            'nama_warga' => $request->nama_warga,
            'nik' => $request->nik,
            'alamat_asal' => $request->alamat_asal,
            'alamat_tujuan' => $request->alamat_tujuan,
            'tanggal_laporan' => now(),
        ]);

        return redirect()->route('ticket.create')->with('success', 'Laporan kepindahan berhasil dibuat!');
    }
}