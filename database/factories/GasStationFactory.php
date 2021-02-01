<?php

namespace Database\Factories;

use App\Models\GasStation;
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
            'reservatorio' => $this->faker->numberBetween(0,100),
            'city_id' => $this->faker->numberBetween(0,50),
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
        ];
    }
}
