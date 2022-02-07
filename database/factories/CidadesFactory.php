<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CidadesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    // Geras dados na tabela de cidades
    public function definition()
    {
        return [
            'nome_da_cidade' => $this->faker->words(2, true),
            'latitude' => $this->faker->randomFloat(8 , 20 , 30),
            'longitude' => $this->faker->randomFloat(8 , 40 , 50),
        ];
    }
}
