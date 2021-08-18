<?php
 
namespace Database\Factories;

use App\Models\Coordinates;
use App\Models\GasStation;
use Illuminate\Database\Eloquent\Factories\Factory;

class GasStationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GasStation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // return fakers for populate db
        return [
            // fake a number between 0 and 30k, that is the full and min capacity of the tank 
            'tank'=> $this->faker->numberBetween(0,30000),
            // fake a coordinate whith its on factory
            'coordinates_id'=> Coordinates::factory(),
        ];
    }
}
