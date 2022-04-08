<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

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
Route::get('/', [DashboardController::class, 'index'])->name('login')->middleware('auth');
Route::get('/profile_perusahaan', function () {
    return view('Karyawan.ProfilePerusahaan', [
        'title' => "Profile Perusahaan"
    ]);
})->middleware('auth');
Route::get('/edit', function () {
    return view('Karyawan.profil.editprofile', [
        'title' => "Edit Profile"
    ]);
})->middleware('auth');
Route::get('/list_karyawan', function () {
    return view('Karyawan.listkaryawan', [
        'title' => "List Karyawan"
    ]);
})->middleware('auth');

// Route::get('/profil', function () {
//     return view('Karyawan.profil');
// });
Route::resource('/profils', ProfilController::class)->middleware('auth');

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

Route::get('/gaji', function () {
    return view('Karyawan.gaji', [
        'title' => "Gaji"
    ]);
})->middleware('auth');
Route::resource('/login', LoginController::class)->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::resource('/registrasi', RegisterController::class)->middleware('guest');