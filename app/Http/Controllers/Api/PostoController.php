<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostoCollection;
use App\Http\Resources\PostoResource;
use App\Models\Cidade;
use App\Models\Posto as Posto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class PostoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PostoResource(Posto::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Posto $posto)
    {
        foreach(array_keys($request->all()) as $index){
            $posto->$index = $request->input($index);
        }
        if($posto->save()){
            return new PostoResource($posto);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            return new PostoCollection(Posto::findOrFail($id));
        } catch (Exception $ex) {
            return response()->json($ex->getMessage(), 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /** este metodo recebe a request e o id, para efetuar uma atualização*/
    public function update(Request $request, $id)
    {
        /** busca o registro pelo id, se não for encontrado, o metodo findOrFail retorna uma exception, se for encontrado armazena no objeto posto*/
        /** abre uma transaction */
        DB::beginTransaction();
        try {
            $posto = Posto::findOrFail($id);
            /**percorre os indices do array de valores passados na request, armazenado o valor de cada indice na referido propriedade do modelo/objeto posto*/
            foreach(array_keys($request->all()) as $index){
                $posto->$index = $request->input($index);
            }
            /** se o update obtiver sucesso a transaction é "commitada" e retorna o json ao usuário que foi convertido do modelo através da classe "PostoResource"*/
            if($posto->save()){
                DB::commit();
                return new PostoResource($posto);
            }
            /**Caso ocarra erro ao efetuar o save dos dados, é executado o rollback e retornado a exception*/
        } catch (Exception $ex) {
            DB::rollBack();
            return response()->json($ex->getMessage(), 502);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $posto = Posto::findOrFail($id);
            if($posto->delete()){
                DB::commit();
                return response()->json(true, 200);
            }
        } catch (Exception $ex) {
            DB::rollBack();
            return response()->json($ex->getMessage(), 502);
        }
    }
}
