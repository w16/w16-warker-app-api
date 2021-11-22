<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cidade as Cidade;
use App\Http\Resources\CidadeResource as CidadeResource;

class CidadeController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $cidade= Cidade::findOrFail( $id );
        $main['id'] = $cidade->id;
        $main['cidade'] = $cidade->nome;
        $main['cords']['latitude']= $cidade->latitude;
        $main['cords']['longitude']= $cidade->longitude;
        // postos da cidade
        $sql = 'Select * from postos where cidade_id = '.$id.'';
        $postos = \DB::select($sql);
        // armazena cada posto
        $data2= array();
        foreach($postos as $p){
            $main2['id'] = $p->id;
            $main2['reservatorio'] = $p->reservatorio;
            $main2['cords']['latitude']= $p->latitude;
            $main2['cords']['longitude']= $p->longitude;
            array_push($data2,$main2);
        }
        $main['postos']= $data2;
        $main['update_at']= $cidade->update_at;
        $main['create_at']= $cidade->create_at;
        $data= $main;
        return response()->json($data);
    }
    public function list(){
        $cidades= Cidade::get();
        return CidadeResource::collection($cidades);
    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cidade = new Cidade;
        $cidade->nome = $request->input('nome');

        $cidade->latitude = $request->input('latitude');
        $cidade->longitude = $request->input('longitude');



        if( $cidade->save() ){
        return new CidadeResource( $cidade);
    }
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
        $cidade = Cidade::findOrFail( $request->id );

        $cidade->nome = $request->input('nome');
        $cidade->latitude = $request->input('latitude');
        $cidade->longitude = $request->input('longitude');

    
        if( $cidade->save() ){
          return new CidadeResource( $cidade);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cidade= Cidade::findOrFail( $id );
        if( $cidade->delete() ){
          return new CidadeResource( $cidade);
        }
    }
}
