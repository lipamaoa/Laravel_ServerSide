@extends('layouts.fo_layout')

@section('content')
@auth
            <h5>Olá {{ Auth::user()->name }}</h5>
    @endauth

<div class="container mt-4">
    <div class="card shadow-lg p-4">
        <div class="text-center">
            <h5 class="fw-bold text-primary">Olá! Bem-vindo ao meu site.</h5>
            <h6 class="text-muted">{{ $myVar }}</h6>
            <h6 class="text-secondary">{{ $contactInfo['name'] }}</h6>
            <div class="mt-3">
                <img src="{{ asset('images/what-is-software-CA-Capterra-Header.png') }}" alt="Imagem" class="img-fluid rounded">
            </div>
        </div>
    </div>
</div>
@endsection
