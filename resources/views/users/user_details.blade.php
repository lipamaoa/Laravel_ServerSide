@extends('layouts.fo_layout')
@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header text-center bg-primary text-white">
            <h2>User Info</h2>
        </div>
        <div class="card-body">
            <h6 class="mb-3">
                <strong>Nome:</strong> {{$user->name}}
            </h6>
            <h6 class="mb-3">
                <strong>Morada:</strong> {{$user->address}}
            </h6>
            <h6 class="mb-3">
                <strong>NIF:</strong> {{$user->nif}}
            </h6>
            <h6 class="mb-3">
                <strong>Email:</strong> {{$user->email}}
            </h6>
        </div>
        

 
    @endsection