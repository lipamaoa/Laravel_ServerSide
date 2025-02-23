
@extends('layouts.fo_layout')
@section('content')


<div class="container">
    <h1>Recover you Password</h1>
    @if (session('status'))
    <div class="alert alert-success"> An email with a link will be sent to your email.</div>
        
    @endif
</div>
<form action="{{ route('password.email') }}" method="POST">
    @csrf
    <form>
            <div class="form-group mb-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg w-100">Send</button>
            </div>
        </form>
        <a href="{{route('home')}}">Back</a>
    
@endsection
