<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{


    public function index()
    {
        $data = City::prepareCityListEndpoint(City::all());

        $response = [
            'message' => 'Login realizado',
            'data' => $data
        ];


        return response($response, 200);
    }


    public function store(Request $request)
    {

        //If the validation fails, the proper response is automatically be generated.
        $fields = $request->validate([
            'nome_da_cidade' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        City::create($fields);

        $response = [
            'message' => 'Cidade registrada'
        ];

        return response($response, 201);
    }


    public function show($id)
    {
        try {
            $city = City::prepareCityEndpoint(City::findOrFail($id));
            return response()->json($city, 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $th) {
            return response("", 204);
        } catch (\Throwable $th) {
            return response("Erro Interno", 500);
        }
    }

    public function edit(Request $request, $id)
    {
        //If the validation fails, the proper response is automatically be generated.
        $fields = $request->validate([
            'nome_da_cidade' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);
        try {
            City::findOrFail($id)->update($fields);

            $response = [
                'message' => 'Cidade atualizada',
            ];

            return response($response, 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $th) {
            return response("O elemento que você procura atualizar não existe", 204);
        } catch (\Throwable $th) {
            return response("Erro Interno", 500);
        }
    }


    public function destroy($id)
    {
        try {
            City::findOrFail($id)->delete();

            $response = [
                'message' => 'Cidade deletada com sucesso',
            ];

            return response($response, 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $th) {
            return response("", 204);
        } catch (\Throwable $th) {
            return response("Erro Interno", 500);
        }
    }
}
