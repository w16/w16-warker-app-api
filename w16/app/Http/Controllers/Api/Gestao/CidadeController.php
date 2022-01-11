<?php

namespace App\Http\Controllers\Api\Gestao;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gestao\CidadeRequest;
use App\Http\Resources\Gestao\CidadeResource;
use App\Models\Gestao\Cidade;
use App\Models\Gestao\Posto;
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
        return Cidade::paginate('50');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CidadeRequest $request)
    {
        DB::beginTransaction();

        try {
            $Cidade = Cidade::create([
                'nome_cidade' => $request->nome_cidade,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude
            ]);
            DB::commit();
            return response()->json(['message' => "Criado com sucesso.", 'data' => $Cidade], 200);
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
        return CidadeResource::make(Cidade::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CidadeRequest $request, $id)
    {
        DB::beginTransaction();

        $Cidade = Cidade::findOrFail($id);

        if ($Cidade) {
            try {
                $Cidade->update($request->all());

                DB::commit();
                return response()->json(['message' => "Atualizado com sucesso.", 'data' => $Cidade], 200);
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
            $Cidade = Cidade::findOrFail($id);
            $Cidade->delete();
            DB::commit();
        } catch (Exception $ex) {
            DB::rollBack();
            if ($ex->getCode() === "23000") {
                return response()->json(['message' => 'Você não pode apagar essa cidade pois ela está vinculada a um posto.'], 400);
            }
            return response()->json(['message' => $ex->getMessage()], 502);
        }
    }
}
