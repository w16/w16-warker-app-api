<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Http\Models\{Cidades,Postos};

class PostosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Postos::factory(1)->for(Cidades::factory())->create();
    }
}
