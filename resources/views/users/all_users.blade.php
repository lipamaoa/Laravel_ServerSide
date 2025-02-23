@extends('layouts.fo_layout')
@section('content')
<div class="container mt-5">
   
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="mb-0">Users</h1>
        <a href="{{ route('users.add') }}" class="btn btn-primary btn-sm">Add User</a>
    </div>
    <form action="">
        <input type="text" name="search" id="" value="{{request()->query('search')}}">
        <button type="submit" class=" btn btn-primary">Search</button>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-striped table-hover table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="text-center">
                            <a href="{{ route('users.id', $user->id) }}" class="btn btn-sm btn-primary">See</a>
                            @auth
                            @if(Auth::user()->email=='filipa.silva@gmail.com')
                            <a href="{{ route('users.delete', $user->id) }}" class="btn btn-sm btn-danger">Delete</a>
                            @endif
                            @endauth
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
