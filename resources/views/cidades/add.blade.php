@extends('layouts.app')

@section('content')

<h2>Adicionar cidade</h2>
<a href="{{ url('/cidades') }}" class="btn btn-success">
    <i class="fa fa-chevron-left" aria-hidden="true"></i> Voltar
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

@if(Session::has('error'))
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>{{ Session::get('error') }}</strong>
</div>
@endif

<form action="{{ url('/cidades/salvar') }}" method="post">
    @csrf

    <div class="form-group">
        <label>Nome da cidade: *</label>
        <input type="text" name="nome_da_cidade" class="form-control" value="{{ old('nome_da_cidade') }}" required>
    </div>
    
    <div class="row">
        <div class="form-group col-md-6">
            <label>Latitude: *</label>
            <input type="text" name="latitude" id="latitude" class="form-control" value="{{ old('latitude') }}" required>
        </div>
        
        <div class="form-group col-md-6">
            <label>Longitude: *</label>
            <input type="text" name="longitude" id="longitude" class="form-control" value="{{ old('longitude') }}" required>
        </div>
    </div>
    
    <div class="form-group">
        <button type="submit" class="btn btn-success">
            <i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar
        </button>
    </div>
</form>

@endsection