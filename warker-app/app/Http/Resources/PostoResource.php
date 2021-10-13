<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostoResource extends JsonResource
{
    public function toArray($request)
    {
        // recurso para manipulação de exibição dos dados, podendo incluir relacionamentos na exibição JSON

        return [
            'id' => $this->id,
            'reservatorio' => $this->reservatorio,
            'coords' => [
                'latitude' => $this->latitude,
                'longitude' => $this->longitude
            ],
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at
        ];
    }
}
