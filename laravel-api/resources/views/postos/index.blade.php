@extends('master.master')

@section('title')
    Todos os Postos
@endsection

@section('content')
    @isset($gasStations)
        <div class="container">
            <h2>Todas as Cidades</h2>
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome do Posto</th>
                            <th scope="col">ID da Cidade</th>
                            <th scope="col">Nivel do Reservatorio</th>
                            <th scope="col">Coordernadas</th>
                            <th scope="col">Atualiada em</th>
                            <th scope="col">Criada em</th>
                            <th scope="col">Alterar</th>
                            <th scope="col">Deletar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gasStations as $station)
                            <tr>
                                <th scope="row">{{ $station->id }}</th>
                                <td>{{ $station->nome_do_posto }}</td>
                                <td>{{ $station->cidade_id }}</td>
                                <td>{{ $station->reservatorio }}%</td>
                                <td>{{ $station->latitude }}, {{ $station->longitude }}</td>
                                <td>{{ date('d/m/Y H:i:s', strtotime($station->created_at)) }}</td>
                                <td>{{ date('d/m/Y H:i:s', strtotime($station->updated_at)) }}</td>
                                <td>
                                    <a href="{{ url('/postos/alterar', $station->id) }}" class="btn btn-info">Alterar</a>
                                </td>
                                <td>
                                    <form action="{{ urL("/postos/deletar/{$station->id}") }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"
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