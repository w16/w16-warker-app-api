<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class GasStation extends Model
{
    use HasFactory;

    protected $fillable = [
        'cidade_id',
        'reservatorio',
        'latitude',
        'longitude',
    ];


    public function cidade()
    {
        return $this->belongsTo(City::class, 'cidade_id', 'id');
    }


    /* Treat the data to match with the endpoint asked in Read me Warker Challenge*/
    public static function prepareGasStationListEndpoint($element)
    {
        $list = $element->map(function ($item) {
            $item = [
                'id' => $item->id,
                'reservatorio' => $item->reservatorio,
                'coords' => [
                    'latitude' => $item->latitude,
                    'longitude' => $item->longitude
                ],
                'updated_at' => $item->updated_at,
                'created_at' => $item->created_at,
            ];
            return $item;
        });

        return $list;
    }

    /* Treat the data to match with the endpoint asked in Read me Warker Challenge*/
    public static function prepareGasStationEndpoint($element)
    {
        $element = [
            'id' => $element->id,
            'reservatorio' => $element->reservatorio,
            'coords' => [
                'latitude' => $element->latitude,
                'longitude' => $element->longitude
            ],
            'updated_at' => $element->updated_at,
            'created_at' => $element->created_at,
        ];

        return $element;
    }
}
