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
        //CitySeeder should be called first because GasStation uses its id in foreign key
        \App\Models\User::factory(3)->create();
        $this->call(CitySeeder::class);
        $this->call(GasStationSeeder::class);
    }
}
