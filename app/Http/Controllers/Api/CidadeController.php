<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CidadeCollection;
use App\Http\Resources\CidadeResource as CidadeResource;
use App\Http\Resources\PostoResource;
use App\Models\Cidade as Cidade;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new CidadeResource(Cidade::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request, Cidade $cidade)
    {
        foreach(array_keys($request->all()) as $index){
            $cidade->$index = $request->input($index);
        }
        if($cidade->save()){
            return new CidadeResource($cidade);
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
            return new CidadeCollection(Cidade::findOrFail($id));
        } catch (Exception) {
            return response()->json('Não encontrado', 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $cidade = Cidade::findOrFail($id);
             /**percorre os indices do array de valores passados na request, armazenado o valor de cada indice na referido propriedade do modelo/objeto cidade*/
            foreach(array_keys($request->all()) as $index){
                $cidade->$index = $request->input($index);
            }
    
            if($cidade->save()){
                DB::commit();
                return new CidadeResource($cidade);
            }
            
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
            $cidade = Cidade::findOrFail($id);
            if($cidade->delete()){
                DB::commit();
                return response()->json(true, 200);
            }
        } catch (Exception $ex) {
            DB::rollBack();
            return response()->json($ex->getMessage(), 502);
        }
    }
}
