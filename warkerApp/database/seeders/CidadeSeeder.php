<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class CidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            for($i=0; $i<100; $i++){
            DB::table('cidades')->insert([
                'nome' => Str::random(10),
                'latitude' => rand(0,100),
                'logintude' => rand(0,100)

            ]);
        }
    }
}
