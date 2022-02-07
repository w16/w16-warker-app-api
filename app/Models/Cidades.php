<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidades extends Model
{
    use HasFactory;

    protected $fillable = [ 
                            'nome_da_cidade', 
                            'latitude', 
                            'longitude'
                        ];

    public function postos()
    {
        return $this->hasMany(Postos::class, 'cidade_id');  //procura pela cidade_id
    }


}
