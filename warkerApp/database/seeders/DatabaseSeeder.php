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
        $min = strtotime("2021-11-01 00:00:00");
        $max = strtotime("2021-12-30 00:00:00");

        // \App\Models\User::factory(10)->create();
        for($i=0; $i<10; $i++){
            $val = Rand($min, $max);
            $data=  date('Y-m-d H:i:s', $val);
            DB::table('cidades')->insert([
                'nome' => Str::random(10),
                'latitude' => rand(0,100),
                'longitude' => rand(0,100),
                'created_at' => $data,
                'updated_at' => $data
            ]);
        }
        for($i=0; $i<20; $i++){
            $val = Rand($min, $max);
            $data=  date('Y-m-d H:i:s', $val);
            DB::table('postos')->insert([
                'cidade_id' => rand(1,10),
                'reservatorio' => rand(0,100),
                'latitude' => rand(0,100),
                'longitude' => rand(0,100),
                'created_at' => $data,
                'updated_at' => $data

            ]);
        } 

    }
}
