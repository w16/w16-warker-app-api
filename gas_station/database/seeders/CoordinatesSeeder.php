<?php
 
namespace Database\Seeders;

use App\Models\Coordinates;
use Illuminate\Database\Seeder;

class CoordinatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //make {2} factories of coordinates
        Coordinates::factory(2);
    }
}
