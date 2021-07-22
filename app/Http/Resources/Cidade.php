<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Posto as PostoResource;

class Cidade extends JsonResource
{
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
            "cidade" => $this->nome_da_cidade,
            "coords" => [
                "latitude" => $this->latitude,
                "longitude" => $this->longitude,
            ],
            "postos" => PostoResource::collection($this->postos),
        ];
    }
}
