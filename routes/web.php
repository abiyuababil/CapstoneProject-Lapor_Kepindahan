<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/dashboard/export/{type}', [DashboardController::class, 'exportData'])->name('dashboard.export');
Route::post('/dashboard/update-status/{id_laporan}', [DashboardController::class, 'updateStatus'])->name('ticket.updateStatus');
Route::patch('/dashboard/update-status/{id_laporan}', [DashboardController::class, 'updateStatus'])->name('ticket.updateStatus');


// Rute untuk menampilkan halaman registrasi
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Rute untuk tiket pelaporan kepindahan
Route::get('/ticket/create', [TicketController::class, 'create'])->name('ticket.create');
Route::post('/ticket', [TicketController::class, 'store'])->name('ticket.store');
