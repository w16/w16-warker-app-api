<?php

namespace App\Http\Controllers;

use App\Models\GasStation;
use Illuminate\Http\Request;

class GasStationController extends Controller
{

    public function index()
    {
        $allGasStations = GasStation::prepareGasStationListEndpoint(GasStation::all());
        return response()->json($allGasStations, 200);
    }


    public function store(Request $request)
    {
        //If the validation fails, the proper response is automatically be generated.
        $fields = $request->validate([
            'reservatorio' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'cidade_id' => 'required',
        ]);

        $response = [
            'message' => 'Posto registrado'
        ];

        GasStation::create($fields);
        return response($response, 201);
    }


    public function show($id)
    {
        try {
            $gasStation = GasStation::prepareGasStationEndpoint(GasStation::findOrFail($id));
            return response()->json($gasStation, 200);
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
            'reservatorio' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'cidade_id' => 'required',
        ]);

        try {
            GasStation::findOrFail($id)->update($fields);

            $response = [
                'message' => 'Posto Atualizado'
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
            GasStation::findOrFail($id)->delete();

            $response = [
                'message' => 'Posto deletado com sucesso'
            ];

            return response($response, 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $th) {
            return response("", 204);
        } catch (\Throwable $th) {
            return response("Erro Interno", 500);
        }
    }
}
