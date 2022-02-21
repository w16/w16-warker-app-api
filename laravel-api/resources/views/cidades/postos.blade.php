@extends('master.master')

@section('title')
    Todos os Postos da Cidade
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
                            <th scope="col">Reservatorio</th>
                            <th scope="col">Coordenadas</th>
                            <th scope="col">Criada em</th>
                            <th scope="col">Alterar</th>
                            <th scope="col">Deletar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gasStations as $gasStation)
                            <tr>
                                <th scope="row">{{ $gasStation->id }}</th>
                                <td>{{ $gasStation->nome_do_posto }}</td>
                                <td>{{ $gasStation->latitude }}, {{ $gasStation->longitude }}</td>
                                <td>{{ date('d/m/Y H:i:s', strtotime($gasStation->created_at)) }}</td>
                                <td>{{ date('d/m/Y H:i:s', strtotime($gasStation->updated_at)) }}</td>
                                <td>
                                    <a href="{{ url('/postos/alterar', $gasStation->id) }}" class="btn btn-info">Alterar</a>
                                </td>
                                <td>
                                    <a href="{{ url('/postos/deletar', $gasStation->id) }}" class="btn btn-danger">Deletar</a>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
        
    @endisset
@endsection