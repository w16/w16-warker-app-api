<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostosRequest;
use App\Models\Cidade;
use App\Models\Posto;
use Session;

class PostosController extends Controller
{
    public function index() {
    	$postos = Posto::getPostos();
    	return view('postos.index', compact('postos'));
    }

    public function add() {
    	$cidades = Cidade::all();
    	return view('postos.add', compact('cidades'));
    }

    public function store(PostosRequest $request) {
    	$dados = $request->all();

        // Função para não deixar preencher uma latitude ou longitude apenas com zeros. Ex: 000.0000
        // Esta função fica localizada no arquivo Helpers/functions.php
        if(!validateCoords($dados['latitude'])) {
            Session::flash('error', 'Latitude inválida.');
            return redirect('/postos/novo')->withInput();
        }

        // Função para não deixar preencher uma latitude ou longitude apenas com zeros. Ex: 000.0000
        // Esta função fica localizada no arquivo Helpers/functions.php
        if(!validateCoords($dados['longitude'])) {
            Session::flash('error', 'Longitude inválida.');
            return redirect('/postos/novo')->withInput();
        }

    	$posto = new Posto($dados);

    	if($posto->save()) {
    		Session::flash('success', 'Posto cadastrado com sucesso.');
    		return redirect('/postos');
    	}
    	else {
    		Session::flash('error', 'Problemas ao cadastrar posto. Tente novamente.');
    		return redirect('/postos/novo');
    	}
    }

    public function edit($id) {
    	$posto = Posto::find($id);
    	$cidades = Cidade::all();
    	return view('postos.edit', compact('posto', 'cidades'));
    }

    public function update(PostosRequest $request, $id) {
    	$dados = $request->all();

        // Função para não deixar preencher uma latitude ou longitude apenas com zeros. Ex: 000.0000
        // Esta função fica localizada no arquivo Helpers/functions.php
        if(!validateCoords($dados['latitude'])) {
            Session::flash('error', 'Latitude inválida.');
            return redirect('/postos/editar/' . $id)->withInput();
        }

        // Função para não deixar preencher uma latitude ou longitude apenas com zeros. Ex: 000.0000
        // Esta função fica localizada no arquivo Helpers/functions.php
        if(!validateCoords($dados['longitude'])) {
            Session::flash('error', 'Longitude inválida.');
            return redirect('/postos/editar/' . $id)->withInput();
        }

    	$posto = Posto::find($id);

    	if($posto->update($dados)) {
    		Session::flash('success', 'Posto atualizado com sucesso.');
            return redirect('/postos/editar/' . $id);
    	}
    	else {
    		Session::flash('error', 'Problemas ao atualizar posto. Tente novamente.');
            return redirect('/postos/editar/' . $id)->withInput();
    	}
    }

    public function delete($id) {
        $posto = Posto::find($id);

        if($posto->delete()) {
            Session::flash('success', 'Posto excluído com sucesso.');
        }
        else {
            Session::flash('error', 'Problemas ao excluir posto. Tente novamente.');
        }

        return redirect('/postos');
    }
}