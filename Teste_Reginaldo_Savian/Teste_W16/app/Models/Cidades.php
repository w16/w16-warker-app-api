<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidades extends Model
{
    use HasFactory;

    public function postos() {
        return $this->hasMany(Postos::class);
    }
}
