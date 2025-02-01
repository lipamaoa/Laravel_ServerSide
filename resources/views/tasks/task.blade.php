@extends('layouts.fo_layout')
@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-body">
            <h2 class=" card-header text-center  fw-bold mb-4">Task Details</h2>
            
            <div class="mb-3">
                <h5 class="fw-bold">Name:</h5>
                <p class="text-muted">{{ $task->name }}</p>
            </div>

            <div class="mb-3">
                <h5 class="fw-bold">Description:</h5>
                <p class="text-muted">{{ $task->description }}</p>
            </div>

            <div class="mb-4">
                <h5 class="fw-bold">Due date:</h5>
                <p class="text-muted">{{ $task->due_at }}</p>
            </div>

            <div class="text-center">
                <a href="{{ route('tasks') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
