<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Http\Resources\CityResource;
use App\Http\Requests\CityRequest;
use Symfony\Component\HttpFoundation\Response;

class CityController extends Controller
{
    /**
     * Display all cities
     *
     * @return CityResource
     */
    public function index() {
        return CityResource::collection(City::with('gasStations')->get());
    }

    /**
     *  Display one city by ID 
     * 
     * @return CityResource
     */
    public function show($cityID) {
        $city = City::with('gasStations')->findOrFail($cityID);

        return new CityResource($city);
    }

    /**
     * Create new city in DB
     * 
     * @param CityRequest $request
     * @param Response $response
     * 
     * @return CityResource|Exception
     */
    public function store(CityRequest $request) {
        try {
            $city = $request->validated();
            if (!array_key_exists('city_name', $city)) return response([ 'message' => 'city_name is required'], 400);
            if (!array_key_exists('latitude', $city)) return response([ 'message' => 'latitude is required'], 400);
            if (!array_key_exists('longitude', $city)) return response([ 'message' => 'longitude is required'], 400);            

            $city = new City($request->validated());
            $city->save();

            return new CityResource($city);
        } catch (Exception $e) {
            return response($e, 500);
        }
    }

    /**
     * Update a city
     * 
     * @param CityRequest $request
     * @param $cityID
     * 
     * @return CityResource|Exception
     */
    public function update(CityRequest $request, $cityID) {
        try {
            $city = City::findOrFail($cityID);
            $cityUpdate = $city->update($request->validated());

            return new CityResource($city);
        } catch (Exception $e) {
            return response($e, 500);
        }
    }

    /**
     * Delete a city by ID
     * 
     * @return Response|Exception
     */
    public function destroy($cityID) {
        try {
            $city = City::findOrFail($cityID)->delete();
        } catch (Exception $e) {
            return response($e, 500);
        }

        return response(["message" => "city has been deleted"]);
    }
}
