<?php

namespace App\Http\Controllers\Api;

use \App\Http\Controllers\Controller;
use \App\Models\Cidade;
use \App\Http\Resources\CidadeResource;
use \App\Http\Requests\{
    UpdateCidadeRequest,
    StoreCidadeRequest
};

class CidadeController extends Controller {

    public function __construct(Cidade $cidade) {
        $this->cidade = $cidade;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return CidadeResource::collection($this->cidade->with('postos')->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateCidadeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCidadeRequest $request) {
        try {
            $cidade = $this->cidade->create($request->all());
            return response()->json(
                            CidadeResource::make($cidade),
                            201
            );
        } catch (Exception $err) {
            return response()->json([
                        'error' => 'Erro ao cadastrar.'
                            ], 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Cidade $cidade
     * @return \Illuminate\Http\Response
     */
    public function show(Cidade $cidade) {
        return CidadeResource::make($cidade);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateCidadeRequest  $request
     * @param  Cidade $cidade
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCidadeRequest $request, Cidade $cidade) {
        try {
            $cidade->update($request->all());
            return response()->json(
                            CidadeResource::make($cidade),
                            200
            );
        } catch (Exception $err) {
            return response()->json([
                        'error' => 'Erro ao atualizar.'
                            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Cidade $cidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cidade $cidade) {
        try {
            $cidade->delete();
        } catch (Exception $err) {
            return response()->json([
                        'error' => 'Erro ao excluir registro.'
                            ], 404);
        }

        return response()->json(
                        true,
                        200
        );
    }

}
