<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
         \App\Models\Cidades::factory(10) // irá gerar 10 Cidades 
            ->hasPostos(10)  // irá gerar 10 postos para cada cidade
=======
         \App\Models\Cidades::factory(10)
            ->hasPostos(10)
>>>>>>> 7df13676d3301599c243953c486f645680a2f21a
            ->create();
    }
}
