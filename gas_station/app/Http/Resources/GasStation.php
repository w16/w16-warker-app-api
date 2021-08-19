<?php

namespace App\Http\Resources;
use \App\Models\Coordinates;

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
            'coordinates_id'=> $this->whenPivotLoaded('coordinates','coordinates_id', function (){
                return Coordinates::query()->findOrFail($this->coordinates_id);
            }),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
