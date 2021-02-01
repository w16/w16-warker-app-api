<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\GasStationResource;
use App\Models\GasStation;

class GasStationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $gas_station = GasStation::create([
            'reservatorio' => $request->reservatorio,
            'city_id' => $request->city_id,
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
        $gas_station = GasStation::find($id);

        return response()->json(
            new GasStationResource($gas_station), 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
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
        $gas_station = GasStation::find($id);

        if($request->reservatorio) {
            $gas_station->reservatorio = $request->reservatorio;
        }
        if($request->latitude) {
            $gas_station->latitude = $request->latitude;
        }
        if($request->longitude) {
            $gas_station->longitude = $request->longitude;
        }

        $gas_station->save();

        return response()->json($gas_station, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('gas_stations')->where('id', '=', $id)->delete();
    }
}
