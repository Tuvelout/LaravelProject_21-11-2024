<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@lojamusica.pt',
            'password' => Hash::make('admin'),
            'isAdmin' => true,
        ]);

        DB::table('users')->insert([
            'name' => 'client',
            'email' => 'client@lojamusica.pt',
            'password' => Hash::make('client'),
        ]);
    }
}
