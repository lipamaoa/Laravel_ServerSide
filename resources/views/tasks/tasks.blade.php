@extends ('layouts.fo_layout')
@section ('content')

@if(session('message'))
<div class="toast align-items-center text-white bg-success border-0 position-fixed top-0 start-50 translate-middle-x mt-3 show" role="alert" aria-live="assertive" aria-atomic="true">    <div class="d-flex">
        <div class="toast-body">
            {{ session('message') }}
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
</div>
@endif


<div class="container mt-5">
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="text-center mb-4">Tasks</h1>
    <a href="{{ route('task.add') }}" class="btn btn-primary btn-sm">Add Task</a>
</div>
    <div class="card shadow">
        <div class="card-body">
            <table class="table table-striped table-hover table-bordered align-middle">
                <thead class="table-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Description</th>
          <th scope="col">User</th>
          <th scope="col">Status</th>
          <th scope="col">Conclusion Date</th>
          <th scope="col">Actions</th>
          
        </tr>
      </thead>
      <tbody>
 
        @foreach ($tasks as $task )
           
       
        <tr>
          <th scope="row">{{$task->id}}</th>  
          <td>{{$task->name}}</td>
          <td>{{$task->description}}</td>
          <td>{{$task->user_name}}</td>
          <td>{{ $task->status == 1 ? 'Concluded' : 'To be started' }}</td>
          <td>{{$task->due_at}}</td>
          <td>
            <a href="{{route('tasks.id', $task->id)}}"><button class="btn btn-primary">Ver</button> </a>
            <a href="{{route('tasks.delete', $task->id)}}"><button class="btn btn-danger">Delete</button> </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>
    </div>
</div>



    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var toastEl = document.querySelector('.toast');
        if (toastEl) {
            var toast = new bootstrap.Toast(toastEl);
            toast.show();
        }
    });
</script>
    
    @endsection

