<?php

namespace App\Http\Resources;

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
            'coordinates_id' => $this->coordinates_id,
            'gas_stations_id' => $this->gas_stations_id,
        ];
    }
}
