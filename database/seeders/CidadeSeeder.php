<?php

namespace Database\Seeders;

use App\Models\Cidade;
use App\Models\Posto;
use Illuminate\Database\Seeder;

class CidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*para popular o banco, informar em Cidade::factory() a quantidade de cidades a serem criadas e em 
        Posto::factory() informar quantos postos serão criados para cada cidades*/
        
        Cidade::factory(100)->has(Posto::factory()->count(20))->create();
    }
}
