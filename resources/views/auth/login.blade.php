@extends('layouts.fo_layout')
@section('content')

<form action="{{ route('login') }}" method="POST">
    @csrf
    <form>

            <div class="form-group mb-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror


            <div class="form-group mb-4">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            @error('password')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg w-100">Sign In</button>
                <a href="{{route('password.request')}}">Forgot your password?</a>
            </div>
        </form>
    
@endsection