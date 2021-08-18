<?php

namespace Database\Seeders;

use App\Models\Coordinates;
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

        /* 
        As it doesn't make sense to generate coordinates and gas_stations without a city;
        here i populate the db creating only with the city seeder
        that also creates both;
        */

        //$this->call(CoordinatesSeeder::class);
        //$this->call(GasStationSeeder::class);
        $this->call(CitySeeder::class);

    }
}
