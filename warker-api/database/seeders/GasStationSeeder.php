<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
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
        $city = DB::table('cities')->first();

        GasStation::insert([
            'reservatorio' => '58',
            'latitude' => '1453132',
            'longitude' => '45645314',
            'cidade_id' => $city->id,
        ]);

        GasStation::insert([
            'reservatorio' => '58',
            'latitude' => '1453132',
            'longitude' => '45645314',
            'cidade_id' => $city->id,
        ]);

        GasStation::insert([
            'reservatorio' => '58',
            'latitude' => '1453132',
            'longitude' => '45645314',
            'cidade_id' => $city->id,
        ]);
    }
}
