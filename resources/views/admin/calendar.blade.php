@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Calendar</h1>
    <div id="calendar"></div>
</div>

<link href='{{ mix('css/app.css') }}' rel='stylesheet' />
<script src='{{ mix('js/app.js') }}'></script>
<script src='{{ mix('js/calendar.js') }}'></script>
@endsection
