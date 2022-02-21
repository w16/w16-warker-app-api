<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::insert([
            'nome_da_cidade' => 'cidade1',
            'latitude' => '4589674865',
            'longitude' => '774657946'
        ]);

        City::insert([
            'nome_da_cidade' => 'cidade2',
            'latitude' => '4589674865',
            'longitude' => '774657946'
        ]);

        City::insert([
            'nome_da_cidade' => 'cidade3',
            'latitude' => '4589674865',
            'longitude' => '774657946'
        ]);
    }
}
