<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use Illuminate\Http\Request;

class CidadeController extends Controller
{

    public function __construct(Cidade $cidade)
    {
        $this->cidade = $cidade;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cidades = $this->cidade->all();
        return response()->json($cidades,200);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCidadeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { //Insere o registro na base de dados e retorna o valor $request

        $regras = [

            'nome_cidade' => 'required|unique:cidades',
        ];


        $feedback = [

            'nome.unique' => 'Essa cidade já existe!'
        ];

        $request->validate($regras, $feedback);

        $cidade = Cidade::create($request->all());
        return response()->json($cidade,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cidade = $this->cidade->with('posto')->find($id);
        if($cidade === null){
            return response()->json(['error' => 'Recurso pesquisado não existe'],404);
        }
        return response()->json($cidade, 200);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCidadeRequest  $request
     * @param  \App\Models\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cidade $id)
    {
        $cidade = $this->cidade->find($id);
        if ($cidade === null)
        {
            return response()->json(['error' => 'Atualização impossivel de ser realizada.'], 404);
        }
        $cidade->update($request->all());
        return response()->json($cidade, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cidade = $this->cidade->find($id);

        if ($cidade === null) {
            return response()->json(['Error' => 'Recurso indisponivel. Impossivel ser deletado.'], 404);
        }
        $cidade->delete();
        return response()->json(['msg' => 'A Cidade deletada com sucesso!'], 200);
    }
}
