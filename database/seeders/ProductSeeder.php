<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Rock
        DB::table('products')->insert([
            'Name' => "Abbey Road",
            'Description' => "Abbey Road é o 12º álbum de estúdio da banda britânica The Beatles. Foi lançado em 26 de setembro de 1969, e leva o mesmo nome da rua de Londres onde situa-se o estúdio Abbey Road.",
            'img' => "/img/Abbey_Road.jpg",
            'Cost' => "9.30",
            'owner_id' => "1",
            'category_id' => "1"
        ]);

        DB::table('products')->insert([
            'Name' => "Back_in_Black",
            'Description' => "Back in Black, lançado em 25 de julho de 1980, é o 6º álbum da banda de hard rock AC/DC . Este é o primeiro álbum do grupo gravado com o cantor Brian Johnson , substituindo Bon Scott.",
            'img' => "/img/Back_in_Black.jpg",
            'Cost' => "12.00",
            'owner_id' => "1",
            'category_id' => "1"
        ]);

        DB::table('products')->insert([
            'Name' => "A Night at the Opera Queen",
            'Description' => "kk",
            'img' => "/img/A_Night_at_the_Opera_Queen.jpg",
            'Cost' => "20.00",
            'owner_id' => "1",
            'category_id' => "1"
        ]);
        //Jazz
        DB::table('products')->insert([
            'Name' => "Kind of Blue",
            'Description' => "Kind of Blue é um álbum de estúdio do músico estadunidense de jazz Miles Davis, lançado em 17 de agosto de 1959 pela Columbia Records, tanto em mono como em estéreo.",
            'img' => "/img/Kind_of_Blue.png",
            'Cost' => "10.00",
            'owner_id' => "1",
            'category_id' => "2"
        ]);
        DB::table('products')->insert([
            'Name' => "Blue Train",
            'Description' => "Blue Train é um álbum de jazz do saxofonista John Coltrane, lançado em 1957. Ele é considerado por muitos críticos como sendo o primeiro álbum solo de Coltrane",
            'img' => "/img/Blue_Train.jpg",
            'Cost' => "13.50",
            'owner_id' => "1",
            'category_id' => "2"
        ]);
        //Hip Pop
        DB::table('products')->insert([
            'Name' => "All Eyez on Me",
            'Description' => "All Eyez on Me é o quarto álbum de estúdio do rapper estadunidense 2Pac, e o último a ser lançado durante sua vida. Lançado em 13 de fevereiro de 1996 através da Death Row Records e Interscope Records",
            'img' => "/img/All_Eyez_on_Me.jpg",
            'Cost' => "13.50",
            'owner_id' => "1",
            'category_id' => "3"
        ]);

        //Classic
        DB::table('products')->insert([
            'Name' => "Beethoven Symphonies (1963)",
            'Description' => "Karajan: Beethoven Symphonies (1963) é um conjunto de gravações de estúdio realizadas em 1961 e 1962 pela Filarmónica de Berlim dirigida por Herbert von Karajan.",
            'img' => "/img/Karajan_Beethoven_Symphonies_1963.jpg",
            'Cost' => "13.50",
            'owner_id' => "1",
            'category_id' => "4"
        ]);
    }
}
