<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class PostoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
