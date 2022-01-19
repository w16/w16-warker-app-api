@extends('layouts.app')

@section('content')

<h2>Postos</h2>
<a href="{{ url('/postos/novo') }}" class="btn btn-success">
    <i class="fa fa-plus" aria-hidden="true"></i> Adicionar posto
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
        	<th>Cidade</th>
            <th>Reservatório</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Ações</th>
		</tr>
	</thead>
	<tbody>
		@foreach($postos as $posto)
    	<tr>
            <td>{{ $posto->nome_da_cidade }}</td>
            <td>{{ $posto->reservatorio }}</td>
            <td>{{ $posto->latitude }}</td>
            <td>{{ $posto->longitude }}</td>
            <td>
                <a href="{{ url('/postos/editar/' . $posto->id) }}" class="btn btn-primary">
                    <i class="fa fa-pencil" aria-hidden="true"></i> Editar
                </a>
                <a href="{{ url('/postos/excluir/' . $posto->id) }}" class="btn btn-danger" onclick="return confirm('Deseja excluir esta posto?');">
                    <i class="fa fa-trash" aria-hidden="true"></i> Excluir
                </a>
            </td>
		</tr>
		@endforeach
	</tbody>
</table>

@endsection