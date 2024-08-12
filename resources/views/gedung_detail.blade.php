@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Gedung: {{ $detail['name'] }}</h2>
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <h5 class="card-title">{{ $detail['name'] }}</h5>
            <p class="card-text">Kapasitas: {{ $detail['capacity'] }} orang</p>
            <a href="{{ route('gedung.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
