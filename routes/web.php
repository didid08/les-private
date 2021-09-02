<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PendidikController as AdminPendidikController;
use App\Http\Controllers\Admin\PesertaDidikController as AdminPesertaDidikController;
use App\Http\Controllers\Admin\PaketPembelajaranController as AdminPaketPembelajaranController;
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

Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});

/* ADMIN */
Route::get('/admin', function () {
    return redirect()->route('admin.dashboard');
});
Route::get('/admin/dashboard', AdminDashboardController::class)->middleware(['auth'])->name('admin.dashboard');

Route::get('/admin/pendidik', function () {
    return redirect()->route('admin.pendidik.daftar-pendidik');
});
    Route::get('/admin/pendidik/daftar-pendidik', [AdminPendidikController::class, 'daftarPendidik'])->middleware(['auth'])->name('admin.pendidik.daftar-pendidik');
    Route::get('/admin/pendidik/tambah-pendidik', [AdminPendidikController::class, 'tambahPendidik'])->middleware(['auth'])->name('admin.pendidik.tambah-pendidik');
    Route::post('/admin/pendidik/tambah-pendidik', [AdminPendidikController::class, 'tambahPendidikProcess'])->middleware(['auth'])->name('admin.pendidik.tambah-pendidik@process');
    Route::get('/admin/pendidik/edit-pendidik/{id}', [AdminPendidikController::class, 'editPendidik'])->middleware(['auth'])->name('admin.pendidik.edit-pendidik');
    Route::put('/admin/pendidik/edit-pendidik/{id}', [AdminPendidikController::class, 'editPendidikProcess'])->middleware(['auth'])->name('admin.pendidik.edit-pendidik@process');
    Route::delete('/admin/pendidik/hapus-pendidik/{id}', [AdminPendidikController::class, 'hapusPendidik'])->middleware(['auth'])->name('admin.pendidik.hapus-pendidik');

Route::get('/admin/peserta-didik', function () {
    return redirect()->route('admin.peserta-didik.daftar-peserta-didik');
});
    Route::get('/admin/peserta-didik/daftar-peserta-didik', [AdminPesertaDidikController::class, 'daftarPesertaDidik'])->middleware(['auth'])->name('admin.peserta-didik.daftar-peserta-didik');
    Route::get('/admin/peserta-didik/tambah-peserta-didik', [AdminPesertaDidikController::class, 'tambahPesertaDidik'])->middleware(['auth'])->name('admin.peserta-didik.tambah-peserta-didik');
    Route::post('/admin/peserta-didik/tambah-peserta-didik', [AdminPesertaDidikController::class, 'tambahPesertaDidikProcess'])->middleware(['auth'])->name('admin.peserta-didik.tambah-peserta-didik@process');
    Route::get('/admin/peserta-didik/edit-peserta-didik/{id}', [AdminPesertaDidikController::class, 'editPesertaDidik'])->middleware(['auth'])->name('admin.peserta-didik.edit-peserta-didik');
    Route::put('/admin/peserta-didik/edit-peserta-didik/{id}', [AdminPesertaDidikController::class, 'editPesertaDidikProcess'])->middleware(['auth'])->name('admin.peserta-didik.edit-peserta-didik@process');
    Route::delete('/admin/peserta-didik/hapus-peserta-didik/{id}', [AdminPesertaDidikController::class, 'hapusPesertaDidik'])->middleware(['auth'])->name('admin.peserta-didik.hapus-peserta-didik');

Route::get('/admin/paket-pembelajaran', function () {
    return redirect()->route('admin.paket-pembelajaran.daftar-paket-pembelajaran');
});
    Route::get('/admin/paket-pembelajaran/daftar-paket-pembelajaran', [AdminPaketPembelajaranController::class, 'daftarPaketPembelajaran'])->middleware(['auth'])->name('admin.paket-pembelajaran.daftar-paket-pembelajaran');
    Route::get('/admin/paket-pembelajaran/tambah-paket-pembelajaran', [AdminPaketPembelajaranController::class, 'tambahPaketPembelajaran'])->middleware(['auth'])->name('admin.paket-pembelajaran.tambah-paket-pembelajaran');
    Route::post('/admin/paket-pembelajaran/tambah-paket-pembelajaran', [AdminPaketPembelajaranController::class, 'tambahPaketPembelajaranProcess'])->middleware(['auth'])->name('admin.paket-pembelajaran.tambah-paket-pembelajaran@process');
    Route::get('/admin/paket-pembelajaran/edit-paket-pembelajaran/{id}', [AdminPaketPembelajaranController::class, 'editPaketPembelajaran'])->middleware(['auth'])->name('admin.paket-pembelajaran.edit-paket-pembelajaran');
    Route::post('/admin/paket-pembelajaran/edit-paket-pembelajaran/{id}', [AdminPaketPembelajaranController::class, 'editPaketPembelajaranProcess'])->middleware(['auth'])->name('admin.paket-pembelajaran.edit-paket-pembelajaran@process');
    Route::delete('/admin/paket-pembelajaran/hapus-paket-pembelajaran/{id}', [AdminPaketPembelajaranController::class, 'hapusPaketPembelajaran'])->middleware(['auth'])->name('admin.paket-pembelajaran.hapus-paket-pembelajaran');

require __DIR__ . '/auth.php';
