@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name Booker</th>
                <th>Event Place</th>
                <th>Phone Number</th>
                <th>Booking Date</th>
                <th>Size</th>
                <th>Price</th>
                <th>Status</th>
                <th>Actions</th>
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
                <td>{{ $booking->status }}</td>
                <td>
                    @if ($booking->status != 'confirmed')
                    <form method="POST" action="{{ route('admin.confirm.booking', $booking->id) }}" style="display: inline-block;">
                        @csrf
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </form>
                    @endif
                    <form method="POST" action="{{ route('admin.delete.booking', $booking->id) }}" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline" style="border: none; background: none;">
                            <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
