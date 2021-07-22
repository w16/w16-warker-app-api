<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostoRequest;
use App\Http\Requests\UpdatePostoRequest;
use App\Http\Services\PostoService;
use Illuminate\Http\Request;

class PostoController extends Controller
{
    protected $service;

    public function __construct(PostoService $service)
    {
        $this->service = $service;
    }

    /**
     * Pegar todos os registros de posto
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response($this->service->getAll());
    }

    /**
     * Criar um novo registro de posto
     *
     * @param  \App\Http\Requests\CreatePostoRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostoRequest $request)
    {
        return response($this->service->create($request->validated()), 201);
    }

    /**
     * Pegar um registro de posto por id
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response($this->service->get($id));
    }

    /**
     * Atualizar um registro de posto por id
     *
     * @param  \App\Http\Requests\UpdatePostoRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostoRequest $request, $id)
    {
        return response($this->service->update($id, $request->validated()));
    }

    /**
     * Remover um registro de posto por id
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response($this->service->delete($id), 204);
    }
}
