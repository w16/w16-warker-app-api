<?php

namespace App\Models\Gestao;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    protected $fillable = ['nome_cidade', 'latitude', 'longitude'];


    public function postos()
    {
        return $this->hasMany(Posto::class);
    }

}
