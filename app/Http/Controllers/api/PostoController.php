<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Postos;
use App\Models\Posto;
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
        return Posto::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Posto::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $cidade_id = false) // se for uma pesquisa para relacionada a uma cidade pesquisa pelo id da cidade, se não pequisa pelo id do posto
    {
        $cidade_id
            ? $qryId = 'cidade_id'
            : $qryId = 'id';

        $postos = DB::table('postos')
            ->select()
            ->where($qryId, '=', $id)
            ->get();

        return  Postos::collection($postos);
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
        $posto = Posto::findOrFail($id);
        $posto->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posto = Posto::findOrFail($id);
        $posto->delete();
    }
}
