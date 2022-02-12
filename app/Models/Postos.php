<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postos extends Model
{
    use HasFactory;
    protected $fillable = ["reservatorio","latitude","longitude"];

    public function cidades()
    {
        return $this->belongsTo(Cidades::class);
    }
}
