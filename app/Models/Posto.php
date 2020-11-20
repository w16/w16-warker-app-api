<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posto extends Model
{
    use  HasFactory,SoftDeletes;
   
    /**
     * Retorna dados do relacionamento de Postos com Cidades
     * 
     * @param $id id da cidade atual 
     * @return Collection 
     */
    public function getPostosCidade($id){
       return Posto::where('cidade_id','=',$id)->orderBy("id")->get();
    }
    /**
     * Retorna a cidade relacionada a Posto
     * 
     * @return Cidade
     */
    public function cidades(){
        
        return $this->belongsTo('\App\Models\Cidade', 'cidade_id');
    }

    protected $guarded = [];
}
