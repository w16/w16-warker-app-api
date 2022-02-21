@extends('master.master')

@section('title')
    Todas as Cidades
@endsection

@section('content')
    @isset($cities)

        <div class="container">
            <h2>Todas as Cidades</h2>
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome da Cidade</th>
                            <th scope="col">Coordenadas</th>
                            <th scope="col">Criada em</th>
                            <th scope="col">Atualiada em</th>
                            <th scope="col">Ver Postos</th>
                            <th scope="col">Alterar</th>
                            <th scope="col">Deletar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cities as $city)
                            <tr>
                                <th scope="row">{{ $city->id }}</th>
                                <td>{{ $city->nome_da_cidade }}</td>
                                <td>{{ $city->latitude }}, {{ $city->longitude }}</td>
                                <td>{{ date('d/m/Y H:i:s', strtotime($city->created_at)) }}</td>
                                <td>{{ date('d/m/Y H:i:s', strtotime($city->updated_at)) }}</td>
                                <td>
                                    <a href="{{ url("/cidades/{$city->id}/postos") }}" class="btn btn-primary">Ver Postos</a>
                                </td>
                                <td>
                                    <a href="{{ url('/cidades/alterar', $city->id) }}" class="btn btn-info">Alterar</a>
                                </td>
                                <td>
                                    <form action="{{ urL("/cidades/deletar/{$city->id}") }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button href="{{ url('/cidades/deletar', $city->id) }}" class="btn btn-danger"
                                            onclick="return confirm('Deseja mesmo deletar esse registro?');">
                                            Deletar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
        
    @endisset
@endsection