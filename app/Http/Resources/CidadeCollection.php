<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CidadeCollection extends CidadeResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'cidade' => $this->nome_da_cidade,
            'coords' => [
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
            ],
            'postos' => PostoCollection::collection($this->postos),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
