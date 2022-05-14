<?php

namespace App\Http\UseCases\Post;

use App\Models\Post;

class CreatePostUseCase
{
    public function execute(array $data)
    {
        Post::create([
            'cidade_id' => $data['cidade_id'],
            'reservatorio' => $data['reservatorio'],
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude'],
        ]);
    }
}
