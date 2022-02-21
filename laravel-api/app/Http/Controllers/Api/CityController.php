<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Http\Requests\CityRequest;

class CityController extends Controller
{

    private $city;

    public function __construct(City $city)
    {
        $this->city = $city;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Paginação Opcional
        // Utilizei uma versão mais simples, por não conhecer o padrão de código da empresa
        // Também poderia utilizar uma ternária
        // $cities = (!empty($request->page) ? $this->city->paginate(8) : $this->city->get());

        if (!empty($request->page)) {
            $cities = $this->city->paginate(5);
        } else {
            $cities = $this->city->get();
        }

        return response()->json($cities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        //Recebe os dados de validação na classe App\Http\Requests\CityRequest
        //Caso ocorra erros, receberá um throw da classe HttpResponseException
        //Validação de Latitude: Precisa estar entre -90 e 90 graus
        //Validação de Longitude: Precisa estar entre -180 e 180 graus

        return $this->city->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = $this->city->find($id);

        if (empty($city)) {
            return status_and_message('Cidade não encontrada', 404);
        }

        $response = [
            'id' => $city->id,
            'cidade' => $city->nome_da_cidade,
            'coords' => [
                'latitude' => $city->latitude,
                'longitude' => $city->longitude
            ],
        ];

        $gasStationsOfCity = $city->gasStations()->get();

        if (!empty($gasStationsOfCity)) {

            foreach ($gasStationsOfCity as $gasStation) {
                $gasStationColletion[] = [
                    'id' => $gasStation->id,
                    'reservatorio' => $gasStation->reservatorio,
                    'coords' => [
                        'latitude' => $gasStation->latitude,
                        'longitude' => $gasStation->longitude
                    ],
                    'updated_at' => $gasStation->updated_at,
                    'created_at' => $gasStation->created_at
                ];             
            }

            $response["postos"] = $gasStationColletion;
        }

        return $response;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\GasStationRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, int $id)
    {
        $city = $this->city->find($id);

        if (empty($city)) {
            return status_and_message('Cidade não encontrada', 404);
        }

        $city->fill($request->all())->save();
        $city->refresh();

        return $city;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = $this->city->find($id);

        if (empty($city)) {
            return status_and_message('Cidade não encontrada', 404);
        }

        $city->delete();

        return status_and_message('Cidade deletada com sucesso', 404);
    }

}
