<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;

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

// Route::get('/profil', function () {
//     return view('Karyawan.profil');
// });
Route::resource('/profils', ProfilController::class);

Route::get('/absensi', function () {
    return view('Karyawan.absensi',[
        'title' => "Absensi"
    ]);
});
Route::get('/gaji', function () {
    return view('Karyawan.gaji', [
        'title' => "Gaji"
    ]);
});