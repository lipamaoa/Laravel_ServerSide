@extends ('layouts.fo_layout')
@section('content')

@if(session('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('message') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow" style="width: 40rem;">
        <h1 class="text-center mb-4">Add User</h1>
        <form action="{{ route('users-add') }}" method="POST">
            @csrf

            <div class="form-group mb-3">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="form-group mb-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="form-group mb-3">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            @error('address')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            <div class="form-group mb-3">
                <label for="nif">NIF:</label>
                <input type="text" class="form-control" id="nif" name="nif" required>
            </div>
            @error('nif')
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
                <button type="submit" class="btn btn-primary btn-lg w-100">Add User</button>
            </div>
        </form>
    </div>
</div>

@endsection
