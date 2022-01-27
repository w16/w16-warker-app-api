<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Postos;
use App\Models\Cidades;

class PostosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Postos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cidade_id' => Cidades::factory(),
            'reservatorio' => $this->faker->numberBetween(0, 100),
            'latitude' => $this->faker->unique()->latitude,
            'longitude' => $this->faker->unique()->longitude,
        ];
    }
}
