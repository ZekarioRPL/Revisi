<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Karyawan.profil.profil', [
            'title' => "Profil",
            'game' => User::where('id', 1)->first()
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
            "user" => $User
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
            'password' => 'confirmed',
            'image' => 'image|file|max:2048',
            'name' => 'max:255',
            'jenis_Kelamin' => 'max:255',
            'alamat' => 'max:255',
            'username' => 'max:255'
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
        $user->jabatan = $request->jabatan;
    	if(!empty($request->password))
    	{
    		$user->password = Hash::make($request->password);
    	}
    	
    	$user->update();

    	return redirect('/profils')->with('bisa', 'Data Telah Di Edit!!');
        // $rules = [
        //     'name' => 'required|max:255',
        //     'jenis_Kelamin' => 'required|max:255',
        //     'alamat' => 'required|max:255',
        //     'username' => 'required|max:255'
        // ];

        // $bebassaja = $request->validate($rules);

        // // str::limit untuk membatasi | eps 19|10.20| laravel search : string helper
        // // ----------------------jika tidak ada---------------------------------ini-----maka akan default '....'

        // // search laravel = update | insert
        // User::where('id', 1)
        //         ->update($bebassaja);


        // // kembalikan ke halaman post
        // return redirect('/profils')->with('bisa', 'Selamat Data Telah Di Edit!!');
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
