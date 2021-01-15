<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Cidades,Postos};

class CidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Postos::factory()->count(5)->create();
    }
}
