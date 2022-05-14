<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\UseCases\City\UpdateCityUseCase;
use App\Http\UseCases\Post\UpdatePostUseCase;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UpdatePostController extends Controller
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
            'reservatorio' => 'integer',
            'cidade_id' => 'exists:App\Models\City,id',
            'latitude' => 'numeric',
            'longitude' => 'numeric',
        ]);
        if ($validator->fails()) {
            return response(['error' =>  $validator->errors()->toJson()], 403);
        }

        try {

            (new UpdatePostUseCase)->execute($request->all(), (int) $id);
            return response(['success' => 'Posto alterado'], 200);
        } catch (Exception $e) {
            return response(['Error' => $e->getMessage()], 500);
        }
    }
}
