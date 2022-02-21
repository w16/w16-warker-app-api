@extends('master.master')

@section('title')
    Todas as Cidades
@endsection

@section('content')
    @isset($city)
        <div class="container">
            
            <div class="row">
                <div class="col-12 col-lg-10 offset-lg-1">
                    <h2>Alterar Cidade</h2>
                    <form action="{{url("cidades/alterar/{$city->id}")}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nome da Cidade</label>
                            <input type="text" class="form-control" placeholder="Nome da Cidade" name="nome_da_cidade"
                            value={{$city->nome_da_cidade}}>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12 col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Latitude</label>
                                    <input type="text" class="form-control" placeholder="Latitude" name="latitude"
                                    value={{$city->latitude}}>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Longitude</label>
                                    <input type="text" class="form-control" placeholder="Longitude" name="longitude"
                                    value={{$city->longitude}}>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Alterar Cidade</button>
                    </form>
                </div>
            </div>
        </div>
    @endisset
@endsection
