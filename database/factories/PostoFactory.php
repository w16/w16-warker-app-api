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
            'cidade_id' => $this->faker->randomElement(Cidade::all()->pluck('id')->toArray()),
            'reservatorio' => $this->faker->numberBetween(0, 100),
            'latitude' => $this->faker->randomFloat(8, -90, 90),
            'longitude' => $this->faker->randomFloat(8, -180, 180),
        ];
    }
}
