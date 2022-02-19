<?php

namespace Database\Factories;

use App\Models\Cidade;
use Illuminate\Database\Eloquent\Factories\Factory;

class CidadeFactory extends Factory
{
    protected $model = Cidade::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome_da_cidade' => $this->faker->words(15, true),
            'longitude' => $this->faker->randomFloat(2, 10, 300),
            'latitude' => $this->faker->randomFloat(2, 10, 300)
        ];
    }
}
