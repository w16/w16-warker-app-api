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
        //parametrisando os tipos de dados falsos a serem inseridos automaticamente
        return [

            'cidade_id' => Cidade::factory(),
            'reservatorio' => $this->faker->randomFloat(2, 0, 100),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),

        ];
    }
}
