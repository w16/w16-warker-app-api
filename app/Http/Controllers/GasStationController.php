<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\GasStationResource;
use App\Http\Requests\GasStationRequest;
use App\Models\GasStation;
use App\Models\City;

class GasStationController extends Controller
{
    
    /**
     * Display all gas stations
     *
     * @return GasStationResource
     */
    public function index() {
        return GasStationResource::collection(GasStation::with('cities')->get()); 
    }

    /**
     *  Display one gas station by ID 
     * 
     * @return GasStationResource
     */
    public function show($gasStationID) {
        $gasStation = GasStation::with('cities')->findOrFail($gasStationID);

        return new GasStationResource($gasStation);
    }

    /**
     * Create new gas station in DB
     * 
     * @param GasStationRequest $request
     * @param Response $response
     * 
     * @return GasStationResource|Exception
     */
    public function store(GasStationRequest $request) {
        try {
            $gasStation = $request->validated();
            if (!array_key_exists('city_id', $gasStation)) return response([ 'message' => 'city_id is required'], 400);
            if (!array_key_exists('tank', $gasStation) || $gasStation['tank'] > 100 || $gasStation['tank'] < 0) return response([ 'message' => 'tank is needed beetwen in 0 - 100'], 400);
            if (!array_key_exists('latitude', $gasStation)) return response([ 'message' => 'latitude is required'], 400);            
            if (!array_key_exists('longitude', $gasStation)) return response([ 'message' => 'longitude is required'], 400);            
            
            $city = City::find($gasStation['city_id']);
            if (!$city) return response([ 'message' => 'city doesnt exist'], 404);

            $newGasStation = new GasStation($request->validated());
            $newGasStation->save();

            return new GasStationResource($newGasStation);
        } catch (Exception $e) {
            return response($e, 500);
        }
    }

    /**
     * Update a gas station
     * 
     * @param GasStationRequest $request
     * @param $gasStationID
     * 
     * @return GasStationResource|Exception
     */
    public function update(GasStationRequest $request, $gasStationID) {
        try {
            $updatedGasStationRequest = $request->validated();
            if(array_key_exists('city_id', $updatedGasStationRequest)) {
                $city = City::find($updatedGasStationRequest['city_id']);
                if (!$city) return response([ 'message' => 'city doesnt exist']);
            }
            $gasStation = GasStation::findOrFail($gasStationID);
            $gasStationUpdate = $gasStation->update($updatedGasStationRequest);

            return new GasStationResource($gasStation);
        } catch (Exception $e) {
            return response($e, 500);
        }
    }

    /**
     * Delete a gas station by ID
     * 
     * @return Response|Exception
     */
    public function destroy($gasStationID) {
        try {
            $gasStation = GasStation::findOrFail($gasStationID)->delete();
        } catch (Exception $e) {
            return response($e, 500);
        }

        return response(["message" => "gas_station has been deleted"]);
    }
}
