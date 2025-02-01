@extends('layouts.fo_layout')
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
        <h1 class="mb-0">Gifts</h1>
        <a href="{{ route('gift.add') }}" class="btn btn-primary btn-sm">Add Gift</a>
    </div>
    <div class="card shadow">
        <div class="card-body">
            <table class="table table-striped table-hover table-bordered align-middle">
                <thead class="table-dark">
                    <tr> 
                        <th scope="row">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price Expected</th>
                        <th scope="col">Amount Spent</th>
                        <th scope="col">Recipient</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gifts as $gift)
                    <tr>
                        <th scope="row">{{$gift->id}}</th>
                        <td>{{ $gift->giftName }}</td>
                        <td>{{ $gift->priceExpected }}</td>
                        <td>{{ $gift->amountSpent }}</td>
                        <td>{{ $gift->user_name }}</td>
                        <td class="text-center">
                            <a href="{{route('gifts.id', $gift->id)}}" class="btn btn-sm btn-primary">See</a>
                            <a href="{{route('gifts.delete', $gift->id )}}" class="btn btn-sm btn-danger">Delete</a>
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

