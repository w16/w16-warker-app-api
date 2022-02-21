@extends('master.master')

@section('title')
    Todas as Cidades
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1">
                <h2>Cadastro de Cidade</h2>
                <form action="{{url("postos/alterar/{$gasStation->id}")}}" method="POST">
                    @csrf
                    @method ('PUT')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nome do Posto</label>
                        <input type="text" class="form-control" placeholder="Nome do Posto" name="nome_do_posto"
                        value="{{$gasStation->nome_do_posto}}">
                    </div>

                    <div class="row mt-4">
                        <div class="col-12 col-md-6 mb-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Cidade</label>
                                <select name="cidade_id" id="" class="form-select"> --}}
                                    @foreach($cities as $city)
                                        <option value={{$city->id}} {{$city->id === $gasStation->cidade_id ? 'selected' : ''}}>
                                            {{$city->nome_da_cidade}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nível do Reservatório</label>
                                <input type="text" class="form-control" placeholder="Nível do Reservatorio" name="reservatorio"
                                value={{$gasStation->reservatorio}}>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12 col-md-6 mb-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Latitude</label>
                                <input type="text" class="form-control" placeholder="Latitude" name="latitude" 
                                value={{$gasStation->latitude}}>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Longitude</label>
                                <input type="text" class="form-control" placeholder="Longitude" name="longitude"
                                value={{$gasStation->longitude}}>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Alterar Posto</button>
                </form>
            </div>
        </div>
    </div>
@endsection
