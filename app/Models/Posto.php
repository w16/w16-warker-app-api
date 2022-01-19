<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Posto extends Model
{
    use HasFactory;

    protected $fillable = [
    	'cidade_id',
	    'reservatorio',
	    'latitude',
	    'longitude'
    ];

    // Buscar os postos com o nome das cidades que eles pertencem
    public static function getPostos() {
    	return DB::table('postos')
                    ->select('postos.*', 'cidades.nome_da_cidade')
				   	->join('cidades', 'postos.cidade_id', '=', 'cidades.id')
				   	->get();
    }
}