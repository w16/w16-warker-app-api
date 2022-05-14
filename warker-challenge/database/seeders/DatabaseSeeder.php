<?php

namespace Database\Seeders;

use Faker\Factory as factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        $this->call([
            CidadesTableSeeder::class,
            PostosTdableSeeder::class,
        ]);
    }
}
