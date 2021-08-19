<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Coordinates extends JsonResource
{
    // return the object as json resource array
    // used on Controller to return the data
    public function toArray($request)
    {
        //return parent::toArray($request);
        // return the attributes of coordination
        return [
            'id' => $this->id,
            'latitude'=> $this->latitude,
            'longitude'=> $this->longitude,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
