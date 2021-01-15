<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert([
            'name' => 'Destiny 2',
            'year_released' => '2017',
            'manufacturer' => 'Activision',
            'image' => 'storage/games/1.jpg'
        ]);
        DB::table('games')->insert([
            'name' => 'Call of Duty : Black Ops 4',
            'year_released' => '2018',
            'manufacturer' => 'Activision',
            'image' => 'storage/games/2.jpg'
        ]);
        DB::table('games')->insert([
            'name' => 'GTA 5',
            'year_released' => '2013',
            'manufacturer' => 'RockStar',
            'image' => 'storage/games/3.jpg'
        ]);
        DB::table('games')->insert([
            'name' => 'Minecraft',
            'year_released' => '2009',
            'manufacturer' => 'Mojang',
            'image' => 'storage/games/4.jpg'
        ]);
        DB::table('games')->insert([
            'name' => 'Sonic The Hedgehog',
            'year_released' => '1991',
            'manufacturer' => 'Sega',
            'image' => 'storage/games/5.jpg'
        ]);
        DB::table('games')->insert([
            'name' => 'Dragon Age 2',
            'year_released' => '2011',
            'manufacturer' => 'EA',
            'image' => 'storage/games/6.jpg'
        ]);
    }
}
