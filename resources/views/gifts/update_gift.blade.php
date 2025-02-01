@extends('layouts.fo_layout')
@section('content')

@if(session('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('message')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow" style="width: 40rem;">
        <h1 class="text-center mb-4">Edit Gift</h1>
        <form action="{{ route('gifts.update', $gift->id) }}" method="POST">
            @csrf
           
           
            <div class="form-group mb-3">
                <label for="giftName">Name:</label>
                <input type="text" class="form-control" id="giftName" name="giftName" value="{{ $gift->giftName }}" required>
            </div>
            @error('giftName')
            <span style="color: red;">{{ $message }}</span>
            @enderror
            <div class="form-group mb-3">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="price" name="priceExpected" value="{{ $gift->priceExpected }}" required>
            </div>
            @error('priceExpected')
            <span style="color: red;">{{ $message }}</span>
            @enderror
            <div class="form-group mb-3">
                <label for="amountSpent">Amount Spent:</label>
                <input type="text" class="form-control" id="amountSpent" name="amountSpent" value="{{ $gift->amountSpent }}" required>
            </div>
            @error('amountSpent')
            <span style="color: red;">{{ $message }}</span>
            @enderror
            <div class="form-group mb-3">
                <label for="user_id">Choose a User:</label>
                <select class="form-select" id="user_id" name="user_id" aria-label="Default select example">
                    @foreach ($usersSelection as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $gift->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('user_id')
            <span style="color: red;">{{ $message }}</span>
            @enderror
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg w-100">Update Gift</button>
            </div>
        </form>
    </div>
</div>

@endsection
