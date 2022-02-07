<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posto extends Model
{
    use HasFactory;

    protected $fillable = ['cidade_id','reservatorio','latitude','longitude'];

    public function posto(){
        $this->belongsTo('Cidade');
    }
}
