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
        // PostoSeeder já cria as cidades em que ele pertence, portanto CidadeSeeder está comentado
        // Caso queira criar Cidades sem os Postos, descomente e irá criar 10 cidades sem postos

        // $this->call(CidadeSeeder::class);
        $this->call(PostoSeeder::class);
    }
}
