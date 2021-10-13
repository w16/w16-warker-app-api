<?php

namespace Database\Factories;

use App\Models\Cidade;
use App\Models\Posto;
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
            // para cada Posto criado, será criado cidades em que o posto pertence
            'cidade_id' => Cidade::factory()->create(),
            'reservatorio' => rand(1, 100),
            'latitude' => $this->faker->latitude(-90, 90),
            'longitude' => $this->faker->longitude(-180, 180)
        ];
    }
}
