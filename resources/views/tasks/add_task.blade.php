@extends ('layouts.fo_layout')
@section('content')

@if(session('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('message')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
<div class="d-flex justify-content-center align-items-center vh-100">
    @endif
    <div class="card p-4 shadow mt-5" style="width: 40rem;">
        <h1 class="text-center mb-4">Add task</h1>
        <form action="{{route('task-add')}}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            @error('name')
            <span style="color: red;">{{ $message }}</span>
        @enderror
            <div class="form-group mb-3">
                <label for="description">Description:</label>
                <input type="description" class="form-control" id="description" name="description" required>
            </div>
            @error('description')
            <span style="color: red;">{{ $message }}</span>
        @enderror
        <div class="form-group mb-3">
                <label for="description">Due At:</label>
                <input type="date" class="form-control" id="description" name="due_at" required>
            </div>
            @error('description')
            <span style="color: red;">{{ $message }}</span>
        @enderror
        <label for="exampleSelect">Escolha uma opção de</label>
        <label for="status">Status:</label>
    <select class="form-select" name="status" id="status" required>
        <option value="0" >To be started</option>
        <option value="1" >Concluded</option>
    </select>
        <label for="exampleSelect">Escolha uma opção de</label>
        <select class="form-select" name="user_id" aria-label="Default select example">
            <option selected>Choose an option</option>
            @foreach ($usersSelection as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
          </select>
          <br>
            @error('user')
            <span style="color: red;">{{ $message }}</span>
        @enderror
            

            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg w-100">Add User</button>
            </div>
        </form>
    </div>
</div>


@endsection