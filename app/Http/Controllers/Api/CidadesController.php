<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CidadesResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cidades;

class CidadesController extends Controller
{
<<<<<<< HEAD
    // funtion que retorna todas as ciadades listadas no banco limitadas a 10 cidades por paginas 
=======

>>>>>>> 7df13676d3301599c243953c486f645680a2f21a
    public function index()
    {
        $cidade = Cidades::paginate(10);
        return CidadesResource::collection($cidade); 
    }

<<<<<<< HEAD
    // campos necessarios preencher para que consiga inserir dados
=======
>>>>>>> 7df13676d3301599c243953c486f645680a2f21a
    public function store(Request $request)
    {
        $cidade = new Cidades();
        $cidade->nome_da_cidade = $request->nome_da_cidade;
        $cidade->latitude = $request->latitude;
        $cidade->longitude = $request->longitude;

        if($cidade->save())
        {
            return new CidadesResource($cidade);
        }
    }
<<<<<<< HEAD
    // function para filtrar por cada cidade
=======

>>>>>>> 7df13676d3301599c243953c486f645680a2f21a
    public function show($id)
    {
        $cidade = Cidades::findOrFail($id);
        return new CidadesResource($cidade);
    }
<<<<<<< HEAD
    
    // campos que serão necessários preencher para realizar o update
=======

>>>>>>> 7df13676d3301599c243953c486f645680a2f21a
    public function update(Request $request, $id)
    {
        $cidade = Cidades::findOrFail($id);
        $cidade->nome_da_cidade = $request->nome_da_cidade;
        $cidade->latitude = $request->latitude;
        $cidade->longitude = $request->longitude;

        if($cidade->save())
        {
            return new CidadesResource($cidade);
        }
    }

<<<<<<< HEAD
    // function para deleta dados
=======
>>>>>>> 7df13676d3301599c243953c486f645680a2f21a
    public function destroy($id)
    {
        $cidade = Cidades::findOrFail($id);
        if($cidade->delete())
        {
            return new CidadesResource($cidade);
        }
    }
}
