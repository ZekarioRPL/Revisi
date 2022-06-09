<?php

namespace App\Http\Controllers;

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
        $hadir = presensi::where('user_id', auth()->user()->id)->get();
        $jumlah_hadir = count($hadir);
        return view('Karyawan.profil.profil', compact('jumlah_hadir'),[
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
