<?php

namespace Database\Seeders;

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
            'jenis_kelamin' => "laki-laki",
            "tanggal_lahir" => "12-09-2004",
            "alamat" => "Ponorogo",
            'username' => 'sefdani',
            'email' => 'sefdani@gmail.com',
            'password' => bcrypt('sefdani')
        ]);
    }
}
