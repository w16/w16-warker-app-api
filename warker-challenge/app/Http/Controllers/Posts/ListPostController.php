<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\UseCases\City\ListCityUseCase;
use App\Http\UseCases\Post\ListPostUseCase;
use App\Models\Post;
use Exception;


class ListPostController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Post $id)
    {
        //
        $post = $id;
        try {
           $data = (new ListPostUseCase)->execute((int) $post->id);
            return response()->json($data, 200);
        } catch (Exception $e) {
            return response(['Error' => $e->getMessage()], 500);
        }
    }
}
