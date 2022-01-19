@extends('layouts.app')

@section('content')

<h2>Meus dados</h2>
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

<form action="{{ url('/perfil/atualizar') }}" method="post">
    @csrf
    
    <div class="row">
        <div class="form-group col-md-4">
            <label>Nome: *</label>
            <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
        </div>

        <div class="form-group col-md-4">
            <label>E-mail: *</label>
            <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" required>
        </div>
        
        <div class="form-group col-md-4">
            <label>Senha:</label>
            <input type="password" name="password" class="form-control">
        </div>
    </div>
    
    <div class="form-group">
        <button type="submit" class="btn btn-success">
            <i class="fa fa-refresh" aria-hidden="true"></i> Atualizar
        </button>
    </div>
</form>

@endsection