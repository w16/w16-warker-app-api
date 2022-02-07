<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostosResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public static $wrap = 'id';
<<<<<<< HEAD

    //function para filtrar/modelar como os dados serão retornados na api
    public function toArray($request)
    {

=======
    public function toArray($request)
    {
        //return parent::toArray($request);
        
>>>>>>> 7df13676d3301599c243953c486f645680a2f21a
        return [
            'id' => $this->id,
            'reservatorio' => $this->reservatorio,
             'coords' =>  [
                        'latitude' => $this->latitude,
                        'longitude' => $this->longitude
                    ],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
