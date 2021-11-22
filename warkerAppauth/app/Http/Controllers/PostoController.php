<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posto as Posto;
use App\Http\Resources\PostoResource as PostoResource;
class PostoController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $posto= Posto::findOrFail( $id );
        $main['id'] = $posto->id;
        $main['reservatorio'] = $posto->reservatorio;
        $main['cords']['latitude']= $posto->latitude;
        $main['cords']['longitude']= $posto->longitude;
        $main['update_at']= $posto->update_at;
        $main['create_at']= $posto->create_at;
        $data= $main;
        return response()->json($data);
    }

    public function list(){
        $postos= Posto::get();
        return PostoResource::collection($postos);
    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $posto = new Posto;
        $posto->cidade_id = $request->input('cidade_id');

        $posto->reservatorio = $request->input('reservatorio');
        $posto->latitude = $request->input('latitude');
        $posto->longitude= $request->input('longitude');



        if( $posto->save() ){
        return new PostoResource( $posto);
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
        $posto = Posto::findOrFail( $request->id );
        $posto->cidade_id = $request->input('cidade_id');
        $posto->reservatorio = $request->input('reservatorio');
        $posto->latitude = $request->input('latitude');
        $posto->longitude = $request->input('longitude');

    
        if( $posto->save() ){
          return new PostoResource( $posto);
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
        $posto = Posto::findOrFail( $id );
        if( $posto->delete() ){
          return new PostoResource( $posto);
        }
    }
}
