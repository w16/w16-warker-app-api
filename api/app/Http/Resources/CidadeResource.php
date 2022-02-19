<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CidadeResource extends JsonResource {

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request) {
        return [
            "id" => $this->id,
            "cidade" => $this->nome_da_cidade,
            "coords" => [
                "longitude" => $this->longitude,
                "latitude" => $this->latitude
            ],
            "postos" => PostoResource::collection($this->postos)
        ];
    }

}
