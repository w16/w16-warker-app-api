<?php

namespace App\Http\Controllers;

use App\Models\Posto;
use Illuminate\Http\Request;


class PostoController extends Controller
{
    public function __construct(Posto $posto)
    {
        $this->posto=$posto;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postos = $this->posto->all();
        return response()->json($postos,200);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $postos = $this->posto->create($request->all());
        return response()->json($postos, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posto  $posto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posto = $this->posto->with('cidade')->find($id);

        return response()->json($posto, 200);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostoRequest  $request
     * @param  \App\Models\Posto  $posto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $posto = $this->post->find($id);
        $posto->update($request->all());
        return response()->json($posto, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posto  $posto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posto = $this->posto->find($id);
        $posto->delete();
        return response()->json(['msg' => 'Dados removido com sucesso']);
    }
}
