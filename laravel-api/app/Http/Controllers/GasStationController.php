<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GasStation;
use App\Models\City;
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
        $allGasStations = $this->gasStation->get();

        return view('postos.index', [
            'gasStations' => $allGasStations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $cities = City::all();

        return view('postos.cadastro', [
            'cities' => $cities
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GasStationRequest $request)
    {
        $this->gasStation->create($request->all());

        return redirect(url('postos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gasStation = $this->gasStation->find($id);
        $cities = City::all();

        return view('postos.alterar', [
            'gasStation' => $gasStation,
            'cities' => $cities
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GasStationRequest $request, $id)
    {
        $this->gasStation->find($id)->fill($request->all())->save();

        return redirect(url('postos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->gasStation->find($id)->delete();

        return redirect(url('postos'));
    }
}
