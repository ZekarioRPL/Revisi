<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\ProfilPerusahaan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'sefdani',
            'level' => 'admin',
            'jenis_kelamin' => "laki-laki",
            "alamat" => "Ponorogo",
            'username' => 'sefdani',
            'email' => 'sefdani@gmail.com',
            'password' => bcrypt('sefdani')
        ]);
        ProfilPerusahaan::create([
            'nama_perusahaan' => 'Default',
            'kontak' => 'Default',
            'alamat' => "Default",
            'bidang_perusahaan' => 'Default',
            'email' => 'default@example.com',
        ]);
    }
}
