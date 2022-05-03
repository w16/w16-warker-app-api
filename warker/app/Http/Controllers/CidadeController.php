<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cidade;
use App\Models\Posto;
use Illuminate\Support\Facades\DB;

class CidadeController extends Controller
{

    public function show($id){
        $cidadeId = Cidade::find($id);
        $postoId = Posto::find($id);

       // $postos = Posto::where('cidade_id', $postoId->id)->exclude('cidade_id')->get();

        $postos = DB::table('postos')
        ->select('id','reservatorio','latitude','longitude','updated_at','created_at')
        ->where('cidade_id', '=', $postoId->id)
        ->get();

        if($postos){
            foreach ($postos as $key => $post) {
                $data2[$key] = [
                    'id'            =>      $post->id,
                    'reservatorio'  =>      $post->reservatorio,
                    'coords'        =>[
                        'latitude'      =>      $post->latitude,
                        'longitude'     =>      $post->longitude
                    ],
                    'updated_at' => $post->updated_at,
                    'created_at' => $post->created_at
                ];
            }      
        }

        if($cidadeId){
            $data= $cidadeId;
            
            $data = [
                'id'            =>      $cidadeId->id,
                'cidade'  =>            $cidadeId->nome_da_cidade,
                'coords'        =>[
                    'latitude'      =>      $cidadeId->latitude,
                    'longitude'     =>      $cidadeId->longitude
                ],
                'postos'        =>[
                    $data2
                ],                
                'updated_at' => $cidadeId->updated_at,
                'created_at' => $cidadeId->created_at
            ];
            
            return $data;

        }else{
            return response()->json(['mensagem'=>'Posto não encontrado!'], 404);
        }

    }
    
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

    public function update(Request $request, $id){
        $request->validate([
            'nome_da_cidade'=>'required|max:255',
            'latitude'=>'required',
            'longitude'=>'required'
        ]);

        $cidade = Cidade::find($id);

        if($cidade){
            $cidade->nome_da_cidade       = $request->nome_da_cidade;
            $cidade->latitude       = $request->latitude;
            $cidade->longitude       = $request->longitude;
            $cidade->update();
            return response()->json(['mensagem'=>"Cidade atualizada com sucesso!"],200);
        }else{
            return response()->json(['mensagem'=>'Cidade não encontrada!'], 404);
        }
      
    }

    public function destroy($id){
    
        $cidade = Cidade::find($id);

        if($cidade){
            $cidade->delete();
            return response()->json(['message'=>'Cidade deletada com sucesso!'], 200);
        }else{
            return response()->json(['message'=>'Cidade não encontrada!'], 404);

        }
    }




}
