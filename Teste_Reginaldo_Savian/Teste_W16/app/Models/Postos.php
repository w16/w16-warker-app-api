<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postos extends Model
{
    use HasFactory;

    public function cidades() {
        return $this->belongTo(Cidades::class);
    }
}
