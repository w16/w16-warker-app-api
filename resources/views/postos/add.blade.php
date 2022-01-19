@extends('layouts.app')

@section('content')

<h2>Adicionar posto</h2>
<a href="{{ url('/postos') }}" class="btn btn-success">
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

<form action="{{ url('/postos/salvar') }}" method="post">
    @csrf

    <div class="row">
        <div class="form-group col-md-6">
            <label>Cidade: *</label>
            <select name="cidade_id" class="form-control" required>
                <option value="">----Selecione a cidade----</option>
                @foreach($cidades as $cidade)
                <option value="{{ $cidade->id }}">{{ $cidade->nome_da_cidade }}</option>
                @endforeach
            </select>
        </div>
    
        <div class="form-group col-md-6">
            <label>Quantidade no reservatório: *</label>
            <input type="text" name="reservatorio" class="form-control onlynumbers" value="{{ old('reservatorio') }}" required>
        </div>

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