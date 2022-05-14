<?php

namespace App\Http\UseCases\City;

use App\Models\City;


class UpdateCityUseCase
{
    public function execute(array $data, int $id)
    {
        $city = City::where('id', $id)->update($data);
        return $city;
    }
}
