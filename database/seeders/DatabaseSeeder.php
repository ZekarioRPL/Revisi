<?php

namespace Database\Seeders;

use App\Models\User;
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
            "alamat" => "Ponorogo",
            'username' => 'sefdani',
            'email' => 'sefdani@gmail.com',
            'password' => bcrypt('sefdani')
        ]);
    }
}
