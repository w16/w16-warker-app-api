<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

     // Geras dados na tabela de postos
    public function definition()
    {
        return [
            'reservatorio' => $this->faker->numberBetween(1,100),
            'latitude' => $this->faker->randomFloat(8 , 20 , 30),
            'longitude' => $this->faker->randomFloat(8 , 40 , 50),
        ];
    }
}
