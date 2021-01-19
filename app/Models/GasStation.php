<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GasStation extends Model
{
    use HasFactory;

    public function cities() {
        return $this->belongsTo('\App\Models\City', 'city_id')
    }
}
