<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PostosResource;

class CidadesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

<<<<<<< HEAD
    public static $wrap = 'id'; 

    //function para filtrar/modelar como os dados serão retornados na api
=======
    public static $wrap = 'id';
>>>>>>> 7df13676d3301599c243953c486f645680a2f21a
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'cidade' => $this->nome_da_cidade,
            'coords' => [
                        'latitude' => $this->latitude,
                        'longitude' => $this->longitude
            ],
            'postos' => PostosResource::collection($this->postos),
            
        ];
    }
}
