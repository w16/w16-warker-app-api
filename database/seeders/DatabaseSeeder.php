<?php

namespace Database\Seeders;

use App\Models\Cidade;
use App\Models\Posto;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Cidade::factory()->count(4)->create();
        Posto::factory()->count(20)->create();
    }
}
