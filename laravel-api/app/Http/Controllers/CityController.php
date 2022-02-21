<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Http\Requests\CityRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

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
    public function index()
    {

        $cities = $this->city->all();

        return view('cidades.index', [
            'cities' => $cities
        ]);
    }

    public function getAllGasStations($id)
    {
        $allGasStations = $this->city->find($id)->gasStations()->get();

        return view('cidades.postos', [
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
        return view('cidades.cadastro');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        $city = $this->city->create($request->all());

        return redirect(url('/cidades'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $city = $this->city->find($id);

        return view('cidades.alterar', [
            'city' => $city
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, $id)
    {
        $city = $this->city->find($id)->fill($request->all())->save();

        return redirect(url('/cidades'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = $this->city->find($id)->delete();

        return redirect(url('/cidades'));
    }
}
