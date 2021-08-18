<?php
 
namespace Database\Factories;

use App\Models\Coordinates;
use Illuminate\Database\Eloquent\Factories\Factory;

class CoordinatesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Coordinates::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // return the attributes of coordination to populate db 
        return [
            //using faker to generate fake latitude and longitude in brazil with the parameters 
            // to latitude 4,-33 && longitude -73,-34
            'latitude'=> $this->faker->latitude(4,-33),
            'longitude'=> $this->faker->longitude(-73,-34),
        ];
    }
}
