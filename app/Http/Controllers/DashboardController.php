<?php

namespace App\Http\Controllers;

use App\Models\presensi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('Karyawan.dashboard', [
            'title' => "Dashboard",
            'kehadirans' => presensi::where('user_id', auth()->user()->id)->paginate(5)
        ]);
    }
}
