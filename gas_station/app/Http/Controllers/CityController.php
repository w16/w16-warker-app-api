<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Http\Resources\City as CityResouce;
use Illuminate\Http\Request;

class CityController extends Controller
{
   public function index()
    {
        // gets all cities and return as CityResouces model
        $cities = City::all();
        return CityResouce::collection($cities);
    }

    // store a new city
    // request is link from the ui forms
    public function store(Request $request)
    {
        // setting the ids of inputs to recognize the attributes
        $city = new City();
        $city->city = $request->input('city');
        $city->coordinates_id = $request->input('coordinates');
        $city->gas_stations_id = $request->input('gas_station');

        // save the city and return it to the response
        if($city->save())
        {
            return new CityResouce($city);
        }

    }

    // return a specific city, find by id
    public function show($id)
    {
        $city = City::query()->findOrFail($id);
        return new CityResouce($city);
    }

    // return the city updated if found
    public function update(Request $request, $id)
    {
        // search city by id
        $city = City::query()->findOrFail($id);
        $city->city = $request->input('city');
        $city->coordinates_id = $request->input('coordinates');
        $city->gas_stations_id = $request->input('gas_station');

        if($city->save())
        {
            return new CityResouce($city);
        }
    }

    // detele city
    public function destroy($id)
    {
        $city = City::query()->findOrFail($id);
        if ($city->delete()){
            return new CityResouce($city);
        }
    }
}
