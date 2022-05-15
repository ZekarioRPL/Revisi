<?php

namespace App\Http\Controllers;

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
            'kehadirans' => presensi::where('user_id', auth()->user()->id)->paginate(5)
        ]);
       }
      else{
        return redirect('/login');
      }
    }
}
