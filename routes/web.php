<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilePerusahaanController;
use App\Http\Controllers\DataController;

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

Route::get('/', [DashboardController::class, 'index'])->name('login');
// Route::get('/profile_perusahaan', function () {
//     return view('Karyawan.ProfilePerusahaan', [
//         'title' => "Profile Perusahaan"
//     ]);
// })->middleware('auth');

Route::get('/', [DashboardController::class, 'index'])->name('login')->middleware('auth');
Route::get('/Silakan_Login', [LoginController::class, 'index'])->name('login')->middleware('guest');


Route::get('/edit', function () {
    return view('Karyawan.profil.editprofile', [
        'title' => "Edit Profile"
    ]);
})->middleware('auth');

// Route::get('/profil', function () {
//     return view('Karyawan.profil');
// });
Route::resource('/profils', ProfilController::class)->middleware('auth');
Route::resource('/shifts', ShiftController::class)->middleware('auth');
route::get('/profile_perusahaan',[ShiftController::class,'index'])->middleware('auth');


Route::post('/update', [ProfilController::class, 'update']);

// Route::get('/absensi', function () {
//     return view('Karyawan.absensi',[
//         'title' => "Absensi"
//     ]);
// });

Route::resource('/absensi', PresensiController::class)->middleware('auth');
route::post('/simpan-masuk',[PresensiController::class,'store']);
Route::get('/keluar', [PresensiController::class, 'keluar'])->middleware('auth');
Route::post('/presensi_pulang',[PresensiController::class,'presensipulang'])->name('ubah-presensi');
Route::get('/kehadiran',[PresensiController::class,'kehadiran'])->middleware('auth');
Route::get('/absen',[PresensiController::class,'absen'])->middleware('auth');

Route::get('/karyawan',[PresensiController::class,'karyawan'])->middleware('auth');

Route::resource('/gaji', GajiController::class)->middleware('auth');
Route::get('qrcode/{id}', [GajiController::class, 'generate'])->name('generate');
Route::get('/pembayaran', [GajiController::class, 'bayar']);
Route::post('/pembayaran/{id}', [GajiController::class, 'konfirmasi']);
// Route::get('/nominalgaji',[GajiController::class,'nominalgaji'])->middleware('auth');
// route::post('/nominal',[GajiController::class,'nominal']);

Route::resource('/login', LoginController::class)->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::resource('/registrasi', RegisterController::class)->middleware('guest');

Route::resource('/profile_perusahaan', ProfilePerusahaanController::class)->middleware('auth');
Route::get('/edit/profil-perusahaan', [ProfilePerusahaanController::class, 'edit']);
Route::post('/edit/profil-perusahaan', [ProfilePerusahaanController::class, 'update']);

Route::resource('/registrasi', RegisterController::class)->middleware('auth');

// QR
// Route::get('/qr', [DataController::class, 'index']);
// Route::post('/qr', [DataController::class, 'store'])->name('store');
// Route::get('qrcode/{id}', [DataController::class, 'generate'])->name('generate');

