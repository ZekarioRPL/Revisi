<?php

namespace App\Http\Controllers;

use App\Models\gaji;
use App\Models\user;
use App\Models\shift;
use App\Models\presensi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('Karyawan.dashboard', [
            'title' => "Dashboard",
            'kehadirans' => presensi::latest()->paginate(4)->all(),
            'gaji_karyawans' => gaji::all(),
            'shift' => shift::first()
        ]);
    }
    public function listkaryawan()
    {
        return view('Karyawan.listkaryawan', [
            'title' => "List Karyawan",
            'listkaryawans' => user::all()
        ]);
    }
}
