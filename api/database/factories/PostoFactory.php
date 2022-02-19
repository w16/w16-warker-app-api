<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'longitude' => $this->faker->randomFloat(2, -180, 180),
            'latitude' => $this->faker->randomFloat(2, -90, 90),
            'reservatorio' => $this->faker->randomFloat(0, 0, 100) 
        ];
    }
}
