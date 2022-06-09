<?php

namespace App\Http\Controllers;

use App\Models\totalgaji;
use Illuminate\Http\Request;
use App\Models\ProfilPerusahaan;
use App\Http\Requests\StoretotalgajiRequest;
use App\Http\Requests\UpdatetotalgajiRequest;

class TotalgajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jabatan.tambah', [
            'title' => "Tambah Jabatan",
            'data' => ProfilPerusahaan::where('id', 1)->first()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretotalgajiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'jabatan' => 'required|max:255',
            'gaji' => 'required',
        ]);

        totalgaji::create($validated);

        $request->session()->flash('bisa', 'Penambahan Jabatan Telah Berhasil');
        
        return redirect('/profile_perusahaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\totalgaji  $totalgaji
     * @return \Illuminate\Http\Response
     */
    public function show(totalgaji $totalgaji)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\totalgaji  $totalgaji
     * @return \Illuminate\Http\Response
     */
    public function edit(totalgaji $totalgaji)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetotalgajiRequest  $request
     * @param  \App\Models\totalgaji  $totalgaji
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetotalgajiRequest $request, totalgaji $totalgaji)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\totalgaji  $totalgaji
     * @return \Illuminate\Http\Response
     */
    public function destroy(totalgaji $totalgaji)
    {
        //
    }
}
