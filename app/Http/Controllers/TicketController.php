<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Log; // Add this import
use Illuminate\Support\Facades\DB;  // Add this for database operations
use Illuminate\Support\Facades\Auth; // Untuk mendapatkan pengguna yang login

class TicketController extends Controller
{
    public function store(Request $request)
    {
        Log::info('Incoming ticket request data:', $request->all());

        try {
            $validated = $request->validate([
                'nama_lengkap' => 'required|string|max:255',
                'nik' => 'required|string|max:16',
                'tanggal_lahir' => 'required|date',
                'email' => 'required|email|max:255',
                'telepon' => 'required|string|max:15',
                'alamat_asal' => 'required|string|max:255',
                'alamat_tujuan' => 'required|string|max:255',
                'tanggal_pindah' => 'required|date',
                'alasan_pindah' => 'required|string',
                'jumlah_anggota_keluarga' => 'required|integer',
                'jenis_kelamin' => 'required|string',
                'status_perkawinan' => 'required|string',
                'dokumen_pendukung' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
                'komentar' => 'nullable|string',
            ]);
            Log::info('Validation passed');

            DB::beginTransaction(); // Start transaction

            $ticket = new Ticket();
            $ticket->nama_lengkap = $request->nama_lengkap;
            $ticket->nik = $request->nik;
            $ticket->tanggal_lahir = $request->tanggal_lahir;
            $ticket->email = $request->email;
            $ticket->telepon = $request->telepon;
            $ticket->alamat_asal = $request->alamat_asal;
            $ticket->alamat_tujuan = $request->alamat_tujuan;
            $ticket->tanggal_pindah = $request->tanggal_pindah;
            $ticket->alasan_pindah = $request->alasan_pindah;
            $ticket->jumlah_anggota_keluarga = $request->jumlah_anggota_keluarga;
            $ticket->jenis_kelamin = $request->jenis_kelamin;
            $ticket->status_perkawinan = $request->status_perkawinan;

            if ($request->hasFile('dokumen_pendukung')) {
                $file = $request->file('dokumen_pendukung');
                $path = $file->store('dokumen_pendukung', 'public');
                $ticket->dokumen_pendukung = $path;
            }

            $ticket->komentar = $request->komentar;
            // Tambahkan nama pembuat tiket dari pengguna yang login
            $ticket->nama_pembuat = Auth::user()->nama_lengkap;
            $ticket->save();

            DB::commit(); // Commit transaction

            Log::info('Ticket saved successfully with ID: ' . $ticket->id);

            return response()->json(['success' => 'Tiket pelaporan kepindahan berhasil dibuat.']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation exception
            return response()->json(['error' => 'Gagal membuat tiket: ' . $e->validator->errors()->first()], 400);
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback transaction on error
            Log::error('Failed to create ticket: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            return response()->json(['error' => 'Gagal membuat tiket: ' . $e->getMessage()], 400);
        }
    }
    public function create()
    {
        try {
            DB::connection()->getPdo();
            Log::info("Database connected successfully");
        } catch (\Exception $e) {
            Log::error("Database connection failed: " . $e->getMessage());
        }
        return view('tickets.create'); // Pastikan file view ini benar ada di resources/views/tickets/create.blade.php
    }
}