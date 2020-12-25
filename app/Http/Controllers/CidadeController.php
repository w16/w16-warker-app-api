<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cidade;
use Illuminate\Support\Facades\Validator;

class CidadeController extends Controller
{
    public function index(Request $request) {
        if(!$request->lat && !$request->lng) {
            return Posto::paginate(25);
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

        $minLat = $lat-$range;
        $maxLat = $lat+$range;

        $minLng = $lng-$range;
        $maxLng = $lng+$range;

        return Cidade::
            whereBetween('latitude', [$minLat, $maxLat])->
            whereBetween('longitude', [$minLng, $maxLng])
            ->get();
    }

    public function show($id) {
        return Cidade::findOrFail($id);
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

        return response(Cidade::create($data), 201);
    }

    public function destroy($id) {
        return Cidade::destroy($id);
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

        return $cidade;
    }
}
