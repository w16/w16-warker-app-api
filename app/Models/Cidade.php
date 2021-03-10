<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome_da_cidade',
        'latitude',
        'longitude'
    ];
    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at'];
}
