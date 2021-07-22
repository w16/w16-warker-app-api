<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostoRequest;
use App\Http\Requests\UpdatePostoRequest;
use App\Services\PostoService;
use Illuminate\Http\Request;

class PostoController extends Controller
{
    protected $service;

    public function __construct(PostoService $service)
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
     * @param  \App\Http\Requests\CreatePostoRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostoRequest $request)
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
     * @param  \App\Http\Requests\UpdatePostoRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostoRequest $request, $id)
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
