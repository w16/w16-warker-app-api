@extends('templates.template')

@section('content')
    <h1 class="text-center title">CIDADES</h1>
    <div class="col-8 m-auto text-center">
        <table class="table table-hover table-dark">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome da Cidade</th>
                <th scope="col">N° de Postos</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($cidades as $cidade)
                <tr>
                    <th scope="row">{{$cidade->id}}</th>
                    <td>{{$cidade->nome_da_cidade}}</td>
                    <td><a href="/posto/{{$cidade->id}}" style="text-decoration: none; color: rgb(175, 238, 58)">{{$cidade->postos}}</a></td>
                    <td>
                        <a href="/cidade/{{$cidade->id}}/edit" title="editar"><i class="fas fa-edit"></i></a>
                    </td>
                    <td>
                        <a href="/cidade/{{$cidade->id}}/del" title="excluir" style="color:red" class="ml-5 color js-del"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
          <div class="row">
            <div class="col-12">
                <a href="/cidade/create" class="btn btn-secondary mb-2" id="cadCidade">Cadastrar Cidade</a>
            </div>
        </div>
    </div>
    
@endsection