<?php

namespace App\Http\UseCases\Post;

use App\Models\Post;

class UpdatePostUseCase
{
    public function execute(array $data, int $id)
    {
        $post = Post::where('id', $id)->update($data);
        return $post;
    }
}
