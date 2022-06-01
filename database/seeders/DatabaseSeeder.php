<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\ProfilPerusahaan;
use App\Models\shift;
use App\Models\status;
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
        User::create([
            'name' => 'Zidan',
            'level' => 'admin',
            'jenis_kelamin' => "laki-laki",
            "alamat" => "Ponorogo",
            'username' => 'zdn',
            'email' => 'zidan@gmail.com',
            'password' => bcrypt('zdn')
        ]);
        User::create([
            'name' => 'Veri Sandria',
            'level' => 'admin',
            'jenis_kelamin' => "laki-laki",
            "alamat" => "Ponorogo",
            'username' => 'veri',
            'email' => 'veri@gmail.com',
            'password' => bcrypt('veri')
        ]);
        User::create([
            'name' => 'Riki Agus',
            'level' => 'admin',
            'jenis_kelamin' => "laki-laki",
            "alamat" => "Ponorogo",
            'username' => 'riki',
            'email' => 'riki@gmail.com',
            'password' => bcrypt('riki')
        ]);

        ProfilPerusahaan::create([
            'nama_perusahaan' => 'Default',
            'kontak' => 'Default',
            'alamat' => "Default",
            'bidang_perusahaan' => 'Default',
            'email' => 'default@example.com',
        ]);
      
        status::create([
            'present_name' => 'Hadir'
        ]);
        status::create([
            'present_name' => 'Telat'
        ]);
        status::create([
            'present_name' => 'Izin'
        ]);
        status::create([
            'present_name' => 'Sakit'
        ]);
        shift::create([
            'shift_name' => 'SHIFT PAGI',
            'time_in' => '07:30:00',
            'time_out' => '12:30:00',
        ]);
        shift::create([
            'shift_name' => 'SHIFT SIANG',
            'time_in' => '12:30:00',
            'time_out' => '17:00:00',
        ]);
    }
}
