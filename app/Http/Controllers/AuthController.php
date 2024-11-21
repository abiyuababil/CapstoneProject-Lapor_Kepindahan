<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Gantilah dengan model pengguna yang sesuai

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Menampilkan form register
    public function showRegisterForm()
    {
        return view('auth.register');  // Pastikan tampilan ada di folder resources/views/auth/register.blade.php
    }

    // Menangani proses registrasi
    public function register(Request $request)
    {
        // Validasi data yang dimasukkan
        $validator = Validator::make($request->all(), [
            'nik' => 'required|unique:users,nik',
            'email' => 'required|email|unique:users,email',
            'nama_lengkap' => 'required|max:255',
            'password' => 'required|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Membuat pengguna baru
        $user = User::create([
            'nik' => $request->nik,
            'email' => $request->email,
            'nama_lengkap' => $request->nama_lengkap,
            'password' => Hash::make($request->password),
            // 'role' => $request->role,
        ]);

        // Auto login setelah registrasi
        auth()->login($user);

        // Redirect ke dashboard
        return redirect()->route('dashboard');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'nik' => 'required',
            'password' => 'required',
        ]);

        // Cek kredensial
        if (Auth::attempt(['nik' => $request->nik, 'password' => $request->password])) {
            return redirect()->route('dashboard');
        } else {
            return back()->withErrors(['nik' => 'NIK atau Password salah.']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
