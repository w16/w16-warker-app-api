<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PostoCollection;

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
        //return parent::toArray($request);

        $this->load('postos');

        $postos = new PostoCollection($this->postos);

        return [
            'id' => $this->id,
            'cidade' => $this->nome_da_cidade,
            'coords' => [
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
            ],
            'postos' => $postos,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at
        ];
    }
}
