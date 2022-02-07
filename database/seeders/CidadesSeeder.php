<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cidade;

class CidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Instanciando o objeo

            $cidade = new Cidade();

            $cidade->nome_cidade = 'Abadia de Goiás';
            $cidade->latitude = '-16.7573';
            $cidade->longitude = '-49.4412';
            $cidade->save();

            //Usando metodo create
            Cidade::create([
                'nome_cidade'=> 'Abadia dos Dourados',
                'latitude'=> '-18.4831',
                 'longitude'=> '-47.3916'
            ]);




    }
}
