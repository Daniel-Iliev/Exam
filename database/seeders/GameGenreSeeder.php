<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('game_genres')->insert([
            'game_id' => '1',
            'genre_id' => '1'
        ]);
        DB::table('game_genres')->insert([
            'game_id' => '1',
            'genre_id' => '5'
        ]);
        DB::table('game_genres')->insert([
            'game_id' => '1',
            'genre_id' => '6'
        ]);
        DB::table('game_genres')->insert([
            'game_id' => '2',
            'genre_id' => '1'
        ]);
        DB::table('game_genres')->insert([
            'game_id' => '2',
            'genre_id' => '3'
        ]);
        DB::table('game_genres')->insert([
            'game_id' => '2',
            'genre_id' => '4'
        ]);
        DB::table('game_genres')->insert([
            'game_id' => '2',
            'genre_id' => '5'
        ]);
        DB::table('game_genres')->insert([
            'game_id' => '3',
            'genre_id' => '1'
        ]);
        DB::table('game_genres')->insert([
            'game_id' => '3',
            'genre_id' => '2'
        ]);
        DB::table('game_genres')->insert([
            'game_id' => '3',
            'genre_id' => '6'
        ]);
        DB::table('game_genres')->insert([
            'game_id' => '3',
            'genre_id' => '7'
        ]);
        DB::table('game_genres')->insert([
            'game_id' => '4',
            'genre_id' => '2'
        ]);
        DB::table('game_genres')->insert([
            'game_id' => '4',
            'genre_id' => '4'
        ]);
        DB::table('game_genres')->insert([
            'game_id' => '5',
            'genre_id' => '2'
        ]);
        DB::table('game_genres')->insert([
            'game_id' => '6',
            'genre_id' => '1'
        ]);
        DB::table('game_genres')->insert([
            'game_id' => '6',
            'genre_id' => '6'
        ]);

    }
}
