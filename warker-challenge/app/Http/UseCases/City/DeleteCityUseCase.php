<?php

namespace App\Http\UseCases\City;

use App\Models\City;
use Illuminate\Support\Facades\DB;

class DeleteCityUseCase
{
    public function execute(int $id)
    {
        DB::table('cidades')->where('id', $id)->delete();
    }
}
