<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GasStation;

class GasStationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GasStation::factory()
            ->count(50)
            ->create();
    }
}
