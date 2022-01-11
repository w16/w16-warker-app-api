<?php

namespace Database\Factories\Gestao;

use App\Models\Gestao\Cidade;
use Illuminate\Database\Eloquent\Factories\Factory;

class CidadeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Cidade::class;

    public function definition()
    {
        return [
            'nome_cidade' => $this->faker->city(),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude()
        ];
    }
}
