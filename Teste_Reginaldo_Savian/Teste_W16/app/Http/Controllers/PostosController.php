<?php

namespace App\Http\Controllers;

use App\Models\Cidades;
use App\Models\Postos;
use Exception;
use Illuminate\Http\Request;

class PostosController extends Controller
{
    //BUSCA OS POSTOS E FORMATA NO JSON SOLICITADO
    public function findPostos($array, $cidade) {
        if ($array == null) {
            $postos = Postos::all();
        }

        else {
            $postos[] = $array;
        }

        $retorno = [];

        foreach($postos as $posto) {
            if ($cidade != null && $posto['id_cidade'] != $cidade) {
                continue;
            }

            $retorno[] = array(
                'id' => $posto['id'],
                'reservatorio' => $posto['reservatorio'],
                'coords' => array(
                    'latitude' => $posto['latitude'],
                    'longitude' => $posto['longitude'],
                ),
                'atualizado_em' => $posto['updated_at'],
                'criado_em' => $posto['created_at']
            );
        }

        return $retorno;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postosController = new PostosController();
        return $postosController->findPostos(null, null);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cidades = Cidades::all();
        return view('incluirPostos', [
            'cidades' => $cidades
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $reservatorio = $request->reservatorio;
            $reservatorio = $reservatorio > 100 ? 100 : $reservatorio;
            $reservatorio = $reservatorio < 1 ? 1 : $reservatorio;

            $posto = new Postos();
            $posto->id_cidade = $request->id_cidade;
            $posto->reservatorio = $reservatorio;
            $posto->latitude = $request->latitude;
            $posto->longitude = $request->longitude;

            $posto->save();

            $retorno['status'] = 'sucesso';
            $retorno['mensagem'] = 'Posto incluido com sucesso';
        } catch(Exception $ex) {
            $retorno['status'] = 'erro';
            $retorno['mensagem'] = 'Erro ao incluir Posto: '.$ex;
        }

        return $retorno;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Postos  $postos
     * @return \Illuminate\Http\Response
     */
    public function show(Postos $posto)
    {
        $postosController = new PostosController();
        return $postosController->findPostos($posto, null);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Postos  $postos
     * @return \Illuminate\Http\Response
     */
    public function edit(Postos $posto)
    {
        $cidades = Cidades::all();
        return view('editarPostos', [
            'cidades' => $cidades,
            'postos' => $posto
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Postos  $postos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postos $posto)
    {
        try {
            $reservatorio = $request->reservatorio;
            $reservatorio = $reservatorio > 100 ? 100 : $reservatorio;
            $reservatorio = $reservatorio < 1 ? 1 : $reservatorio;

            $posto->id_cidade = $request->id_cidade;
            $posto->reservatorio = $reservatorio;
            $posto->latitude = $request->latitude;
            $posto->longitude = $request->longitude;

            $posto->save();

            $retorno['status'] = 'sucesso';
            $retorno['mensagem'] = 'Posto editado com sucesso';
        } catch(Exception $ex) {
            $retorno['status'] = 'erro';
            $retorno['mensagem'] = 'Erro ao editar Posto: '.$ex;
        }

        return $retorno;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Postos  $postos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postos $posto)
    {
        try {
            $posto->delete();

            $retorno['status'] = 'sucesso';
            $retorno['mensagem'] = 'Posto excluido com sucesso';
        } catch (Exception $ex) {
            $retorno['status'] = 'erro';
            $retorno['mensagem'] = 'Erro ao deletar Posto: '.$ex;
        }

        return $retorno;
    }
}
