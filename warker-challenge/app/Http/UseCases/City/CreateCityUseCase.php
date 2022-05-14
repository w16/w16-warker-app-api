<?php

namespace App\Http\UseCases\City;

use App\Models\City;

class CreateCityUseCase
{
    public function execute(array $data)
    {
        City::create([
            'nome_da_cidade' => $data['nome_da_cidade'],
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude'],
        ]);
    }
}
