@extends ('layouts.fo_layout')
@section('content')

@if(session('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('message')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow" style="width: 40rem;">
        <h1 class="text-center mb-4">Add Gift</h1>
        <form action="{{route('gift-add')}}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="giftName" name="giftName" required>
            </div>
            @error('name')
            <span style="color: red;">{{ $message }}</span>
            @enderror
            <div class="form-group mb-3">
                <label for="price">Price:</label>
                <input type="text" class="form-control" id="price" name="priceExpected" required>
            </div>
            @error('price')
            <span style="color: red;">{{ $message }}</span>
            @enderror
            <div class="form-group mb-3">
                <label for="amountSpent">Amount Spent:</label>
                <input type="text" class="form-control" id="amountSpent" name="amountSpent" required>
            </div>
            @error('amountSpent')
            <span style="color: red;">{{ $message }}</span>
            @enderror


            <div class="form-group mb-3">
    <label for="user_id">Choose a User:</label>
    <select class="form-select" id="user_id" name="user_id" required>
        <option selected disabled>Select a user</option>
        @foreach ($usersSelection as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
</div>
            @error('user_id')
            <span style="color: red;">{{ $message }}</span>
            @enderror
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg w-100">Add Gift</button>
            </div>
        </form>
    </div>
</div>

@endsection
