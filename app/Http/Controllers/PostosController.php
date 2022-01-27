<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Postos;
use App\Models\Cidades;

class PostosController extends Controller
{
    /**
     * Visualiza todos os postos cadastrados.
     *
     * @return JSON [{data,...}]
     */
    public function index()
    {
        return Postos::all();
    }

    /**
     * Armazena um posto sendo enviada através da API.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JSON [{posto}]
     */
    public function store(Request $request)
    {
        $request->validate([
            'cidade_id' => 'required',
            'reservatorio' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        try{
            $cidade = Cidades::findOrFail($request->cidade_id);
        }
        catch(ModelNotFoundException $e){
            return response()->json(['status' => 500,'error' => 'Cidade nao encontrada!'], 500);
        }
        
        //mantem somente os dados que será utilizado.
        $posto = Postos::create($request->only('cidade_id','reservatorio','latitude','longitude'));

        return response()->json($posto, 200);
    }

    /**
     * Visualiza um posto especifico.
     *
     * @param  int  $id
     * @return JSON [{postos,code}]
     */
    public function show($id)
    {
        $param =  ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'];
        $code = 200;
        $posto = Postos::findOrFail($id);        
        $posto_template = [
            'id' => $posto->id,
            'reservatorio' => $posto->reservatorio,
            'coords' => [
                'latitude' => $posto->latitude,
                'longitude' => $posto->longitude,
            ],
            'created_at' => $posto->created_at,
            'updated_at' => $posto->updated_at
        ];
        return response()->json($posto_template,$code, $param,JSON_UNESCAPED_UNICODE);
    }

    /**
     * Atualiza um posto específico.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return JSON [{posto,code}]
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'cidade_id' => 'nullable',
            'reservatorio' => 'nullable',
            'latitude' => 'nullable',
            'longitude' => 'nullable'
        ]);
        
        try{
            $posto = Postos::findOrFail($id);
        }
        catch(ModelNotFoundException $e){
            return response()->json(['status' => 500,'error' => 'Posto nao encontrada!'], 500);
        }

        $posto->update($request->only('cidade_id','reservatorio','latitude','longitude'));

        return response()->json($posto, 200);
    }

    /**
     * Remove um posto específico.
     *
     * @param  int  $id
     * @return JSON [{status,posto}]
     */
    public function destroy($id)
    {
        $posto = Postos::findOrFail($id);  
        if ($posto->delete()){
            return response()->json(['status'=>'Posto excluido com sucesso!','posto' => $posto], 200);
        }
    }
}
