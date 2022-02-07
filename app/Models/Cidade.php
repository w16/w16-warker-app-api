<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    protected $fillable = ['nome_cidade', 'latitude','longitude'];

    public function cidade(){
        return $this->hasMany('App\Models\Posto');
    }
}

