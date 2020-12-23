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
        $numberOfCities = Cidade::count();

        $cidade = Cidade::find(rand(1, $numberOfCities));

        return [
            'cidade_id' => $cidade->id,
            'reservatorio' => rand(0, 100),
            'latitude' => $this->faker->latitude($cidade->latidude+rand(-1,1)),
            'longitude' => $this->faker->longitude($cidade->longitude+rand(-1,1))
        ];
    }
}
