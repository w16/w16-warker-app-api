<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Posto;


class PostoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Posto::factory()->count(50)->create();
    }
}
