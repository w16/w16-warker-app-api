@extends('templates.template')

@section('content')

    <h1 class="text-center title">@if (isset($posto)) EDITAR @else CADASTRAR @endif POSTO</h1>
    <div class="col-4 m-auto mt-5">
        @if (isset($posto))
            <form name="formEditposto" id="formposto" action="{{url("posto/$posto->id/edit") }}" method="POST">
                @method('PUT')
        @else
            <form name="formCadposto" id="formposto" action="{{ route('save_posto')}}" method="POST">
        @endif
            @csrf
            <input type="hidden" name="cidade_id" id="cidade_id" value="{{$cidade_id ?? $posto->cidade_id}}">
            <div class="form-group">
                <label for="reservatorio">Reservatório</label>
                <input type="text" class="form-control" name="reservatorio" id="reservatorio" value="{{$posto->reservatorio ?? ''}}" required>
                <label for="latitude">Latitude</label>
                <input type="text" class="form-control" name="latitude" id="latitude" value="{{$posto->latitude ?? ''}}" required>
                <label for="longitude">Longitude</label>
                <input type="text" class="form-control" name="longitude" id="longitude" value="{{$posto->longitude ?? ''}}" required>   
            </div>
            <div class="mt-5 row">
                <div class="col-12">
                    <button type="submit" class="btn btn-success">
                        @if (isset($posto)) Editar @else Cadastrar @endif
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection