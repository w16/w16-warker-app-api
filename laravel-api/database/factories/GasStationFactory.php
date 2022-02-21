<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GasStationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome_do_posto' => $this->faker->company(),
            'reservatorio' => $this->faker->numberBetween(0, 100),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
        ];
    }
}
