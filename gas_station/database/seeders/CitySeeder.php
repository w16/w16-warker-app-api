<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Coordinates;
use App\Models\GasStation;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // make {3} cities with factory
        // creating also a coordinate and a gas_station for the city
        City::factory(6)
        ->has(Coordinates::factory())
        ->has(GasStation::factory())
        ->create();
    }
}
