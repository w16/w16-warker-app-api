<?php

namespace Database\Factories;

use App\Models\GasStation;
use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

class GasStationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GasStation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'city_id' => $this->faker->randomElement(City::all()->pluck('id')->toArray()),
            'tank' => $this->faker->numberBetween(0, 100),
            'latitude' => $this->faker->randomFloat(2,-3000, 3000),
            'longitude' => $this->faker->randomFloat(2,-800, 800)
        ];
    }
}
