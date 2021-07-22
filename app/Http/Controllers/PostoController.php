<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostoRequest;
use App\Http\Requests\UpdatePostoRequest;
use App\Http\Services\PostoService;
use App\Models\Posto;
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
        $postos = $this->service->getAll();

        return view('postos.index', compact('postos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('postos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreatePostoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostoRequest $request)
    {
        $this->service->create($request->validated());

        return redirect()->route('postos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posto $posto
     * @return \Illuminate\Http\Response
     */
    public function show(Posto $posto)
    {
        $posto = $this->service->get($posto->id);

        return view('postos.show', compact('posto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posto $posto
     * @return \Illuminate\Http\Response
     */
    public function edit(Posto $posto)
    {
        $posto = $this->service->get($posto->id);
        
        return view('postos.edit', compact('posto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostoRequest $request
     * @param  \App\Models\Posto $posto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostoRequest $request, Posto $posto)
    {
        $this->service->update($posto->id, $request->validated());

        return redirect()->route('postos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posto $posto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posto $posto)
    {
        $this->service->delete($posto->id);

        return redirect()->route('postos.index');
    }
}
