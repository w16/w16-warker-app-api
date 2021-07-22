<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_da_cidade',
        'latitude',
        'longitude',
    ];

    public function postos()
    {
        return $this->hasMany(Posto::class);
    }

    public function posto()
    {
        return $this->hasOne(Posto::class);
    }
}
