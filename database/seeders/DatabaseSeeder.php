<?php

namespace Database\Seeders;

use App\Models\Cidade;
use App\Models\Posto;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /**chama o CidadeSeeder */
        $this->call(CidadeSeeder::class);

        /** Adiciona o usuario */
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@w16.com',
            'password' => Hash::make('123456'),
            'created_at' => Carbon::now()->toDateString(),
            'updated_at' => Carbon::now()->toDateString()
        ]);
    }
}
