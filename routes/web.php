<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PendidikController;
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
Route::get('/admin/pendidik/daftar-pendidik', [PendidikController::class, 'daftarPendidik'])->middleware(['auth'])->name('admin.pendidik.daftar-pendidik');

require __DIR__.'/auth.php';
