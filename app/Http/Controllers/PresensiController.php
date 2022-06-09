<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use App\Models\User;
use App\Models\ProfilPerusahaan;
use App\Models\shift;
use App\Models\presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorepresensiRequest;
use App\Http\Requests\UpdatepresensiRequest;
use Illuminate\Support\Facades\Hash;

class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Karyawan.absensi.masuk',[
            'title' => "Absensi Masuk",
            'data' => ProfilPerusahaan::where('id', 1)->first()
        ]);
    }
    public function keluar()
    {
        return view('Karyawan.absensi.keluar',[
            'title' => "Absensi Keluar",
            'data' => ProfilPerusahaan::where('id', 1)->first()
        ]);
    }
    public function kehadiran()
    {
        return view('Karyawan.absensi.kehadiran',[
            'title' => "Kehadiran",
            'kehadirans' => presensi::where('user_id', auth()->user()->id)->latest()->get(),
            'tanggalPertama' => presensi::where('user_id', auth()->user()->id)->latest()->first(),
            'shift' => shift::where('id', auth()->user()->shift_id)->first(),
            'data' => ProfilPerusahaan::where('id', 1)->first()
        ]);
    }
    public function absen()
    {
        return view('admin.absen',[
            'title' => "Absen",
            'absens' => presensi::all(),
            'shift' => shift::first(),
            'data' => ProfilPerusahaan::where('id', 1)->first()

        ]);
    }
    public function karyawan()
    {
        return view('admin.karyawan', [
            'title' => "Karyawan",
            'karyawans' => User::where('level', 'karyawan')->get(),
            'data' => ProfilPerusahaan::where('id', 1)->first()

        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepresensiRequest  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(StorepresensiRequest $request)
    public function store(Request $request)
    {
        $timezone = 'Asia/Jakarta'; 
        $date = new DateTime('now', new DateTimeZone($timezone)); 
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');
        $user = user::where('id', auth()->user()->id)->first();

        if (!empty($user->shift_id)) {
                    $presensi = Presensi::where([
                        ['user_id','=',auth()->user()->id],
                        ['tgl','=',$tanggal],
                    ])->first();
                    if ($presensi){
                        dd("sudah ada");
                    }else{
                        if($tanggal > '07:00:00'){
                            return back()->with('error', 'Absen ditutup jam 7 tadi');
                        }else{
                            Presensi::create([
                                'user_id' => auth()->user()->id,
                                'latitude' => $request->latitude,
                                'shift_id' =>  auth()->user()->shift_id,
                                'longitude' => $request->longitude,
                                'tgl' => $tanggal,
                                'jammasuk' => $localtime,
                            ]);
                        }
                        
                    }
                    return redirect('/');
        } else {
            return redirect('/')->with('tidakbisa', 'Absen Belum bisa dilakukan. Mohon atur shift anda di Menu Profil');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\presensi  $presensi
     * @return \Illuminate\Http\Response
     */
    public function show(presensi $presensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\presensi  $presensi
     * @return \Illuminate\Http\Response
     */
    public function edit(presensi $presensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepresensiRequest  $request
     * @param  \App\Models\presensi  $presensi
     * @return \Illuminate\Http\Response
     */
    
    public function presensipulang(){
        $timezone = 'Asia/Makassar'; 
        $date = new DateTime('now', new DateTimeZone($timezone)); 
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');
        
        $presensi = Presensi::where([
            ['user_id','=',auth()->user()->id],
            ['tgl','=',$tanggal],
        ])->first();
        
        $dt=[
            'jamkeluar' => $localtime,
            'jamkerja' => date('H:i:s', strtotime($localtime) - strtotime($presensi->jammasuk))
        ];

        if ($presensi->jamkeluar == ""){
            $presensi->update($dt);
            return redirect('/');
        }else{
            dd("sudah ada");
        }
    }

    public function update(UpdatepresensiRequest $request, presensi $presensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\presensi  $presensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(presensi $presensi)
    {
        //
    }

    public function ubahpw($id){
        return view('admin.ubahpassword', [
            'title' => 'Ubah Password',
            'dt' => User::where('id', $id)->first()
        ]);
    }

    public function ubah(Request $request, $id){
        $this->validate($request, [
            'email' => 'email:dns',
            'password' => 'same:confirm_password',
            'confirm_password' => 'max:255',
            'jabatan' => 'max:255'
        ]);

        $ub = User::where('id', $id)->first();
        $ub->email = $request->email;
        if(!empty($request->password))
    	{
    		$ub->password = Hash::make($request->password);
    	}
        $ub->jabatan = $request->jabatan;
        $ub->update();

        return redirect('/karyawan')->with('success', 'Ubah data user sukses');

    }
}
