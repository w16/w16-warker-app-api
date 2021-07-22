<?php

namespace Database\Seeders;

use App\Models\Posto;
use Illuminate\Database\Seeder;

class PostoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Posto::factory()->count(20)->create();
    }
}
