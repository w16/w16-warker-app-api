<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'reservatorio' => $this->reservatorio,
            'latitude' => $this->latitude,
            'logintude' => $this->logintude,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at
          ];
    }
}
