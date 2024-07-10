@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Your Bookings</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Event Place</th>
                <th>Phone Number</th>
                <th>Booking Date</th>
                <th>Size</th>
                <th>Price</th>
                <th>Status</th>
                <th>Payment Instructions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
            <tr>
                <td>{{ $booking->name }}</td>
                <td>{{ $booking->event_place }}</td>
                <td>{{ $booking->phone }}</td>
                <td>{{ $booking->booking_date }}</td>
                <td>{{ $booking->size }}</td>
                <td>{{ $booking->price }}</td>
                <td>
                    <span class="badge @if($booking->status == 'pending') badge-danger @elseif($booking->status == 'confirmed') badge-success @endif">
                        {{ $booking->status }}
                    </span>
                </td>
                <td>
                    @if ($booking->status == 'confirmed')
                    <p>Untuk proses pembayaran silahkan lakukan pembayaran ke nomor rekening Mandiri atas nama PT Di Siju Saitama Perkasa nomor rekening 1670003540134</p>
                    <p>Untuk konfirmasi bukti pembayaran, klik <a href="https://wa.me/+6282136166298">link berikut</a>.</p>
                    @else
                    <p>Menunggu konfirmasi</p>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
