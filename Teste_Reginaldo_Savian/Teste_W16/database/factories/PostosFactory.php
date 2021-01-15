<?php

namespace Database\Factories;

use App\Models\Cidades;
use App\Models\Postos;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'id_cidade' => Cidades::factory(),
            'reservatorio' => rand(1, 100),
            'latitude' => rand(-99999, 99999),
            'longitude' => rand(-99999, 99999)
        ];
    }
}
