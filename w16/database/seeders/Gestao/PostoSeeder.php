<?php

namespace Database\Seeders\Gestao;

use App\Models\Gestao\Posto;
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
        Posto::factory()->count(10)->create();
    }
}
