<?php

namespace App\Http\Controllers;

use App\Models\Coordinates;
use Illuminate\Http\Request;
use \App\Http\Resources\Coordinates as CoordinatesResource;

class CoordinatesController extends Controller
{
    public function index()
    {
        // gets all coordinates and return as CoordinatesResource model
        $coords = Coordinates::all();
        return CoordinatesResource::collection($coords);
    }

    // store a new coordinate
    // request is link from the ui forms
    public function store(Request $request)
    {
        // setting the ids of inputs to recognize the attributes
        $coords = new Coordinates();
        $coords->latitude = $request->input('latitude');
        $coords->longitude = $request->input('longitude');

        // save the coordinates and return it to the response
        if($coords->save())
        {
            return new CoordinatesResource($coords);
        }

    }

    // return a specific coordinate, find by id
    public function show($id)
    {
        $coords = Coordinates::query()->findOrFail($id);
        return new CoordinatesResource($coords);
    }

    // return the coordinate updated if found
    public function update(Request $request, $id)
    {
        // search coordinate by id
        $coords = Coordinates::query()->findOrFail($id);
        $coords->latitude = $request->input('latitude');
        $coords->longitude = $request->input('longitude');

        if($coords->save())
        {
            return new CoordinatesResource($coords);
        }
    }

    // detele Coordinate
    public function destroy($id)
    {
        $coords = Coordinates::query()->findOrFail($id);
        if ($coords->delete()){
            return new CoordinatesResource($coords);
        }
    }
}
