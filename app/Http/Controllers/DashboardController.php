<?php

namespace App\Http\Controllers;

use App\Models\gaji;
use App\Models\user;
use App\Models\shift;
use App\Models\presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
       if (Auth::user()){
        return view('Karyawan.dashboard', [
            'title' => "Dashboard",
            'kehadirans' => presensi::latest()->paginate(4)->all(),
            'gaji_karyawans' => gaji::all(),
            'shift' => shift::first()
        ]);
    }
    }

}
