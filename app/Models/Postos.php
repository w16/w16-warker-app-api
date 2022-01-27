<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postos extends Model
{
    use HasFactory;

    protected $fillable = ['cidade_id','reservatorio', 'latitude', 'longitude'];

    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at'];
}
