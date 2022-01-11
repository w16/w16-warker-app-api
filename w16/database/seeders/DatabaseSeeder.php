<?php

namespace Database\Seeders;

use Database\Seeders\Gestao\CidadeSeeder;
use Database\Seeders\Gestao\PostoSeeder;
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
        $this->call([CidadeSeeder::class, PostoSeeder::class]);
    }
}
