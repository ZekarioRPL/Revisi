<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PresensiController;

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
    return view('Karyawan.dashboard', [
        'title' => "Dashboard"
    ]);
});
Route::get('/kehadiran', function () {
    return view('Karyawan.absensi.kehadiran', [
        'title' => "Kehadiran"
    ]);
});
Route::get('/profile_perusahaan', function () {
    return view('Karyawan.ProfilePerusahaan', [
        'title' => "Profile Perusahaan"
    ]);
});
Route::get('/edit', function () {
    return view('Karyawan.profil.editprofile', [
        'title' => "Edit Profile"
    ]);
});
Route::get('/list_karyawan', function () {
    return view('Karyawan.listkaryawan', [
        'title' => "List Karyawan"
    ]);
});

// Route::get('/profil', function () {
//     return view('Karyawan.profil');
// });
Route::resource('/profils', ProfilController::class);

// Route::get('/absensi', function () {
//     return view('Karyawan.absensi',[
//         'title' => "Absensi"
//     ]);
// });
Route::resource('/absensi', PresensiController::class);
Route::get('/keluar', [PresensiController::class, 'keluar']);

Route::get('/gaji', function () {
    return view('Karyawan.gaji', [
        'title' => "Gaji"
    ]);
});