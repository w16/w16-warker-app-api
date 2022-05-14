<?php

namespace App\Http\Controllers\City;

use App\Http\Controllers\Controller;
use App\Http\UseCases\City\ListCityUseCase;
use App\Models\City;
use Exception;
use Illuminate\Http\Request;

class ListCityController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(City $id)
    {
        //
        $city = $id;
        try {
           $data = (new ListCityUseCase)->execute((int) $city->id);
            return response()->json($data, 200);
        } catch (Exception $e) {
            return response(['Error' => $e->getMessage()], 500);
        }
    }
}
