<?php

namespace Database\Factories;

use App\Models\Posto;
use App\Models\Cidade;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Posto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reservatorio' => $this->faker->numberBetween(0, 100),
            'longitude' => $this->faker->randomFloat(2, -180, 180),
            'latitude' => $this->faker->randomFloat(2, -90, 90),
        ];
    }
}
