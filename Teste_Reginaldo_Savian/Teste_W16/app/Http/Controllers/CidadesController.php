<?php

namespace App\Http\Controllers;

use App\Models\Cidades;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\PostosController;

class CidadesController extends Controller
{
    //BUSCA AS CIDADES E FORMATA NO JSON SOLICITADO
    public function findCidades($array) {
        if ($array == null) {
            $cidades = Cidades::all();
        }

        else {
            $cidades[] = $array;
        }

        $retorno = [];
        $postos = new PostosController();

        foreach($cidades as $cidade) {
            $retorno[] = array(
                'id' => $cidade['id'],
                'cidade' => $cidade['nome'],
                'coords' => array(
                    'latitude' => $cidade['latitude'],
                    'longitude' => $cidade['longitude'],
                ),
                'postos' => $postos->findPostos(null, $cidade['id'])
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
        $cidadesController = new CidadesController();
        return $cidadesController->findCidades(null);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('incluirCidades');
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
            $cidade = new Cidades();
            $cidade->nome = strtoupper($request->nome);
            $cidade->latitude = $request->latitude;
            $cidade->longitude = $request->longitude;

            $cidade_similar = Cidades::where('nome', $cidade->nome)->count();

            if ($cidade_similar == 0) {
                $cidade->save();

                $retorno['status'] = 'sucesso';
                $retorno['mensagem'] = 'Cidade incluida com sucesso';
            }

            else {
                $retorno['status'] = 'atencao';
                $retorno['mensagem'] = 'Cidade informada ja existente';
            }
        } catch(Exception $ex) {
            $retorno['status'] = 'erro';
            $retorno['mensagem'] = 'Erro ao incluir Cidade: '.$ex;
        }

        return $retorno;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cidades  $cidades
     * @return \Illuminate\Http\Response
     */
    public function show(Cidades $cidade)
    {
        $cidadesController = new CidadesController();
        return $cidadesController->findCidades($cidade);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cidades  $cidades
     * @return \Illuminate\Http\Response
     */
    public function edit(Cidades $cidade)
    {
        return view('editarCidades', [
            'cidades' => $cidade
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cidades  $cidades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cidades $cidade)
    {
        try {
            $cidade->nome = strtoupper($request->nome);
            $cidade->latitude = $request->latitude;
            $cidade->longitude = $request->longitude;

            $cidade_similar = Cidades::where('nome', $cidade->nome)->where('id', '!=', $cidade->id)->count();

            if ($cidade_similar == 0) {
                $cidade->save();

                $retorno['status'] = 'sucesso';
                $retorno['mensagem'] = 'Cidade editada com sucesso';
            }

            else {
                $retorno['status'] = 'alerta';
                $retorno['mensagem'] = 'Cidade informada ja existente';
            }
        } catch (Exception $ex) {
            $retorno['status'] = 'erro';
            $retorno['mensagem'] = 'Erro ao editar Cidade: '.$ex;
        }

        return $retorno;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cidades  $cidades
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cidades $cidade)
    {
        try {
            $cidade->delete();

            $retorno['status'] = 'sucesso';
            $retorno['mensagem'] = 'Cidade excluida com sucesso';
        } catch (Exception $ex) {
            $retorno['status'] = 'erro';
            $retorno['mensagem'] = 'Erro ao deletar Cidade: '.$ex;
        }

        return $retorno;
    }
}
