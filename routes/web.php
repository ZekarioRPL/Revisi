<?php

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
    return view('Karyawan.dashboard');
});

Route::get('/Beranda', function () {
    return view('Karyawan.dashboard');
});

Route::get('/profil', function () {
    return view('Karyawan.profil');
});
Route::get('/absensi', function () {
    return view('Karyawan.absensi');
});
Route::get('/gaji', function () {
    return view('Karyawan.gaji');
});