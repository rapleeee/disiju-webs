@extends('layouts.app')

@section('content')
<div class="container">
    <div id="calendar"></div>
    <h3>Event List</h3>
    <ul id="event-list">
        @foreach($events as $event)
        <li>{{ $event->title }} - {{ $event->start }}</li>
        @endforeach
    </ul>
</div>


<link href='{{ mix('css/app.css') }}' rel='stylesheet' />
<script src='{{ mix('js/app.js') }}'></script>
<script src='{{ mix('js/calendar.js') }}'></script>
@endsection
