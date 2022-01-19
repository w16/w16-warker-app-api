@extends('layouts.app')

@section('content')

<h2>Bem-vindo {{ Auth::user()->name }}</h2>

@endsection