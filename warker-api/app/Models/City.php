<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_da_cidade',
        'latitude',
        'longitude',
    ];

    public function gasStations()
    {
        return $this->hasMany(GasStation::class, 'cidade_id', 'id');
    }

    /* Treat the data to match with the endpoint asked in Read me Warker Challenge*/
    public static function prepareCityListEndpoint($element)
    {
        $list = $element->map(function ($item) {

            $item = [
                'id' => $item->id,
                'cidade' => $item->nome_da_cidade,
                'coords' => [
                    'latitude' => $item->latitude,
                    'longitude' => $item->longitude
                ],
                'postos' => GasStation::prepareGasStationListEndpoint($item->gasStations)
            ];
            return $item;
        });

        return $list;
    }

    /* Treat the data to match with the endpoint asked in Read me Warker Challenge*/
    public static function prepareCityEndpoint($element)
    {
        $element = [
            'id' => $element->id,
            'cidade' => $element->nome_da_cidade,
            'coords' => [
                'latitude' => $element->latitude,
                'longitude' => $element->longitude
            ],
            'postos' => GasStation::prepareGasStationListEndpoint($element->gasStations)
        ];
        return $element;
    }
}
