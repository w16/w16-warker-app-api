<?php

namespace App\Http\Controllers\Api\Gestao;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gestao\PostoRequest;
use App\Http\Resources\Gestao\PostoResource;
use App\Models\Gestao\Posto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Posto::paginate('50');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostoRequest $request)
    {
        DB::beginTransaction();

        try {
            $Posto = Posto::create([
                'cidade_id' => $request->cidade_id,
                'reservatorio' => $request->reservatorio,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude
            ]);
            DB::commit();
            return response()->json(['message' => "Criado com sucesso.", 'data' => $Posto], 200);
        } catch (Exception $ex) {
            DB::rollBack();
            return response()->json(['message' => $ex->getMessage()], 502);
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
        return PostoResource::make(Posto::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostoRequest $request, $id)
    {
        DB::beginTransaction();
        $Posto = Posto::findOrFail($id);

        if ($Posto) {
            try {
                $Posto->update($request->all());

                DB::commit();
                return response()->json(['message' => "Atualizado com sucesso.", 'data' => $Posto], 200);
            } catch (Exception $ex) {
                DB::rollBack();
                return response()->json(['message' => $ex->getMessage()], 502);
            }
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
            $Posto = Posto::findOrFail($id);
            $Posto->delete();
            DB::commit();
            return response()->json(['message' => "Apagado com sucesso."], 200);
        } catch (Exception $ex) {
            DB::rollBack();
            if ($ex->getCode() == "0") {
                return response()->json(['message' => "Esse posto não existe."], 400);
            }
            return response()->json(['message' => $ex->getMessage()], 502);
        }
    }
}
