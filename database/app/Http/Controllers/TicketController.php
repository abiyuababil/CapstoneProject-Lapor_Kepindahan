<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Str;

class TicketController extends Controller
{
    public function create()
    {
        return view('ticket.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|max:255',
            'nik' => 'required|size:16',
            'tanggal_lahir' => 'required|date',
            'email' => 'required|email',
            'telepon' => 'required|max:15',
            'alamat_asal' => 'required',
            'alamat_tujuan' => 'required',
            'tanggal_pindah' => 'required|date',
            'alasan_pindah' => 'required',
            'jumlah_anggota_keluarga' => 'required|integer',
            'jenis_kelamin' => 'required',
            'status_perkawinan' => 'required',
            'dokumen_pendukung' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'komentar' => 'nullable',
        ]);

        // Membuat laporan kepindahan
        Ticket::create([
            'id_laporan' => Str::uuid(),
            'nama_lengkap' => $request->nama_lengkap,
            'nik' => $request->nik,
            'tanggal_lahir' => $request->tanggal_lahir,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'alamat_asal' => $request->alamat_asal,
            'alamat_tujuan' => $request->alamat_tujuan,
            'tanggal_pindah' => $request->tanggal_pindah,
            'alasan_pindah' => $request->alasan_pindah,
            'jumlah_anggota_keluarga' => $request->jumlah_anggota_keluarga,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status_perkawinan' => $request->status_perkawinan,
            'dokumen_pendukung' => $request->file('dokumen_pendukung')->store('dokumen_pendukung', 'public'),
            'komentar' => $request->komentar,
            'tanggal_laporan' => now(),
            'status_laporan' => 'Pending',
        ]);

        return redirect()->route('ticket.create')->with('success', 'Laporan kepindahan berhasil dibuat!');
    }
}