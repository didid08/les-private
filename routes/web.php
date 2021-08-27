<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PendidikController as AdminPendidikController;
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

require __DIR__ . '/auth.php';
