<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->name('login')
    ->middleware('guest');

Route::post('/login', [AuthController::class, 'login'])
    ->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');

// Rute untuk menampilkan halaman registrasi
Route::get('/register', [AuthController::class, 'showRegisterForm'])
    ->name('register');

// Rute untuk menangani proses registrasi
Route::post('/register', [AuthController::class, 'register'])
    ->name('register.submit');

// Rute untuk tiket pelaporan kepindahan
Route::get('/ticket/create', [TicketController::class, 'create'])
    ->name('ticket.create')
    ->middleware('auth');

Route::post('/ticket', [TicketController::class, 'store'])
    ->name('ticket.store')
    ->middleware('auth');