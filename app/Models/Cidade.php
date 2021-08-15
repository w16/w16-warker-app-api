<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    /**Relacionameto tem muitos com a classe Posto*/
    public function postos()
    {
        return $this->hasMany(Posto::class);
    }
}
