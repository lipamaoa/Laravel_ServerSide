@extends('layouts.fo_layout')

@section('content')

<div class="container">

    @if(Auth::user()->user_type == 1)
        <div class="alert alert-success" role="alert">
            Conta de Administrador
        </div>
    @endif
 
    <h1>Olá, {{ Auth::user()->name }}</h1>
</div>

@endsection