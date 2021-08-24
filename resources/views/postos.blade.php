@extends('templates.template')

@section('content')
<h1 class="text-center title">POSTOS</h1>
<div class="col-8 m-auto text-center">
  <table class="table table-hover table-dark">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Reservatório</th>
        <th scope="col">Editar</th>
        <th scope="col">Excluir</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($postos as $posto)
      <tr>
        <th scope="row">{{$posto->id}}</th>
        <td>{{$posto->reservatorio}} %</td>
        <td>
          <a href="/posto/{{$posto->id}}}/edit" title="editar"><i class="fas fa-edit"></i></a>
        </td>
        <td>
          <a href="/posto/{{$posto->id}}}/del" title="excluir" style="color:red" class="ml-5 color js-del"><i class="fas fa-trash"></i></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection