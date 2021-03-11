<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::insert([
            'name' => 'Test User',
            'email' => 'test@test.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$jskSr19e54a78TuXxuWH7.LdmXa6p5rmhIssxVX/28w6DJDYSAIue', // password
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        \App\Models\User::factory(9)->create();
         \App\Models\Posto::factory(10)->create();
    }
}
