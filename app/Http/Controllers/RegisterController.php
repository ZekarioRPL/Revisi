<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// use Illuminate\Support\Facades\Hash; //jika menggunakan Hashing

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => "Tambah Karyawan",
        ]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'level' => 'required|max:255',
            'username' => 'required|min:3|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:6',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        // $validated['password'] = Hash::make($validated['password']); //bisa juga pakai ini

        User::create($validated);

        $request->session()->flash('bisa', 'Penambahan Anggota Telah Berhasil');
        
        return redirect('/karyawan');
    }
    public function lupapassword(){
        
        $search = User::latest();
        if (request('email')) {
            $search->where('email', 'like', request('email'));
        }
        $cek = $search->first();
        if (empty($cek)){
            return redirect('/lupa-password')->with('error', 'Tidak Ada data dengan kode');
        }
        return view('register.lupapassword', [
            'lupa' => $search->first(),
            'title' => "Lupa Password"
        ]);
        
        
    }

    public function ubah(Request $request, $id)
    {
        $validated = $request->validate([
            'password' => 'same:confirm_password',
            'confirm_password' => 'min:6'
        ]);

        $validated = bcrypt($validated['password']);
        
        $pw = User::where('id', $id)->first();
        $pw->password = $validated;
        $pw->update();

        return redirect('/login')->with('success', 'Penggantian password success');

    }
}
