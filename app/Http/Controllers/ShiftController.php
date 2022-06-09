<?php

namespace App\Http\Controllers;

use App\Models\shift;
use App\Models\ProfilPerusahaan;
use App\Http\Requests\StoreshiftRequest;
use App\Http\Requests\UpdateshiftRequest;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Karyawan.ProfilePerusahaan', [
            'title' => "Profile Perusahaan",
            'shifts' => shift::all()
        ]);
    }
    public function perusahaan()
    {
        return view('Karyawan.ProfilePerusahaan', [
            'title' => "Profile Perusahaan",
            'shifts' => shift::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Karyawan.shift.tambahshift', [
            'title' => "Tambah Shift",
            'data' => ProfilPerusahaan::where('id', 1)->first()
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreshiftRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'shift_name' => 'required|max:255',
            'time_in' => 'required|max:255',
            'time_out' => 'required|max:255',
        ]);

        shift::create($validated);

        $request->session()->flash('success', 'Registrasi Berhasil! Silahkan Login');
        
        return redirect('/profile_perusahaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function show(shift $shift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function edit(shift $shift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateshiftRequest  $request
     * @param  \App\Models\shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateshiftRequest $request, shift $shift)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function destroy(shift $shift)
    {
        shift::destroy($shift->id);
        // kembalikan ke halaman post
        return redirect('/profile_perusahaan')->with('bisa', 'Selamat Data Telah DIhapus!!');
    }
}
