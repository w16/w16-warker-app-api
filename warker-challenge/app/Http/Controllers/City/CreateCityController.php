<?php

namespace App\Http\Controllers\City;

use App\Http\Controllers\Controller;
use App\Http\Requests\City\CreateRequest;
use App\Http\UseCases\City\CreateCityUseCase;
use Exception;
use Illuminate\Http\Request;


class CreateCityController extends Controller
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
           (new CreateCityUseCase)->execute($request->all());
           return response(['success'=>'Cidade criada'],200);
        } catch (Exception $e) {
            return response(['Error'=>$e->getMessage()],500);
        }
    }
}
