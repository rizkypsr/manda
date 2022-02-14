<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\SiswaController;
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

Route::redirect('/', '/dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('/dashboard', DashboardController::class);
    Route::resource('/informasi', InformasiController::class);
    Route::resource('/kelas', KelasController::class);
    Route::resource('/mapel', MapelController::class);
    Route::resource('/siswa', SiswaController::class);
    Route::resource('/guru', GuruController::class);

    Route::get('/{id}/detail-kelas', [KelasController::class, 'detail'])->name('kelas.detail');
});

require __DIR__ . '/auth.php';
