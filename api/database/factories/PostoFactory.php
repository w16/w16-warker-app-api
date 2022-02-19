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
            'longitude' => $this->faker->randomFloat(2, 10, 300),
            'latitude' => $this->faker->randomFloat(2, 10, 300),
            'reservatorio' => $this->faker->randomFloat(0, 1, 100) 
        ];
    }
}
