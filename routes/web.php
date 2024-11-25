<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->name('login')
    ->middleware('guest');

Route::post('/login', [AuthController::class, 'login'])
    ->middleware('guest');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/ticket/{ticketId}/status', [AdminController::class, 'updateStatus'])->name('admin.ticket.updateStatus');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Pastikan route untuk update status tiket sudah benar
    Route::patch('/ticket/{id_laporan}/update-status', [DashboardController::class, 'updateStatus'])->name('ticket.updateStatus');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');

Route::get('/dashboard/export/{type}', [DashboardController::class, 'exportData'])
    ->name('dashboard.export')
    ->where('type', 'excel|pdf');

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