<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;

class DashboardController extends Controller
{
    // Di dalam DashboardController
    public function index()
    {
        if (Auth::check()) {
            // pastikan user sudah login
            $user = Auth::user();
            // Ambil tiket milik user berdasarkan NIK
            $tickets = Ticket::where('nama_pembuat', $user->nama_lengkap)->get();
            return view('dashboard', compact('user', 'tickets'));
        } else {
            // jika user tidak login, redirect ke login
            return redirect()->route('login');
        }
    }

}