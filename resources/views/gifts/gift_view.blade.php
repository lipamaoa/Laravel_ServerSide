@extends('layouts.fo_layout')
@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header text-center fw-bold mb-4">
            <h2>Gift Info</h2>
        </div>
        <div class="card-body">
            <h6 class="mb-3">
                <strong>Name:</strong> {{$gift->giftName}}
            </h6>
            <h6 class="mb-3">
                <strong>Price:</strong> {{$gift->priceExpected}} €
            </h6>
            <h6 class="mb-3">
                <strong>Amount Spent:</strong> {{$gift->amountSpent}} €
            </h6>
            <h6 class="mb-3">
                <strong>Recipient:</strong> {{$gift->user_name}}
            </h6>
            <div class="text-center">
            <a href="{{ route('gift.update', $gift->id) }}" class="btn btn-md btn-warning">Update</a>
</div>
        </div>
        

 
    @endsection