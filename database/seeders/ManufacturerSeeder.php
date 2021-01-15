<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('manufacturers')->insert([
            'name' => 'RockStar',
            'year_released' => '1998',
        ]);
        DB::table('manufacturers')->insert([
            'name' => 'Mojang',
            'year_released' => '2009',
        ]);
        DB::table('manufacturers')->insert([
            'name' => 'Sega',
            'year_released' => '1983',
        ]);
        DB::table('manufacturers')->insert([
            'name' => 'EA',
            'year_released' => '1982',
        ]);
        DB::table('manufacturers')->insert([
            'name' => 'Activision',
            'year_released' => '1979',
        ]);
    }
}
