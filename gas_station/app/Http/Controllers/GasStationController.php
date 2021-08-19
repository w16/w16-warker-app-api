<?php

namespace App\Http\Controllers;

use App\Models\GasStation;
use Illuminate\Http\Request;
use App\Http\Resources\GasStation as GasResource;

class GasStationController extends Controller
{
    public function index()
    {
        // gets all gas stations and return as Gas Station Resource model
        $gas = GasStation::all();
        return GasResource::collection($gas);
    }

    // store a new gas station
    // request is link from the ui forms
    public function store(Request $request)
    {
        // setting the ids of inputs to recognize the attributes
        $gas = new GasStation();
        $gas->tank = $request->input('tank');
        $gas->coordinates_id = $request->input('coordinates');

        // save the GasStation and return it to the response
        if($gas->save())
        {
            return new GasResource($gas);
        }

    }

    // return a specific gas station, find by id
    public function show($id)
    {
        $gas = GasStation::query()->findOrFail($id);
        return new GasResource($gas);
    }

    // return the gas station updated if found
    public function update(Request $request, $id)
    {
        // search gas station by id
        $gas = GasStation::query()->findOrFail($id);
        $gas->tank = $request->input('tank');
        $gas->coordinates_id = $request->input('coordinates');

        if($gas->save())
        {
            return new GasResource($gas);
        }
    }

    // detele Gas Station
    public function destroy($id)
    {
        $gas = GasStation::query()->findOrFail($id);
        if ($gas->delete()){
            return new GasResource($gas);
        }
    }
}
