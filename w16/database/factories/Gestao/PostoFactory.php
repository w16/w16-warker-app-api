<?php

namespace Database\Factories\Gestao;

use App\Models\Gestao\Cidade;
use App\Models\Gestao\Posto;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Posto::class;


    public function definition()
    {
        return [
            'cidade_id' => Cidade::inRandomOrder()->first()->id,
            'reservatorio' => rand(1, 100),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude()
        ];
    }
}
