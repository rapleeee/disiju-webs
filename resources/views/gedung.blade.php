@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Gedung</h2>
    <div class="row">
        @foreach ($gedungs as $gedung)
        <div class="col-md-6">
            <div class="card mb-4 gedung-card">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{ asset('images/' . $gedung['image']) }}" class="card-img gedung-img" alt="{{ $gedung['name'] }}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $gedung['name'] }}</h5>
                            <p class="card-text">{{ $gedung['address'] }}</p>
                            <a href="{{ route('gedung.show', $gedung['id']) }}" class="btn btn-primary">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    .gedung-card {
        display: flex;
        flex-direction: row;
    }
    .gedung-img {
        width: 100%;
        height: 10rem;
        object-fit: cover;
    }
</style>
@endsection
