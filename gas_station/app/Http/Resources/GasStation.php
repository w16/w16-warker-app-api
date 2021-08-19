<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GasStation extends JsonResource
{
   // return the object as json resource array
    // used on Controller to return the data
    public function toArray($request)
    {
        //return parent::toArray($request);
        // return the attributes of coordination
        return [
            'id' => $this->id,
            'tank'=> $this->tank,
            'coordinates_id'=> $this->coordinates_id,
        ];
    }
}
