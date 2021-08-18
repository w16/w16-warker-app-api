<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Coordinates;
use App\Models\GasStation;
use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = City::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // return a fake city to populate db
        return [
            'city' => $this->faker->city(),
            'coordinates_id' => Coordinates::factory(),
            'gas_stations_id' => GasStation::factory()
        ];
    }
}
