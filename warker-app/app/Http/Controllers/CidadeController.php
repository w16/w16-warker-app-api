<?php

namespace App\Http\Controllers;

use App\Http\Resources\CidadeResource;
use App\Models\Cidade;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    public function index()
    {
        // Retornar todas as cidades

        return CidadeResource::collection(Cidade::all());
    }

    public function store(Request $request)
    {
        // criar cidade e retornar cidade criada

        $cidade = Cidade::create([
            'nome_da_cidade' => $request->nome_da_cidade,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);

        return new CidadeResource($cidade);
    }

    public function show($id)
    {
        // retornar cidade específica pelo id

        $cidade = Cidade::findOrFail($id);
        return new CidadeResource($cidade);
    }

    public function update(Request $request, $id)
    {
        // Atualizar cidade específica pelo id

        $cidade = Cidade::findOrFail($id);

        $cidade->update([
            'nome_da_cidade' => $request->nome_da_cidade,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);

        return new CidadeResource($cidade);
    }

    public function destroy($id)
    {
        // Remover cidade específica pelo id

        $cidade = Cidade::destroy($id);
        return new CidadeResource($cidade);
    }
}
