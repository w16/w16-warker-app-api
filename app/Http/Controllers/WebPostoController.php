<?php

namespace App\Http\Controllers;

use App\Models\Posto;
use Illuminate\Http\Request;

class WebPostoController extends Controller
{

    public function index()
    {
        $postos = Posto::all();

        return view('postos', compact('postos'));
    }

    public function show($id)
    {
        $postos = Posto::where('cidade_id', $id)->get(); // busca os dados dos postos de uma cidade específica

        return view('postos', compact('postos'));   /*  retorna a view passando a váriavel postos, 
        que contém um array com os dados de cada posto encontrado   */
    }

    public function store(Request $request)
    {

        Posto::create($request->all());

        //redireciona para o cadastro da cidade ao qual o posto pertence
        return redirect("/cidade/$request->cidade_id/edit");
    }

    public function create($cidade_id)
    {
        //retorna a view cadPosto, informando o id da cidade ao qual o posto irá pertencer
        return view('cadPosto', compact('cidade_id'));
    }

    public function destroy($id)
    {
        $del = Posto::destroy($id);
        return ($del) ? "sim" : "não"; // retorna se o valor foi deletado ou não
    }

    public function edit($id)
    {
        $posto = Posto::findOrFail($id);

        return view('cadPosto', compact('posto'));
    }

    public function update(Request $request, $id)
    {
        $posto = Posto::findOrFail($id);
        $posto->update($request->all());

        return redirect("/cidade/$request->cidade_id/edit");
    }
}
