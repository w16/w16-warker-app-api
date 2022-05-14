<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostosTdableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $city = DB::table('cidades')->pluck('id');
        foreach (range(1, 5) as $index) {
        Post::create([
                'reservatorio' => '20',
                'latitude' => '-22.415226',
                'longitude' => '-44.3141921',
                'cidade_id' => $city[0],

            ]);
        }
    }
}
