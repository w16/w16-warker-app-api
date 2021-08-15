<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**retorna todos os usuários */
        return new UserResource(User::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        /**percorre os indices do array de valores passados na request, armazenado o valor de cada indice na referido propriedade do modelo/objeto user*/
        foreach(array_keys($request->all()) as $index){
            if($index != 'password'){
                $user->$index = $request->input($index);
            }else{
                /** se houver um indice denominado "password" seu valor é cripografado para ser armazenado no banco*/
                $user->$index = Hash::make($request->input($index));
            }
        }
        if($user->save()){
            return new UserResource($user);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            return new UserResource(User::findOrFail($id));
        } catch (Exception) {
            return response()->json('Não encontrado', 404);
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
        DB::beginTransaction();
        try {
            $user = User::findOrFail($id);
            foreach(array_keys($request->all()) as $index){
                $user->$index = $request->input($index);
            }
    
            if($user->save()){
                DB::commit();
                return new UserResource($user);
            }
            
        } catch (Exception $ex) {
            DB::rollBack();
            return response()->json($ex->getMessage(), 502);
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
        DB::beginTransaction();
        try {
            $user = User::findOrFail($id);
            if($user->delete()){
                DB::commit();
                return new UserResource($user);
            }
        } catch (Exception $ex) {
            DB::rollBack();
            return response()->json($ex->getMessage(), 502);
        }
    }
}
