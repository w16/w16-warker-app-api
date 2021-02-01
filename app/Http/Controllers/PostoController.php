<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posto;
use App\Models\Cidade;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Posto as JsonPosto;
use App\Http\Resources\PostoCollection;

class PostoController extends Controller
{
    use \App\Traits\CalculatesDistance;

    public function index(Request $request) {
        
        if(!$request->lat && !$request->lng) {
            return new PostoCollection(Posto::paginate(25));
        }

        $request->validate([
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'range' => 'numeric|min:0'
        ]);

        $lat = $request->lat;
        $lng = $request->lng;

        //Pegamos o range do parametro
        //ou colocamos o padrão
        $range = $request->range != null ? $request->range : 2;

        //Calculamos range minimo e máximo
        $minLat = $lat-$range;
        $maxLat = $lat+$range;

        $minLng = $lng-$range;
        $maxLng = $lng+$range;

        return new PostoCollection(Posto::
            whereBetween('latitude', [$minLat, $maxLat])->
            whereBetween('longitude', [$minLng, $maxLng])
            ->get());
    }

    public function create(Request $request) {
        $request->validate([
            'cidade_id'=> 'required|numeric|exists:cidades,id',
            'reservatorio' => 'numeric|min:0|max:100',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
        ]);

        //Pegamos a cidade para verificar a distancia
        $cidade = Cidade::find($request->cidade_id);

        //Calculamos para ver se não está muito distante da cidade que pertence
        if($this->simpleDistance(
                $request->lat,
                $cidade->latitude) > 2)
            return response('Fora das fronteiras da cidade.', 422);
            
        if($this->simpleDistance(
                $request->lng,
                $cidade->longitude) > 2)
            return response('Fora das fronteiras da cidade.', 422);

        $data = [
            'cidade_id' => $request->cidade_id,
            'reservatorio' => $request->reservatorio,
            'latitude' => $request->lat,
            'longitude' => $request->lng
        ];

        return response(new JsonPosto(Posto::create($data)), 201);
    }

    public function show($id) {
        return new JsonPosto(Posto::findOrFail($id));
    }

    public function destroy($id) {
        return new JsonPosto(Posto::destroy($id));
    }

    public function update(Request $request) {
        Validator::make($request->all(), [
            'id' => 'required|numeric',
            'nome' => 'string',
            'lat' => 'numeric',
            'lng' => 'numeric',
        ]);

        $posto = Posto::findOrFail($request->id);

        if($request->cidade_id) $posto->cidade_id = $request->cidade_id;
        if($request->lat) $posto->latitude = $request->lat;
        if($request->lng) $posto->longitude = $request->lng;

        $posto->save();

        return new JsonPosto($posto);
    }
}
