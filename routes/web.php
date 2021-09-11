<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PendidikController as AdminPendidikController;
use App\Http\Controllers\Admin\PesertaDidikController as AdminPesertaDidikController;
use App\Http\Controllers\Admin\PaketPembelajaranController as AdminPaketPembelajaranController;
use App\Http\Controllers\Admin\KonfirmasiPembayaranController as AdminKonfirmasiPembayaranController;

use App\Http\Controllers\PesertaDidik\RosterPembelajaranController;
use App\Http\Controllers\PesertaDidik\PaketPembelajaranController;
use App\Http\Controllers\PesertaDidik\PengaturanJadwalController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

/* MASTER ROUTE */

Route::get('/', function () {
    $role = Auth::user()->role;
    if ($role == 'admin') {
        return redirect()->route('admin.dashboard');
    } else if ($role == 'pendidik') {
        return abort(404);
    } else if ($role == 'peserta_didik') {
        return redirect()->route('peserta-didik.roster-pembelajaran');
    }
})->middleware(['auth']);

/* ADMIN */
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin', function () {
        return redirect()->route('admin.dashboard');
    });
    Route::get('/admin/dashboard', AdminDashboardController::class)->name('admin.dashboard');

    Route::get('/admin/pendidik', function () {
        return redirect()->route('admin.pendidik.daftar-pendidik');
    });
    Route::get('/admin/pendidik/daftar-pendidik', [AdminPendidikController::class, 'daftarPendidik'])->name('admin.pendidik.daftar-pendidik');
    Route::get('/admin/pendidik/tambah-pendidik', [AdminPendidikController::class, 'tambahPendidik'])->name('admin.pendidik.tambah-pendidik');
    Route::post('/admin/pendidik/tambah-pendidik', [AdminPendidikController::class, 'tambahPendidikProcess'])->name('admin.pendidik.tambah-pendidik@process');
    Route::get('/admin/pendidik/edit-pendidik/{id}', [AdminPendidikController::class, 'editPendidik'])->name('admin.pendidik.edit-pendidik');
    Route::put('/admin/pendidik/edit-pendidik/{id}', [AdminPendidikController::class, 'editPendidikProcess'])->name('admin.pendidik.edit-pendidik@process');
    Route::delete('/admin/pendidik/hapus-pendidik/{id}', [AdminPendidikController::class, 'hapusPendidik'])->name('admin.pendidik.hapus-pendidik');

    Route::get('/admin/peserta-didik', function () {
        return redirect()->route('admin.peserta-didik.daftar-peserta-didik');
    });
    Route::get('/admin/peserta-didik/daftar-peserta-didik', [AdminPesertaDidikController::class, 'daftarPesertaDidik'])->name('admin.peserta-didik.daftar-peserta-didik');
    Route::get('/admin/peserta-didik/tambah-peserta-didik', [AdminPesertaDidikController::class, 'tambahPesertaDidik'])->name('admin.peserta-didik.tambah-peserta-didik');
    Route::post('/admin/peserta-didik/tambah-peserta-didik', [AdminPesertaDidikController::class, 'tambahPesertaDidikProcess'])->name('admin.peserta-didik.tambah-peserta-didik@process');
    Route::get('/admin/peserta-didik/edit-peserta-didik/{id}', [AdminPesertaDidikController::class, 'editPesertaDidik'])->name('admin.peserta-didik.edit-peserta-didik');
    Route::put('/admin/peserta-didik/edit-peserta-didik/{id}', [AdminPesertaDidikController::class, 'editPesertaDidikProcess'])->name('admin.peserta-didik.edit-peserta-didik@process');
    Route::delete('/admin/peserta-didik/hapus-peserta-didik/{id}', [AdminPesertaDidikController::class, 'hapusPesertaDidik'])->name('admin.peserta-didik.hapus-peserta-didik');

    Route::get('/admin/paket-pembelajaran', function () {
        return redirect()->route('admin.paket-pembelajaran.daftar-paket-pembelajaran');
    });
    Route::get('/admin/paket-pembelajaran/daftar-paket-pembelajaran', [AdminPaketPembelajaranController::class, 'daftarPaketPembelajaran'])->name('admin.paket-pembelajaran.daftar-paket-pembelajaran');
    Route::get('/admin/paket-pembelajaran/tambah-paket-pembelajaran', [AdminPaketPembelajaranController::class, 'tambahPaketPembelajaran'])->name('admin.paket-pembelajaran.tambah-paket-pembelajaran');
    Route::post('/admin/paket-pembelajaran/tambah-paket-pembelajaran', [AdminPaketPembelajaranController::class, 'tambahPaketPembelajaranProcess'])->name('admin.paket-pembelajaran.tambah-paket-pembelajaran@process');
    Route::get('/admin/paket-pembelajaran/edit-paket-pembelajaran/{id}', [AdminPaketPembelajaranController::class, 'editPaketPembelajaran'])->name('admin.paket-pembelajaran.edit-paket-pembelajaran');
    Route::post('/admin/paket-pembelajaran/edit-paket-pembelajaran/{id}', [AdminPaketPembelajaranController::class, 'editPaketPembelajaranProcess'])->name('admin.paket-pembelajaran.edit-paket-pembelajaran@process');
    Route::delete('/admin/paket-pembelajaran/hapus-paket-pembelajaran/{id}', [AdminPaketPembelajaranController::class, 'hapusPaketPembelajaran'])->name('admin.paket-pembelajaran.hapus-paket-pembelajaran');

    Route::get('/admin/konfirmasi-pembayaran', [AdminKonfirmasiPembayaranController::class, 'index'])->name('admin.konfirmasi-pembayaran');
    Route::post('/admin/konfirmasi-pembayaran/{user_id}', [AdminKonfirmasiPembayaranController::class, 'process'])->name('admin.konfirmasi-pembayaran@process');
});


/* PESERTA DIDIK */
Route::middleware(['auth', 'isPesertaDidik'])->group(function () {
    Route::get('/peserta-didik', function () {
        return redirect()->route('peserta-didik.roster-pembelajaran');
    });
    Route::get('/peserta-didik/roster-pembelajaran', RosterPembelajaranController::class)->name('peserta-didik.roster-pembelajaran');
    Route::get('/peserta-didik/pengaturan-jadwal', PengaturanJadwalController::class)->name('peserta-didik.pengaturan-jadwal');
    Route::get('/peserta-didik/paket-pembelajaran', PaketPembelajaranController::class)->name('peserta-didik.paket-pembelajaran');
    Route::post('/peserta-didik/paket-pembelajaran/tambah-paket/{paketId}', [PaketPembelajaranController::class, 'tambahPaket'])->name('peserta-didik.paket-pembelajaran.tambah-paket');
    Route::delete('/peserta-didik/paket-pembelajaran/batalkan-paket/{paketId}', [PaketPembelajaranController::class, 'batalkanPaket'])->name('peserta-didik.paket-pembelajaran.batalkan-paket');
});

require __DIR__ . '/auth.php';
