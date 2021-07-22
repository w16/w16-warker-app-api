<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCidadeRequest;
use App\Http\Requests\UpdateCidadeRequest;
use App\Http\Services\CidadeService;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    protected $service;

    public function __construct(CidadeService $service)
    {
        $this->service = $service;
    }

    /**
     * Pegar todos os registros de cidade
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response($this->service->getAll());
    }

    /**
     * Atualizar um registro de cidade por id
     *
     * @param  \App\Http\Requests\CreateCidadeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCidadeRequest $request)
    {
        return response($this->service->create($request->validated()), 201);
    }

    /**
     * Pegar um registro de cidade por id 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response($this->service->get($id));
    }

    /**
     * Atualizar um registro de cidade por id
     *
     * @param  \App\Http\Requests\UpdateCidadeRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCidadeRequest $request, $id)
    {
        return response($this->service->update($id, $request->validated()));
    }

    /**
     * Remover um registro de cidade por id
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response($this->service->delete($id), 204);
    }
}
