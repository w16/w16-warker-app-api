<?php

namespace Database\Seeders;

use App\Models\{Cidade, Posto};
use Illuminate\Database\Seeder;

class CidadeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cidade::factory()
            ->count(4) // especifico a quantidade de cidades que quero criar
            ->has(Posto::factory()->count(3)) // especifico a quantidade de postos por cidade
            ->create();
    }
}
