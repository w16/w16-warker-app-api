<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Entity extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $attribs = $this->attributesToArray();

        // Deve formatar dados em pares chave/valor para serem aceitas 
        // pelas funções array_(...)_key abaixo.
        $dateAttribs = array_fill_keys(['updated_at', 'created_at'], ''); 

        $attribs['dates'] = array_intersect_key($attribs, $dateAttribs);

        $attribs = array_diff_key($attribs, $dateAttribs);

        return array_merge($attribs, $this->relationsToArray());
    }
}
