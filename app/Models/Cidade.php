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
        'longitude'
    ];

    //Especifica a relação 1-n entre cidades e postos
    public function postos()
    {
        return $this->hasMany(Posto::class);
    }
}
