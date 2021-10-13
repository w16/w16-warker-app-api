<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CidadeResource extends JsonResource
{
    public function toArray($request)
    {
        // recurso para manipulação de exibição dos dados, podendo incluir relacionamentos na exibição JSON

        return [
            'id' => $this->id,
            'cidade' => $this->nome_da_cidade,
            'coords' => [
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
            ],

            // exibir o posto da cidade
            'postos' => PostoResource::collection($this->postos)
        ];
    }
}
