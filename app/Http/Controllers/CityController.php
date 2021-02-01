<?php

namespace App\Http\Controllers;

use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCityRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Response;
use App\Http\Resources\CityResource;
use App\Models\City;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCityRequest $request)
    {
        $city = City::create([
            'nome_da_cidade' => $request->nome_da_cidade,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return response()->json($city, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = City::find($id);

        return response()->json(
            new CityResource($city),200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $city = City::find($id);

        if($request->nome_da_cidade) {
            $city->nome_da_cidade = $request->nome_da_cidade;
        }
        if($request->latitude) {
            $city->latitude = $request->latitude;
        }
        if($request->longitude) {
            $city->longitude = $request->longitude;
        }


        $city->save();

        return response()->json($city, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('cities')->where('id', '=', $id)->delete();
    }
}
