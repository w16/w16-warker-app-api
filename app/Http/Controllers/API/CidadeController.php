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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response($this->service->getAll());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateCidadeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCidadeRequest $request)
    {
        return response($this->service->create($request->all()), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response($this->service->get($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCidadeRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCidadeRequest $request, $id)
    {
        return response($this->service->update($id, $request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response($this->service->delete($id), 204);
    }
}
