<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Cidades;
use App\Http\Resources\CidadeResource;

class CidadesController extends Controller
{
    /** 
     * Visualiza todas as cidades cadastradas.
     *
     * @return JSON [{data}]
     */
    public function index()
    {
        // retornando todas cidades pelo index geral
        return CidadeResource::collection(Cidades::all());
    }


    /**
     * Armazena a cidade sendo enviada através da API.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JSON [{cidade}]
     */
    public function store(Request $request)
    {   
        $request->validate([
            'nome_da_cidade' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        //mantem somente os dados que será utilizado.
        $cidade = Cidades::create($request->only('nome_da_cidade','latitude','longitude'));
        return response()->json($cidade, 200);
    }

    /**
     * Visualiza uma cidade especifica
     *
     * @param  int  $id
     * @return JSON [{cidade,code}]
     */
    public function show($id)
    {
        $param =  ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'];
        $code = 200;
        $cidade = Cidades::findOrFail($id);        
        return response()->json(new CidadeResource($cidade),$code, $param,JSON_UNESCAPED_UNICODE);
    }

    /**
     * Atualiza uma cidade específica.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return JSON [{cidade,code}]
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome_da_cidade' => 'nullable',
            'latitude' => 'nullable',
            'longitude' => 'nullable'
        ]);

        try{
            $cidade = Cidades::findOrFail($id);
        }
        catch(ModelNotFoundException $e){
            return response()->json(['status' => 500,'error' => 'Cidade nao encontrada!'], 500);
        }
        
        $cidade->update($request->only('nome_da_cidade','latitude','longitude'));

        return response()->json($cidade, 200);
    }

    /**
     * Remove uma cidade específica.
     *
     * @param  int  $id
     * @return JSON [{status,cidade}]
     */
    public function destroy($id)
    {
        $cidade = Cidades::findOrFail($id);
        if ($cidade->delete()){
            return response()->json(['status'=>'Cidade excluida com sucesso!','cidade' => $cidade], 200);
        }
    }
}
