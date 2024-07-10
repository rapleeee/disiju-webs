@extends('layouts.app')

@section('content')
<div class="container">

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h2>Book an Event</h2>
    <h6>Silahkan lihat terlebih dahulu calender event yang tersedia dimana saja, lakukan booking dengan benar</h6>
    <form method="POST" action="{{ route('user.book') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="event_place">Event Place</label>
            <select name="event_place" class="form-control" required>
                <option value="Gedung Graha Mandiri">Gedung Graha Mandiri</option>
                <option value="Gedung UOB Plaza">Gedung UOB Plaza</option>
                <option value="Gedung Plaza Mandiri">Gedung Plaza Mandiri</option>
                <option value="Gedung CIMB Niaga Bintaro 7">Gedung CIMB Niaga Bintaro 7</option>
            </select>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="booking_date">Booking Date</label>
            <input type="date" name="booking_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="size">Size</label>
            <select name="size" class="form-control" required>
                <option value="1x1">1x1 (Rp 250.000)</option>
                <option value="2x1">2x1 (Rp 500.000)</option>
                <option value="2x2">2x2 (Rp 1.000.000)</option>
                <option value="3x3">3x3 (Rp 2.250.000)</option>
            </select>
        </div>
        <div class="form-group">
            <p><strong>Price Details:</strong></p>
            <ul>
                <li>1x1: Rp 250.000</li>
                <li>2x1: Rp 500.000</li>
                <li>2x2: Rp 1.000.000</li>
                <li>3x3: Rp 2.250.000</li>
            </ul>
        </div>
        <button type="submit" class="btn btn-primary">Book</button>
    </form>



</div>

@endsection
