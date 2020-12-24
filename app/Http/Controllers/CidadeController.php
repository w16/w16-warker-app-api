<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cidade;
use Illuminate\Support\Facades\Validator;

class CidadeController extends Controller
{
    public function index() {
        return Cidade::paginate(25);
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

        return Cidade::create($request->all());
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
