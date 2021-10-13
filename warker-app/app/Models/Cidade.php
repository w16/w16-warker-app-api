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
        // Relacionamento "Um para Muitos" Cidade tem muitos Postos
        return $this->hasMany(Posto::class);
    }
}
