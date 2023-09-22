<?php

use App\Http\Controllers\AbsenInstansiConroller;
use App\Http\Controllers\AbsenkuController;
use App\Http\Controllers\AbsenMhsController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\InstansiNilaiController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\ListAbsenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MdataController;
use App\Http\Controllers\MlokasiController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\MpenempatanController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\SuratIzinController;
use App\Http\Controllers\TugasAkhirController;
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
    return view('auth.login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::resource('akun', AkunController::class);
Route::resource('info', InfoController::class);
Route::resource('resume', ResumeController::class);

Route::resource('listabsen', ListAbsenController::class);
Route::resource('absensi', AbsenInstansiConroller::class);
Route::resource('absenku', AbsenkuController::class);
Route::resource('mahasiswa', MahasiswaController::class);

Route::put('surat/editstatus/{id_surat}', [SuratIzinController::class, 'editstatus'])->name('surat.editstatus');
Route::resource('surat', SuratIzinController::class);

Route::resource('jurnal', JurnalController::class);
Route::resource('tugasakhir', TugasAkhirController::class);
Route::resource('instansinilai', InstansiNilaiController::class);
Route::resource('monitoring', MonitoringController::class);

Route::resource('mdata', MdataController::class);
Route::resource('mlokasi', MlokasiController::class);
Route::resource('mpenempatan', MpenempatanController::class);


require __DIR__ . '/auth.php';
