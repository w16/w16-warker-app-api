@extends('templates.template')

@section('content')

    <h1 class="text-center title">@if (isset($cidade)) EDITAR @else CADASTRAR @endif CIDADE</h1>
    <div class="col-4 m-auto mt-5">
        @if (isset($cidade))
            <form name="formEditCidade" id="formCidade" action="{{url("cidade/$cidade->id/edit") }}" method="POST">
                @method('PUT')
        @else
            <form name="formCadCidade" id="formCidade" action="{{ route('save_cidade')}}" method="POST">
        @endif
            @csrf
            <div class="form-group">
            <label for="nomeCidade">Nome da Cidade</label>
            <input type="text" class="form-control" name="nome_da_cidade" id="nome_da_cidade" value="{{$cidade->nome_da_cidade ?? ''}}" required>
            </div>
            <div class="form-group">
                <div class="form-row">
                    <label for="latitude">Latitude</label>
                    <input type="text" class="form-control" name="latitude" id="latitude" value="{{$cidade->latitude ?? ''}}" required>
                    <label for="longitude">Longitude</label>
                    <input type="text" class="form-control" name="longitude" id="longitude" value="{{$cidade->longitude ?? ''}}" required>
                </div>    
            </div>
            @if (isset($cidade))
                @if(count($cidade->postos) > 0)
                <div class="mt-5">
                    <h4 class="border-bottom">POSTOS</h4>
                    <table class="table table-hover table-dark mt-3">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Reservatório</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Excluir</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($cidade->postos as $posto)
                        <tr>
                            <th scope="row">{{$posto->id}}</th>
                            <td>{{$posto->reservatorio}} %</td>
                            <td>
                            <a href="/posto/{{$posto->id}}/edit" title="editar"><i class="fas fa-edit"></i></a>
                            </td>
                            <td>
                            <a href="/posto/{{$posto->id}}/del" title="excluir" style="color:red" class="ml-5 js-del"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            @endif
            <div class="mt-5 row">
                @if(isset($cidade))
                    <div class="col-6">
                        <a href="/posto/{{$cidade->id}}/create" class="btn btn-secondary mb-2" id="cadPosto">Add Posto</a>
                    </div>
                @endif
                <div class="col-6">
                    <button type="submit" class="btn btn-success">
                        @if (isset($cidade)) Salvar Alterações @else Cadastrar @endif
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection