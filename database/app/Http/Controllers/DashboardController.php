<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Di dalam DashboardController
    public function index()
    {
        if (Auth::check()) {
            // pastikan user sudah login
            $user = Auth::user();
            return view('dashboard', compact('user'));
        } else {
            // jika user tidak login, redirect ke login
            return redirect()->route('login');
        }
    }

}