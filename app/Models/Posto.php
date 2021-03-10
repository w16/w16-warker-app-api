<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posto extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cidade_id',
        'reservatorio',
        'latitude',
        'longitude'
    ];
    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at'];
}
