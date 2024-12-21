<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'Name' => 'Rock',
        ]);

        DB::table('categories')->insert([
            'Name' => 'Jazz',
        ]);

        DB::table('categories')->insert([
            'Name' => 'Hip Pop',
        ]);

        DB::table('categories')->insert([
            'Name' => 'Música Classica',
        ]);
    }
}
