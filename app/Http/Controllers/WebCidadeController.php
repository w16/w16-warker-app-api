<?php

namespace App\Http\Controllers;

use App\Models\{Cidade, Posto};
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class WebCidadeController extends Controller
{

    public function index()
    {
        $cidades = Cidade::all();

        foreach ($cidades as $key => $value) {
            //busca a quantidade de postos na cidade
            $qtdPostos = Posto::where('cidade_id', $value->id)->count();

            //seta a quantidade de postos de cada cidade no array $cidades
            Arr::set($cidades[$key], 'postos', $qtdPostos);
        }

        return view('index', compact('cidades'));
    }

    public function store(Request $request)
    {

        Cidade::create($request->all());

        return redirect()->route('cidades');
    }

    public function create()
    {
        return view('cadCidade');
    }

    public function destroy($id)
    {
        $del = Cidade::destroy($id);
        return ($del) ? "sim" : "não";
    }

    public function edit($id)
    {
        $cidade = Cidade::findOrFail($id);

        //busca os postos relacionados a cidade
        $postos = Posto::where('cidade_id', $cidade->id)->get();

        //seta os dados dos postos relacionado a cidade
        Arr::set($cidade, 'postos', $postos);

        return view('cadCidade', compact('cidade'));
    }

    public function update(Request $request, $id)
    {
        $cidade = Cidade::findOrFail($id);
        $cidade->update($request->all());

        return redirect()->route('cidades');
    }
}
