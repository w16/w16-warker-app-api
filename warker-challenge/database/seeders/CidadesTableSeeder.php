<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        City::create([
            'nome_da_cidade' => 'Cidades3 dos Anjos',
            'latitude' => '-22.415226',
            'longitude' => '-44.3141921',
        ]);
    }
}
