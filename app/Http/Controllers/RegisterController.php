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
            'title' => "Register",
        ]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:6',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        // $validated['password'] = Hash::make($validated['password']); //bisa juga pakai ini

        User::create($validated);

        $request->session()->flash('success', 'Registrasi Berhasil! Silahkan Login');
        
        return redirect('/login');
    }
}
