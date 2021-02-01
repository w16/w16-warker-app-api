<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GasStation extends Model
{
    use HasFactory;

    protected $table = 'gas_stations';

    protected $guarded = ['id'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
