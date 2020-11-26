<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cidade;

class CidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cidade::factory()->count(20)->create();
    }
}
