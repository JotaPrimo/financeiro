<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "Jota Santos",
            'email' => "gestald118@gmail.com",
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'name' => "ADM",
            'email' => "adm@gmail.com",
            'password' => Hash::make('12345678'),
        ]);
    }
}
