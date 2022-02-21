<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;

class GasStation extends Model
{
    use HasFactory;

    protected $table = 'postos';

    protected $fillable = ['cidade_id', 'nome_do_posto', 'reservatorio', 'latitude', 'longitude'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
