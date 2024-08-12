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
                <th>Payment Instructions & Confirmation</th>
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
                    @if ($booking->status_bukti_transfer == 'pending')
                    <p>Untuk proses pembayaran silahkan lakukan pembayaran ke nomor rekening Mandiri atas nama PT Di Siju Saitama Perkasa nomor rekening 1670003540134</p>
                    <p>Untuk konfirmasi bukti pembayaran, upload bukti transfer di bawah ini:</p>
                    <form action="{{ route('bookings.uploadBuktiTransfer', $booking) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="bukti_transfer">Upload Bukti Transfer</label>
                            <input type="file" name="bukti_transfer" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                    @else
                    <p>Pembayaran sudah terkonfirmasi.</p>
                    @endif
                    @else
                    <p>Menunggu konfirmasi booking.</p>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
