<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posto;

class PostoController extends Controller
{

    public function show($id){
        $postoId = Posto::find($id);

        if($postoId){
            return response()->json(['postos'=>$postoId], 200);
        }else{
            return response()->json(['mensagem'=>'Posto não encontrado!'], 404);
        }

    }

    public function destroy($id){
    
        $posto = Posto::find($id);

        if($posto){
            $posto->delete();
            return response()->json(['message'=>'Posto deletado com sucesso!'], 200);
        }else{
            return response()->json(['message'=>'Posto não encontrado!'], 404);

        }
    }

    public function update(Request $request, $id){
            $request->validate([
                'cidade_id'=>'required|max:20',
                'reservatorio'=>'required',
                'latitude'=>'required',
                'longitude'=>'required'
            ]);

            $posto = Posto::find($id);

            if($posto){
                $posto->cidade_id       = $request->cidade_id;
                $posto->reservatorio    = $request->reservatorio;
                $posto->latitude       = $request->latitude;
                $posto->longitude       = $request->longitude;
                $posto->update();
                return response()->json(['mensagem'=>"Posto atualizado com sucesso!"],200);
            }else{
                return response()->json(['mensagem'=>'Posto não encontrado!'], 404);
            }
          
    }
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
