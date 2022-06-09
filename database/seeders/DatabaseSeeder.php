<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\shift;
use App\Models\status;
use App\Models\totalgaji;
use Illuminate\Database\Seeder;
use App\Models\ProfilPerusahaan;

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
            'name' => 'admin',
            'level' => 'admin',
            'jenis_kelamin' => "laki-laki",
            "alamat" => "Ponorogo",
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin')
        ]);
        User::create([
            'name' => 'sefdani',
            'level' => 'karyawan',
            'jenis_kelamin' => "laki-laki",
            "alamat" => "Ponorogo",
            'username' => 'sefdani',
            'email' => 'sefdani@gmail.com',
            'password' => bcrypt('sefdani')
        ]);
        User::create([
            'name' => 'Zidan',
            'level' => 'karyawan',
            'jenis_kelamin' => "laki-laki",
            "alamat" => "Ponorogo",
            'username' => 'zdn',
            'email' => 'zidan@gmail.com',
            'password' => bcrypt('zdn')
        ]);
        User::create([
            'name' => 'Veri Sandria',
            'level' => 'karyawan',
            'jenis_kelamin' => "laki-laki",
            "alamat" => "Ponorogo",
            'username' => 'veri',
            'email' => 'veri@gmail.com',
            'password' => bcrypt('veri')
        ]);
        User::create([
            'name' => 'Riki Agus',
            'level' => 'karyawan',
            'jenis_kelamin' => "laki-laki",
            "alamat" => "Ponorogo",
            'username' => 'riki',
            'email' => 'riki@gmail.com',
            'password' => bcrypt('riki')
        ]);
        User::create([
            'name' => 'Bendahara',
            'level' => 'bendahara',
            'username' => 'Bendahara',
            'email' => 'bendahara@gmail.com',
            'password' => bcrypt('bendahara')
        ]);

        ProfilPerusahaan::create([
            'nama_perusahaan' => 'Default',
            'kontak' => 'Default',
            'alamat' => "Default",
            'bidang_perusahaan' => 'Default',
            'email' => 'default@example.com',
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

        totalgaji::create([
            'jabatan' => 'Programmer',
            'gaji' => '100000',
        ]);
        totalgaji::create([
            'jabatan' => 'Manager',
            'gaji' => '200000',
        ]);
    }
}
