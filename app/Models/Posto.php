<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posto extends Model
{
    use HasFactory;

    protected $fillable = [
        'cidade_id',
        'reservatorio',
        'latitude',
        'longitude',
    ];

    protected $hidden = [
        'cidade_id',
        'cidade_type'
    ];

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }
}
