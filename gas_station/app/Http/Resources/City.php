<?php

namespace App\Http\Resources;

use App\Models\Coordinates;
use App\Models\GasStation;
use Illuminate\Http\Resources\Json\JsonResource;

class City extends JsonResource
{
    // return the object as json resource array
    // used on Controller to return the data
    public function toArray($request)
    {
        //return parent::toArray($request);
        // return the attributes of city
        return [
            'id' => $this->id,
            'city' => $this->city,
            'coordinates_id'=> $this->whenPivotLoaded('coordinates','coordinates_id', function (){
                return Coordinates::query()->findOrFail($this->coordinates_id);
            }),
            'gas_stations_id' => $this->whenPivotLoaded('gas_stations','gas_stations_id', function (){
                return GasStation::query()->findOrFail($this->gas_stations_id);
            }),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
