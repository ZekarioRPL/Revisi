<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilPerusahaan;

class ProfilePerusahaanController extends Controller
{
    public function index(){
        return view('Karyawan.ProfilePerusahaan', [
            'title' => "Profile Perusahaan",
            'data' => ProfilPerusahaan::where('id', 1)->first()
        ]);
    }

    public function edit(){
        return view('Karyawan.perusahaan.edit', [
            'title' => "Edit Profile Perusahaan",
            'data' => ProfilPerusahaan::where('id', 1)->first()
        ]);
    }

    public function update(Request $request){
        $validate = $request->validate([
            'nama_perusahaan' => 'max:255',
            'kontak' => 'max:16',
            'alamat' => 'max:255',
            'bidang_perusahaan' => 'max:255',
            'email' => 'email',
            'image' => 'image|file|max:2048'
        ]);

        // update
        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
    	$validate['image'] = $request->file('image')->store('profile-perusahaan');
        }
        ProfilPerusahaan::where('id', 1)->update($validate);

        return redirect('/profile_perusahaan')->with('bisa', 'Data berhasil di update');
    }
}
