<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CetakLaporanController;
use App\Models\Gudang;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [UserController::class, 'home'])->name('pmb.home');

// Login
Route::get('/login', [UserController::class, 'index'])->name('user.login');
Route::get('/admin/login', [UserController::class, 'login_admin'])->name('admin.login');
Route::post('/login', [UserController::class, 'login'])->name('user.proseslogin');
// Register
Route::get('/daftar', [UserController::class, 'daftar'])->name('user.daftar');
Route::post('/daftar', [UserController::class, 'store'])->name('user.prosesdaftar');
Route::post('/register', [UserController::class, 'registerAccount'])->name('user.register');
Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');

Route::get('/cetaklaporan', CetakLaporanController::class);

// Dashboard
Route::redirect('/dashboard', '/dashboard/history')->name('dashboard.index')->middleware('auth');

Route::prefix('dashboard')->group(function () {
    // User
    Route::get('/pendaftaran', [UserController::class, 'pendaftaran'])->name('dashboard.home')->middleware('auth');
    Route::get('/pendaftaran/add', [PendaftaranController::class, 'create'])->name('dashboard.daftar_add')->middleware('auth');
    Route::post('/pendaftaran/add', [PendaftaranController::class, 'store'])->name('dashboard.daftar_post')->middleware('auth');
    Route::get('/pendaftaran/update/{id}', [PendaftaranController::class, 'edit'])->name('dashboard.daftar_update')->middleware('auth');
    Route::put('/pendaftaran/update/{id}', [PendaftaranController::class, 'update'])->name('dashboard.daftar_put')->middleware('auth');
    Route::delete('/pendaftaran/delete/{id}', [PendaftaranController::class, 'destroy'])->name('dashboard.daftar_delete')->middleware('auth');
    Route::get('/history', [PendaftaranController::class, 'history'])->name('dashboard.history')->middleware('auth');

    // Admin
    Route::get('admin/list_pendaftaran', [PendaftaranController::class, 'index'])->name('dashboard.list_pendaftaran')->middleware('auth');
    Route::get('/admin/list_pendaftar', [PendaftaranController::class, 'listPendaftar'])->name('dashboard.list_pendaftar')->middleware('auth');

    // Route::get('/admin', [UserController::class, 'index'])->name('dashboard.admin')->middleware('auth');
    Route::get('/admin/user/add', [UserController::class, 'create'])->name('dashboard.admin_add')->middleware('auth');
    Route::post('/admin/user/add', [UserController::class, 'store'])->name('dashboard.admin_post')->middleware('auth');
    Route::get('/admin/user/update/{id}', [UserController::class, 'edit'])->name('dashboard.admin_update')->middleware('auth');
    Route::put('/admin/user/update/{id}', [UserController::class, 'update'])->name('dashboard.admin_put')->middleware('auth');
    Route::delete('/admin/user/delete/{id}', [UserController::class, 'destroy'])->name('dashboard.admin_delete')->middleware('auth');
});
