@extends('layouts.main')

@section('title', 'Warker App')


<div id="events-container" class="col-md-12">
    <h1>Postos</h1>
    <p class="subtitle">Veja abaixo todos os postos cadastrados</p>
    <div id="cards-container" class="row w-100">
        @foreach($postos as $posto)
        <div class="card col-md-3">
            <div class="card-header">
                <h4 class="pt-2">Posto sem nome</h4>
            </div>
        

            <div class="card-body">

                <h5 class="card-title">Capacidade: </h5>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: {{ $posto->reservatorio}}%">
                        {{ $posto->reservatorio}}%
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <h6 class="card-title mb-0">Latitude: {{ $posto->latitude}} </h6>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col">
                        <h6 class="card-title">Longitude:  {{ $posto->longitude}} </h6>
                    </div>
                </div>



                    <a href="#" class="btn btn-primary">Saber mais</a>


            </div>
        </div>
        @endforeach

    </div>
</div>