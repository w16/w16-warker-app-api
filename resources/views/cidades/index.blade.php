@extends('layouts.app')

@section('content')

<h2>Cidades</h2>
<a href="{{ url('/cidades/novo') }}" class="btn btn-success">
    <i class="fa fa-plus" aria-hidden="true"></i> Adicionar cidade
</a>
<hr>

@if(count($errors) > 0)
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(Session::has('success'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>{{ Session::get('success') }}</strong>
</div>
@endif

@if(Session::has('error'))
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>{{ Session::get('error') }}</strong>
</div>
@endif

<table class="table table-hover table-bordered">
	<thead>
    	<tr>
        	<th>Nome da cidade</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Ações</th>
		</tr>
	</thead>
	<tbody>
		@foreach($cidades as $cidade)
    	<tr>
            <td>{{ $cidade->nome_da_cidade }}</td>
            <td>{{ $cidade->latitude }}</td>
            <td>{{ $cidade->longitude }}</td>
            <td>
            	<a href="{{ url('/cidades/editar/' . $cidade->id) }}" class="btn btn-primary">
                    <i class="fa fa-pencil" aria-hidden="true"></i> Editar
                </a>
                <a href="{{ url('/cidades/excluir/' . $cidade->id) }}" class="btn btn-danger" onclick="return confirm('Deseja excluir esta cidade?');">
                    <i class="fa fa-trash" aria-hidden="true"></i> Excluir
                </a>
            </td>
		</tr>
		@endforeach
	</tbody>
</table>

@endsection