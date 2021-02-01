<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\City;

class CityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $gas_stations = City::find($this->id)->gasStations;

        $gas_stations_formated = array();
        foreach($gas_stations as $gas_sation) {
            $gas_stations_formated[] = new GasStationResource($gas_sation);
        }

        return [
            'id' => $this->id,
            'cidade' => $this->nome_da_cidade,
            'coords' => [
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
            ],
            'postos' => $gas_stations_formated,
        ];
    }
}
