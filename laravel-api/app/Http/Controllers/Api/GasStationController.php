<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GasStation;
use App\Http\Requests\GasStationRequest;

class GasStationController extends Controller
{

    private $gasStation;

    public function __construct(GasStation $gasStation)
    {
        $this->gasStation = $gasStation;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->gasStation->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\GasStationRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(GasStationRequest $request)
    {
        //Recebe os dados de validação na classe App\Http\Requests\GasStationRequest
        //Caso ocorra erros, receberá um throw da classe HttpResponseException
        //Validação de Latitude: Precisa estar entre -90 e 90 graus
        //Validação de Longitude: Precisa estar entre -180 e 180 graus
        return $this->gasStation->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gasStation = $this->gasStation->find($id);

        if (empty($gasStation)) {
            return status_and_message('Posto não encontrado', 404);
        }

        $response = [
            'id' => $gasStation->id,
            'reservatorio' => $gasStation->reservatorio,
            'coords' => [
                'latitude' => $gasStation->latitude,
                'longitude' => $gasStation->longitude
            ],
            'updated_at' => $gasStation->updated_at,
            'created_at' => $gasStation->created_at
        ];

        return $response;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\GasStationRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GasStationRequest $request, $id)
    {
        $gasStation = $this->gasStation->find($id);

        if (empty($gasStation)) {
            return status_and_message('Posto não encontrado', 404);
        }

        $gasStation->fill($request->all())->save();

        $gasStation->refresh();

        return $gasStation;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gasStation = $this->gasStation->find($id);

        if (empty($gasStation)) {
            return status_and_message('Posto não encontrado', 404);
        }

        $gasStation->delete();

        return status_and_message('Posto deletado com sucesso', 404);
    }
}
