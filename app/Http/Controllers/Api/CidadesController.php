<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cidade;
use App\Models\Posto;

class CidadesController extends Controller
{
    public function getCidade($id) {
    	$cidade = Cidade::find($id);

    	if(is_null($cidade)) {
    		return response()->json([
    			'message' => 'Nenhum registro encontrado.'
    		]);
    	}

    	$cidade->postos = Posto::where('cidade_id', '=', $cidade->id)->get();
    	return response()->json($cidade);
    }
}
