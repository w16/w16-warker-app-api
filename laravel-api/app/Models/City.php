<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'cidades';

    protected $fillable = ['nome_da_cidade', 'latitude', 'longitude',];

    public function gasStations()
    {
        return $this->hasMany(GasStation::class, 'cidade_id');
    }
}
