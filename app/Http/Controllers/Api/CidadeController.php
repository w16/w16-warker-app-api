<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cidades;

class CidadeController extends Controller
{

    private $store;
    public function __construct(Cidades $store)
    {
        $this->store = $store;
    }
    //*********************************************************** */
    public function index()
    {
        return $this->store::paginate(15);
    }
    //*********************************************************** */
    public function store(Request $request)
    {
        $cidade = new Cidades();
        $cidade->nome_da_cidade = $request->input('nome_da_cidade');
        $cidade->latitude = $request->input('latitude');
        $cidade->longitude = $request->input('longitude');
        if ($cidade->save()) {
            return $cidade;
        }
    }
    //*********************************************************** */
    public function show($id)
    {
        $cidade = Cidades::with("postos")->get()->find($id);
        $posto = $cidade->postos[0];

        $dados = [
            "id"=>$cidade->id,
            "cidade"=>$cidade->nome_da_cidade,
            "coords"=>[
                "latitude"=>$cidade->latitude,
                "longitude"=>$cidade->longitude
            ],
            "postos"=>[
                "id"=>$posto->id,
                "reservatorio"=>$posto->reservatorio,
                "coords"=>[
                    "latitude"=>$posto->latitude,
                    "longitude"=>$posto->longitude
                ],
                "updated_at"=>$posto->updated_at,
                "created_at"=>$posto->created_at
            ]
        ];
        return $dados;
    }
    //*********************************************************** */
    public function update(Request $request, $id)
    {
        $cidade = Cidades::findOrFail($id);
        $cidade->nome_da_cidade = $request->input('nome_da_cidade');
        $cidade->latitude = $request->input('latitude');
        $cidade->longitude = $request->input('longitude');
        if ($cidade->save()) {
            return $cidade;
        }
    }
    //*********************************************************** */
    public function destroy($id)
    {
        $cidade = Cidades::findOrFail($id);
        if ($cidade->delete()) {
            return $cidade;
        }
    }
}
