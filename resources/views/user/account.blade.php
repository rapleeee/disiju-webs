@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Account Information</h2>
    <div class="card">
        <div class="card-header">
            Account Details
        </div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
        </div>
    </div>
</div>
@endsection
