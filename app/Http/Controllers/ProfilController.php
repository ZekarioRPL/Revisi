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
use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\Crypt;
// use Illuminate\Contracts\Encryption\DecryptException;


class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hadir = presensi::where('user_id', auth()->user()->id)->where('status', 'hadir')->get();
        $sakit = presensi::where('user_id', auth()->user()->id)->where('status', 'sakit')->get();
        $izin = presensi::where('user_id', auth()->user()->id)->where('status', 'izin')->get();
        $tidakhadir = presensi::where('user_id', auth()->user()->id)->where('status', null)->get();
        $jumlah_hadir = count($hadir);
        $jumlah_sakit = count($sakit);
        $jumlah_izin = count($izin);
        $jumlah_tidakhadir = count($tidakhadir);
        return view('Karyawan.profil.profil', compact('jumlah_hadir', 'jumlah_sakit', 'jumlah_izin', 'jumlah_tidakhadir'),[
            'title' => "Profil",
            'game' => User::where('id', 1)->first(),
            'shift' => User::where('id', auth()->user()->id)->first(),
            'data' => ProfilPerusahaan::where('id', 1)->first()

        ]);
    }

    public function editprofile()
    {
        return view('Karyawan.profil.editprofile', [
            'title' => "Edit Profile",
            'shifts' => shift::all(),
            'data' => ProfilPerusahaan::where('id', 1)->first(),
            'jabatans' => totalgaji::all()

            // 'encrypt' => User::where('id', Auth::user()->id)->pluck('jenis_kelamin'),
            // 'decrypted' => Crypt::decryptString($encrypt),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('karyawan.profil.defaultprofile', [
        //     "title" => 'Profil',
        //     'profils' => Profil::where('user_id', auth()->user()->id)->get()
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function show(User $User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function edit(User $User)
    {
        return view('karyawan.dashboard', [
            "title" => 'Edit Profile',
            "user" => $User,
            'data' => ProfilPerusahaan::where('id', 1)->first(),

        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'password' => 'same:confirm_password',
            'confirm_password' => 'max:255',
            'image' => 'image|file|max:2048',
            'name' => 'max:255',
            'jenis_Kelamin' => 'max:255',
            'alamat' => 'max:255',
            'username' => 'max:255',
        ]);

        // $timezone = 'Asia/Jakarta'; 
        // $date = new DateTime('now', new DateTimeZone($timezone)); 
        // $tanggal = $date->format('Y-m-d');
        // $presensi1 = presensi::where('tgl', $tanggal)->first();
        // if (empty($presensi1)) {
        //     $pre_users = User::where('level', 'karyawan')->get();
        //     foreach ($pre_users as $pre_user) {
        //         $pre = new presensi;
        //         $pre->user_id = $pre_user->id;
        //         $pre->tgl = $tanggal;
        //         $pre->save();
        //     }
        // }

        $user = User::where('id', Auth::user()->id)->first();
        $user->username = $request->username;
    	$user->name = $request->name;
    	$user->email = $request->email;
        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
    	$user->image = $request->file('image')->store('post-image');
        }
    	$user->jenis_kelamin = $request->jenis_kelamin;
    	$user->alamat = $request->alamat;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->jabatan_id = $request->jabatan;
        $user->shift_id = $request->shift;
    	if(!empty($request->password))
    	{
    		$user->password = Hash::make($request->password);
    	}
    	
    	$user->update();

    	return redirect('/profils')->with('bisa', 'Data Telah Di Edit!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $User)
    {
        //
    }
}
