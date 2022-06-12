<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use App\Models\User;
use App\Models\shift;
use App\Models\presensi;
use App\Models\totalgaji;
use Illuminate\Http\Request;
use App\Models\ProfilPerusahaan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StorepresensiRequest;
use App\Http\Requests\UpdatepresensiRequest;

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
            'absens' => presensi::latest()->get(),
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
        if (empty($request->latitude) && empty($request->longitude)) {
            return redirect('/absensi')->with('tidakbisa', 'Tolong Aktifkan Lokasi Anda');
        }
        // if (empty($request->radio)) {
        //     return redirect('/absensi')->with('tidakbisa', '');
        // }

        if (!empty($user->shift_id)) {
                    $presensi = Presensi::where([
                        ['user_id','=',auth()->user()->id],
                        ['tgl','=',$tanggal],
                    ])->first();
                    $sudahabsen = Presensi::where([
                        ['user_id','=',auth()->user()->id],
                        ['tgl','=',$tanggal],
                    ])->whereNotIn('jammasuk', [''])->first();
                    if ($sudahabsen){
                        return redirect('/')->with('tidakbisa', 'Hari ini Anda Telah Absen Masuk');
                    }elseif($presensi){
                        $presensi->user_id = auth()->user()->id;
                        $presensi->latitude = $request->latitude;
                        $presensi->longitude = $request->longitude;
                        $presensi->status = $request->radio;
                        $presensi->shift_id = auth()->user()->shift_id;
                        $presensi->tgl = $tanggal;
                        $presensi->jammasuk = $localtime;
                        $presensi->update();
                        // $up=[
                        //     'user_id' => auth()->user()->id,
                        //     'latitude' => $request->latitude,
                        //     'status' => $request->radio,
                        //     'shift_id' =>  auth()->user()->shift_id,
                        //     'longitude' => $request->longitude,
                        //     'tgl' => $tanggal,
                        //     'jammasuk' => $localtime,
                        // ];
                        // $presensi->update($up);
                    }
                    return redirect('/')->with('bisa', 'Anda Telah Berhasil Absen');
        } else {
            return redirect('/')->with('tidakbisa', 'Absen Belum bisa dilakukan. Mohon atur shift anda di Menu Profil');
        }
    }
    public function oto()
    {
        $timezone = 'Asia/Jakarta'; 
        $date = new DateTime('now', new DateTimeZone($timezone)); 
        $tanggal = $date->format('Y-m-d');
        $presensi1 = presensi::where('tgl', $tanggal)->first();
            $pre_users = User::where('level', 'karyawan')->get();
            foreach ($pre_users as $pre_user) {
                $cek = presensi::where('tgl', $tanggal)->where('user_id', $pre_user->id)->first();
                
                if (empty($cek)) {
                    $pre = new presensi;
                    $pre->user_id = $pre_user->id;
                    $pre->tgl = $tanggal;
                    $pre->save();
                }
            }
        return redirect('absensi');
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
        if (empty($presensi->jammasuk)) {
            return redirect('/')->with('tidakbisa', 'Anda Belum Absen Masuk');
        }
        $dt=[
            'jamkeluar' => $localtime,
            'jamkerja' => date('H:i:s', strtotime($localtime) - strtotime($presensi->jammasuk))
        ];

        if ($presensi->jamkeluar == ""){
            $presensi->update($dt);
            return redirect('/')->with('bisa', 'Anda Berhasil Absen Keluar');
        }else{
            return redirect('/')->with('tidakbisa', 'Hari ini Anda Telah Absen Keluar');
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
            'dt' => User::where('id', $id)->first(),
            'jabatans' => totalgaji::all()
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
        $ub->jabatan_id = $request->jabatan;
        $ub->update();

        return redirect('/karyawan')->with('success', 'Ubah data user sukses');

    }
}
