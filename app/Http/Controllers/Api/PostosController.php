<?php

namespace App\Http\Controllers\Api;


use App\Http\Resources\PostosResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Postos;


class PostosController extends Controller
{   
<<<<<<< HEAD
    // funtion que retorna todas os postos listadas no banco limitadas a 10 postos por paginas 
=======
>>>>>>> 7df13676d3301599c243953c486f645680a2f21a
    public function index()
    {
        $posto = Postos::paginate(10);
        return PostosResource::collection($posto); 
    }

<<<<<<< HEAD
    // campos necessarios preencher para que consiga inserir dados
=======
>>>>>>> 7df13676d3301599c243953c486f645680a2f21a
    public function store(Request $request)
    {
        $posto = new Postos();
        $posto->cidade_id = $request->cidade_id;
        $posto->reservatorio = $request->reservatorio;
        $posto->latitude = $request->latitude;
        $posto->longitude = $request->longitude;

        if($posto->save())
        {
            return new PostosResource($posto);
        }
    }

<<<<<<< HEAD
    // function para filtrar por cada posto
=======
>>>>>>> 7df13676d3301599c243953c486f645680a2f21a
    public function show($id)
    {   
        $posto = Postos::findOrFail($id);
        return new PostosResource($posto);
    }

<<<<<<< HEAD
    // campos que serão necessários preencher para realizar o update
=======
>>>>>>> 7df13676d3301599c243953c486f645680a2f21a
    public function update(Request $request, $id)
    {   
        $posto = Postos::findOrFail($id);
        $posto->reservatorio = $request->reservatorio;
        $posto->latitude = $request->latitude;
        $posto->longitude = $request->longitude;

        if($posto->save())
        {
            return new PostosResource($posto);
        }
    }

<<<<<<< HEAD
    // function para deleta dados
=======
>>>>>>> 7df13676d3301599c243953c486f645680a2f21a
    public function destroy($id)
    {
        $posto = Postos::findOrFail($id);
        if($posto->delete())
        {
            return new PostosResource($posto);
        }
    }
}
