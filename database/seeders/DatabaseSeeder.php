<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Inserção de dados iniciais na tabela de users
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@teste.com',
            'password' => bcrypt(1234567),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        // Inserção de dados iniciais na tabela de users

        // Inserção de dados iniciais na tabela de cidades
        DB::table('cidades')->insert([
            'nome_da_cidade' => 'Criciúma',
            'latitude' => '250.06022',
            'longitude' => '627.97722',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('cidades')->insert([
            'nome_da_cidade' => 'Tubarão',
            'latitude' => '121.39011',
            'longitude' => '168.38821',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('cidades')->insert([
            'nome_da_cidade' => 'Florianópolis',
            'latitude' => '145.11970',
            'longitude' => '360.11810',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('cidades')->insert([
            'nome_da_cidade' => 'São Paulo',
            'latitude' => '122.56560',
            'longitude' => '163.96980',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        // Inserção de dados iniciais na tabela de cidades

        // Inserção de dados iniciais na tabela de postos
        DB::table('postos')->insert([
            'cidade_id' => 1,
            'reservatorio' => 10,
            'latitude' => '463.23532',
            'longitude' => '515.83282',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('postos')->insert([
            'cidade_id' => 2,
            'reservatorio' => 20,
            'latitude' => '746.57301',
            'longitude' => '145.47761',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('postos')->insert([
            'cidade_id' => 2,
            'reservatorio' => 15,
            'latitude' => '877.45560',
            'longitude' => '592.11330',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        // Inserção de dados iniciais na tabela de postos
    }
}
