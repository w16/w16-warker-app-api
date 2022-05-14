<?php

namespace App\Http\Controllers\City;

use App\Http\Controllers\Controller;
use App\Http\UseCases\City\UpdateCityUseCase;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UpdateCityController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'nome_da_cidade' => 'string',
            'latitude' => 'numeric',
            'longitude' => 'numeric',
        ]);
        if ($validator->fails()) {
            return response(['error' =>  $validator->errors()->toJson()], 403);
        }
        try {
            (new UpdateCityUseCase)->execute($request->all(), (int) $id);
            return response(['success' => 'Cidade alterada'], 200);
        } catch (Exception $e) {
            return response(['Error' => $e->getMessage()], 500);
        }
    }
}
