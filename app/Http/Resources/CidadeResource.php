<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Cidades;

class CidadeResource extends JsonResource
{
    /**
     * Organiza para o que é esperado no Endpoint
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $postos = [];

        foreach(Cidades::find($this->id)->Postos as $posto) {
            $postos[] = [
                'id' => $posto->id,
                'reservatorio' => $posto->reservatorio,
                'coords' => [
                    'latitude' => $posto->latitude,
                    'longitude' => $posto->longitude,
                ],
                'created_at' => $posto->created_at,
                'updated_at' => $posto->updated_at
            ];
        }        
        return [
            'id' => $this->id,
            'cidade' => $this->nome_da_cidade,
            'coords' => [
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
            ],
            'postos' => $postos,
        ];
    }
}
