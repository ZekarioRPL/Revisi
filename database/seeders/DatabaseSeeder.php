<?php

namespace Database\Seeders;

use App\Models\User;
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
