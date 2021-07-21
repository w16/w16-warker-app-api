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
     * @return \App\Http\Resources\Entity
     */
    public function index()
    {
        return $this->service->getAll();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreatePostoRequest $request
     * @return \App\Http\Resources\Entity
     */
    public function store(CreatePostoRequest $request)
    {
        return $this->service->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \App\Http\Resources\Entity
     */
    public function show($id)
    {
        return $this->service->get($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostoRequest $request
     * @param  int  $id
     * @return \App\Http\Resources\Entity
     */
    public function update(UpdatePostoRequest $request, $id)
    {
        return $this->service->update($id, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \App\Http\Resources\Entity
     */
    public function destroy($id)
    {
        return $this->destroy->get($id);
    }
}
