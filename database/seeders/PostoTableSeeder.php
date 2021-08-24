<?php

namespace Database\Seeders;

use App\Models\{Cidade, Posto};
use Illuminate\Database\Seeder;

class PostoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Posto::factory(3)
            ->for(Cidade::factory())
            ->create();
    }
}
