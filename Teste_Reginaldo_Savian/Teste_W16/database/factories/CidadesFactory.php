<?php

namespace Database\Factories;

use App\Models\Cidades;
use Illuminate\Database\Eloquent\Factories\Factory;

class CidadesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cidades::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => 'Cidade_'.rand(1, 9999),
            'latitude' => rand(-99999, 99999),
            'longitude' => rand(-99999, 99999)
        ];
    }
}
