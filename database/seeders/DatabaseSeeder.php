<?php

namespace Database\Seeders;

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
        $this->call(CidadeTableSeeder::class);
        //$this->call(PostoTableSeeder::class);
    }
}
