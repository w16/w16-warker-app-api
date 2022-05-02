<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cidade;

class CidadeController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'nome_da_cidade'=>'required|max:255',
            'latitude'=>'required',
            'longitude'=>'required'
        ]);

        $cidade = new Cidade;
        $cidade->nome_da_cidade = $request->nome_da_cidade;
        $cidade->latitude       = $request->latitude;
        $cidade->longitude      = $request->longitude;
        $cidade->save();
        return response()->json(['mensagem'=>"Cidade adicionada com sucesso!"],200);
    }
}
