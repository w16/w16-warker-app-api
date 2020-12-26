<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cidade;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Cidade as JsonCidade;
use App\Http\Resources\CidadeCollection;

class CidadeController extends Controller
{
    public function index(Request $request) {
        if(!$request->lat && !$request->lng) {
            return new CidadeCollection(Cidade::paginate(25));
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

        return new CidadeCollection(Cidade::
            whereBetween('latitude', [$minLat, $maxLat])->
            whereBetween('longitude', [$minLng, $maxLng])
            ->get());
    }

    public function show($id) {
        return new JsonCidade(Cidade::findOrFail($id));
    }

    public function create(Request $request) {
        $request->validate([
            'nome'=> 'required|string|min:2',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
        ]);

        $data = [
            'nome_da_cidade' => $request->nome,
            'latitude' => $request->lat,
            'longitude' => $request->lng
        ];

        return response(new JsonCidade(Cidade::create($data)), 201);
    }

    public function destroy($id) {
        return new JsonCidade(Cidade::destroy($id));
    }

    public function update(Request $request) {
        Validator::make($request->all(), [
            'id' => 'required|numeric',
            'nome' => 'string',
            'lat' => 'numeric',
            'lng' => 'numeric',
        ]);

        $cidade = Cidade::findOrFail($request->id);

        if($request->nome) $cidade->nome_da_cidade = $request->nome;
        if($request->lat) $cidade->latitude = $request->lat;
        if($request->lng) $cidade->longitude = $request->lng;

        $cidade->save();

        return new JsonCidade($cidade);
    }
}
