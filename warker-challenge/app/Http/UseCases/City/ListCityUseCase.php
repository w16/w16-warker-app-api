<?php

namespace App\Http\UseCases\City;

use App\Models\City;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ListCityUseCase
{
    public function execute(int $id)
    {
        $city = City::find($id);


        $data = [
            'id' => $city->id,
            'cidade' => $city->nome_da_cidade,
            'coords' => [
                'latitude' => $city->latitude,
                'longitude' => $city->longitude,
            ],
            'postos' => []

        ];

        foreach ($city->post as $posto) {
            array_push($data['postos'], [
                'id' =>  $posto->id,
                'reservatorio' =>  $posto->reservatorio,
                'coords' => [
                    'latitude' =>  $posto->latitude,
                    'longitude' =>  $posto->longitude,
                ],
                'updated_at' =>  Carbon::parse($posto->updated_at)->format('d-m-Y'),
                'created_at' =>  Carbon::parse($posto->created_at)->format('d-m-Y'),
            ]);
        }
        return $data;
    }
}
