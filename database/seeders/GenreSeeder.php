<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            'name' => 'Action'
        ]);
        DB::table('genres')->insert([
            'name' => 'Fun'
        ]);
        DB::table('genres')->insert([
            'name' => 'War'
        ]);
        DB::table('genres')->insert([
            'name' => 'Strategy'
        ]);
        DB::table('genres')->insert([
            'name' => 'FPS'
        ]);
        DB::table('genres')->insert([
            'name' => 'RPG'
        ]);
        DB::table('genres')->insert([
            'name' => 'MMO'
        ]);
    }
}
