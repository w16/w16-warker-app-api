<?php

namespace App\Http\UseCases\Post;

use App\Models\City;
use App\Models\Post;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class ListPostUseCase
{
    public function execute(int $id)
    {

        $post = Post::find($id);
        if ($post) {
            $data = [
                'id' => $post->id,
                'reservatorio' => $post->reservatorio,
                'coords' => [
                    'latitude' => $post->latitude,
                    'longitude' => $post->longitude,
                ],
                'updated_at' =>  Carbon::parse($post->updated_at)->format('d-m-Y'),
                'created_at' =>  Carbon::parse($post->created_at)->format('d-m-Y'),

            ];


            return $data;
        }else{
            throw new Exception('Posto não encontrado');
        }


    }
}
