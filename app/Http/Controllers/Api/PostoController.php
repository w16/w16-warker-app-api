<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Postos;

class PostoController extends Controller
{
    private $store;

    public function __construct(Postos $store)
    {
        return $this->store = $store;
    }
    //*********************************************************** */
    public function index()
    {
        $dados = $this->store->get();
        return $dados;
    }
    //*********************************************************** */
    public function store(Request $request)
    {
          $posto = new Postos();
          $posto->cidades_id = $request->input('cidades_id');
          $posto->reservatorio = $request->input('reservatorio');
          $posto->latitude = $request->input('latitude');
          $posto->longitude = $request->input('longitude');
          if($posto->save()){
              return $posto;
          }
    }
    //*********************************************************** */
    public function show($id)
    {
        $posto = $this->store->findOrFail($id);
        $dados = [
            "id"=>$posto->id,
            "reservatorio" => $posto->reservatorio,
            "coords" => [
                "latitude" => $posto->latitude,
                "longitude" => $posto->longitude,
            ],
            "created_at"=>$posto->created_at,
            "updated_at"=>$posto->updated_at
            
        ];
        return json_encode($dados,JSON_FORCE_OBJECT);
    }
    //*********************************************************** */
    public function update(Request $request, $id)
    {
        $posto = $this->store->findOrFail($id);
        $posto->cidades_id = $request->input('cidades_id');
        $posto->reservatorio = $request->input('reservatorio');
        $posto->latitude = $request->input('latitude');
        $posto->longitude = $request->input('longitude');
        if($posto->save()){
            return $posto;
        }
    }
    //*********************************************************** */
    public function destroy($id)
    {
        $posto = $this->store->findOrFail($id);
        if($posto->delete()){
            return $posto;
        }
    }
}
