<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Posto extends JsonResource
{
    public static $wrap = false;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "reservatorio" => $this->reservatorio,
            "coords"=>[
                "latitude"=>$this->latitude,
                "longitude"=>$this->longitude
            ],
            "updated_at"=>$this->updated_at,
            "created_at"=>$this->created_at
        ];
    }
}
