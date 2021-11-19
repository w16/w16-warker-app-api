<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
            for($i=0; $i<10; $i++){
                DB::table('cidades')->insert([
                    'nome' => Str::random(10),
                    'latitude' => rand(0,100),
                    'longitude' => rand(0,100)
                ]);
            }
            for($i=0; $i<20; $i++){
                DB::table('postos')->insert([
                    'cidade_id' => rand(1,10),
                    'reservatorio' => rand(0,100),
                    'latitude' => rand(0,100),
                    'longitude' => rand(0,100)
    
                ]);
            } 

    }
}

