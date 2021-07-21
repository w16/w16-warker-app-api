<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCidadeRequest;
use App\Http\Requests\UpdateCidadeRequest;
use App\Services\CidadeService;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    protected $service;

    public function __construct(CidadeService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\Cidade
     */
    public function index()
    {
        return $this->service->getAll();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateCidadeRequest  $request
     * @return \App\Http\Resources\Cidade
     */
    public function store(CreateCidadeRequest $request)
    {
        return $this->service->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \App\Http\Resources\Cidade
     */
    public function show($id)
    {
        return $this->service->get($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCidadeRequest  $request
     * @param  int  $id
     * @return \App\Http\Resources\Cidade
     */
    public function update(UpdateCidadeRequest $request, $id)
    {
        return $this->service->update($id, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \App\Http\Resources\Cidade
     */
    public function destroy($id)
    {
        return $this->destroy->get($id);
    }
}
