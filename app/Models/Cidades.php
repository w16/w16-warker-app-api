<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidades extends Model
{
    use HasFactory;

    protected $fillable = ['nome_da_cidade', 'latitude', 'longitude'];

    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at'];

    /**
     * Retorna os postos desta cidade.
     *
     * @return \App\Models\Postos::class
     */
    public function Postos()
    {
        return $this->hasMany(Postos::class,'cidade_id');
    }
}
