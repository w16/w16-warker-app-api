<?php

namespace App\Http\Controllers;

use App\Models\Postos;
use Illuminate\Http\Request;

class PostosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Postos::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $posto = Postos::create([
            'cidade_id' => $request->cidade_id,
            'reservatorio' => $request->reservatorio,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);

        return $posto;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Postos::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $posto = Postos::findOrFail($id);

        $posto->update([
            'cidade_id' => $request->cidade_id,
            'reservatorio' => $request->reservatorio,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);

        return $posto;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Postos::destroy($id);
    }
}
