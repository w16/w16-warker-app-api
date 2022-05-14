<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\CreateRequest;
use App\Http\UseCases\Post\CreatePostUseCase;
use Exception;



class CreatePostController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(CreateRequest $request)
    {
        //
        $request->validated();
        try {
           (new CreatePostUseCase)->execute($request->all());
           return response(['success'=>'Posto criado'],200);
        } catch (Exception $e) {
            return response(['Error'=>$e->getMessage()],500);
        }
    }
}
