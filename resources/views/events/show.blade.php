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
                <p class="card-text">Company: {{ $event->company }}</p>
                <p class="card-text">Campus: {{ $event->campus }}</p>
                <p class="card-text">Marks10: {{ $event->marks10 }}</p>
                <p class="card-text">Marks12: {{ $event->marks12 }}</p>
                <p class="card-text">Cgpa: {{ $event->cgpa }}</p>
                <p class="card-text">Role: {{ $event->role }}</p>
                <p class="card-text">Responsibility: {{ $event->responsibility }}</p>
                <p class="card-text">Eligibility: {{ $event->eligibility }}</p>
                <p class="card-text">Registration Date: {{ $event->registration_date }}</p>
                <p class="card-text">Last Date Of Registration: {{ $event->last_date_of_registration }}</p>

            </div>
        </div>
    </div>
@endsection
