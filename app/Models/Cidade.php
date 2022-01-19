<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Cidade extends Model
{
    use HasFactory;

    protected $fillable = [
    	'nome_da_cidade',
	    'latitude',
	    'longitude'
    ];
}
