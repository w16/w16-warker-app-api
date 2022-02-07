<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Posto;

class PostosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         $posto = new Posto();
         $posto->cidade_id='3';
         $posto->reservatorio ='80';
         $posto->latitude='-12.007749';
         $posto->longitude='-38.50163';


         $posto->cidade_id='4';
         $posto->reservatorio ='100';
         $posto->latitude='-12.932749';
         $posto->longitude='-38.65163';

         $posto->save();

    }
}
