<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostoResource;
use App\Models\Posto;
use Illuminate\Http\Request;

class PostoController extends Controller
{
    public function index()
    {
        // Exibir todos os Postos

        return PostoResource::collection(Posto::all());
    }

    public function store(Request $request)
    {
        // Criar posto e retornar o posto criado

        $posto = Posto::create([
            'cidade_id' => $request->cidade_id,
            'reservatorio' => $request->reservatorio,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);

        return new PostoResource($posto);
    }

    public function show($id)
    {
        // Retornar posto específico pelo id

        $posto = Posto::findOrFail($id);
        return new PostoResource($posto);
    }

    public function update(Request $request, $id)
    {
        // Atualizar posto específico pelo id

        $posto = Posto::findOrFail($id);

        $posto->update([
            'cidade_id' => $request->cidade_id,
            'reservatorio' => $request->reservatorio,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);

        return new PostoResource($posto);
    }

    public function destroy($id)
    {
        // deletar posto específico pelo id

        $posto = Posto::destroy($id);
        return new PostoResource($posto);
    }
}
