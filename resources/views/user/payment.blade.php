@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Upload Bukti Transfer untuk Booking: {{ $booking->name }}</h2>
    <div class="card">
        <h3>{{ $booking->name }}</h3>
        <p>Status: {{ $booking->status }}</p>
        <p>Status Bukti Transfer: {{ $booking->status_bukti_transfer }}</p>
        @if ($booking->status == 'confirmed' && $booking->status_bukti_transfer == 'pending')
        <form action="{{ route('bookings.uploadBuktiTransfer', $booking) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="bukti_transfer">Upload Bukti Transfer</label>
                <input type="file" name="bukti_transfer" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
        @endif
    </div>
</div>
@endsection
