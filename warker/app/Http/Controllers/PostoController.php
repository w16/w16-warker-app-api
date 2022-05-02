<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posto;

class PostoController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'cidade_id'=>'required|max:20',
            'reservatorio'=>'required',
            'latitude'=>'required',
            'longitude'=>'required'
        ]);

        $posto = new Posto;
        $posto->cidade_id       = $request->cidade_id;
        $posto->reservatorio    = $request->reservatorio;
        $posto->latitude       = $request->latitude;
        $posto->longitude       = $request->longitude;
        $posto->save();
        return response()->json(['mensagem'=>"Posto adicionado com sucesso!"],200);
    }
}
