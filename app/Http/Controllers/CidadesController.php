<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CidadesRequest;
use App\Models\Cidade;
use Session;

class CidadesController extends Controller
{
    public function index() {
    	$cidades = Cidade::all();
    	return view('cidades.index', compact('cidades'));
    }

    public function add() {
    	return view('cidades.add');
    }

    public function store(CidadesRequest $request) {
    	$dados = $request->all();

        // Função para não deixar preencher uma latitude ou longitude apenas com zeros. Ex: 000.0000
        // Esta função fica localizada no arquivo Helpers/functions.php
        if(!validateCoords($dados['latitude'])) {
            Session::flash('error', 'Latitude inválida.');
            return redirect('/cidades/novo')->withInput();
        }

        // Função para não deixar preencher uma latitude ou longitude apenas com zeros. Ex: 000.0000
        // Esta função fica localizada no arquivo Helpers/functions.php
        if(!validateCoords($dados['longitude'])) {
            Session::flash('error', 'Longitude inválida.');
            return redirect('/cidades/novo')->withInput();
        }

    	$cidade = new Cidade($dados);

    	if($cidade->save()) {
    		Session::flash('success', 'Cidade cadastrada com sucesso.');
    		return redirect('/cidades');
    	}
    	else {
    		Session::flash('error', 'Problemas ao cadastrar cidade. Tente novamente.');
    		return redirect('/cidades/novo')->withInput();
    	}
    }

    public function edit($id) {
    	$cidade = Cidade::find($id);
    	return view('cidades.edit', compact('cidade'));
    }

    public function update(CidadesRequest $request, $id) {
    	$dados = $request->all();

        // Função para não deixar preencher uma latitude ou longitude apenas com zeros. Ex: 000.0000
        // Esta função fica localizada no arquivo Helpers/functions.php
        if(!validateCoords($dados['latitude'])) {
            Session::flash('error', 'Latitude inválida.');
            return redirect('/cidades/editar/' . $id)->withInput();
        }

        // Função para não deixar preencher uma latitude ou longitude apenas com zeros. Ex: 000.0000
        // Esta função fica localizada no arquivo Helpers/functions.php
        if(!validateCoords($dados['longitude'])) {
            Session::flash('error', 'Longitude inválida.');
            return redirect('/cidades/editar/' . $id)->withInput();
        }

    	$cidade = Cidade::find($id);

    	if($cidade->update($dados)) {
    		Session::flash('success', 'Cidade atualizada com sucesso.');
            return redirect('/cidades/editar/' . $id);
    	}
    	else {
    		Session::flash('error', 'Problemas ao atualizar cidade. Tente novamente.');
            return redirect('/cidades/editar/' . $id)->withInput();
    	}
    }

    public function delete($id) {
        $cidade = Cidade::find($id);

        if($cidade->delete()) {
            Session::flash('success', 'Cidade excluída com sucesso.');
        }
        else {
            Session::flash('error', 'Problemas ao excluir cidade. Tente novamente.');
        }

        return redirect('/cidades');
    }
}