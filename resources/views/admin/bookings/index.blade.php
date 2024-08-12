@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Konfirmasi Bukti Transfer</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID Booking</th>
                <th>Nama</th>
                <th>Bukti Transfer</th>
                <th>Status Bukti Transfer</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
            <tr>
                <td>{{ $booking->id }}</td>
                <td>{{ $booking->user->name }}</td>
                <td><img src="{{ asset('storage/' . $booking->bukti_transfer) }}" width="100"></td>
                <td>{{ $booking->status_bukti_transfer }}</td>
                <td>
                    @if ($booking->status_bukti_transfer == 'pending')
                    <form method="POST" action="{{ route('admin.bookings.confirmBuktiTransfer', $booking) }}">
                        @csrf
                        <button type="submit" class="btn btn-success">Konfirmasi</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
