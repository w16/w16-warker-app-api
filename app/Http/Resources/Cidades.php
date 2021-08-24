<?php

namespace App\Http\Resources;

use App\Http\Controllers\api\PostoController;
use Illuminate\Http\Resources\Json\JsonResource;

class Cidades extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $postos = new PostoController;

        return [
            'id' => $this->id,
            'cidade' => $this->nome_da_cidade,
            'coords' => [
                'latitude' => $this->latitude,
                'longitude' => $this->longitude
            ],
            'postos' => $postos->show($this->id, true)
        ];
    }
}
