<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function gasStations() {
        return $this->hasMany('\App\Models\GasStation', 'city_id');
    }
}
