<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posto extends Model {

    use HasFactory;

    protected $fillable = ['cidade_id', 'reservatorio', 'latitude', 'longitude'];

    public function cidade() {
        return $this->belongsTo(Cidade::class);
    }

}
