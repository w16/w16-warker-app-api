<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\UseCases\Post\DeletePostUseCase;

use App\Models\Post;
use Exception;


class DeletePostController extends Controller
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
            (new DeletePostUseCase)->execute((int) $post->id);
            return response()->json(['success' => 'Posto Apagado'], 200);
        } catch (Exception $e) {
    
            return response(['Error' => $e->getMessage()], 500);
        }
    }
}
