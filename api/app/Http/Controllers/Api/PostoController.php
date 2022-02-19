<?php

namespace App\Http\Controllers\Api;

use \App\Http\Controllers\Controller;
use \App\Models\Posto;
use \App\Http\Resources\PostoResource;
use \App\Http\Requests\StoreUpdatePostoRequest;

class PostoController extends Controller {

    public function __construct(Posto $posto) {
        $this->posto = $posto;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return Posto::factory()->makeOne()->only(['cidade_id', 'reservatorio', 'latitude', 'longitude']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdatePostoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePostoRequest $request) {
        try {
            $posto = $this->posto->create($request->all());
            return response()->json(
                            PostoResource::make($posto),
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
     * @param  Posto $posto
     * @return \Illuminate\Http\Response
     */
    public function show(Posto $posto) {
        return response()->json(
                        PostoResource::make($posto),
                        200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdatePostoRequest  $request
     * @param  Posto $posto
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePostoRequest $request, Posto $posto) {
        try {
            $posto->update($request->all());
            return response()->json(
                            PostoResource::make($posto),
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
     * @param  Posto $posto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posto $posto) {
        try {
            $posto->delete();
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
