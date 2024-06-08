<!-- resources/views/events/show.blade.php -->
@extends('layout.adminheader')

@section('main_content')
    <div class="container mt-5">
        <h1>{{ $event->name }}</h1>
        <div class="card">
            <img src="{{ asset('path/to/your/image/folder/' . $event->image) }}" class="card-img-top" alt="{{ $event->name }}">
            <div class="card-body">
                <p class="card-text">{{ $event->description }}</p>
                <p class="card-text">Start Date: {{ $event->startdate }}</p>
                <p class="card-text">End Date: {{ $event->enddate }}</p>
                <p class="card-text">Start Time: {{ $event->starttime }}</p>
                <p class="card-text">End Time: {{ $event->endtime }}</p>
            </div>
        </div>
    </div>
@endsection
