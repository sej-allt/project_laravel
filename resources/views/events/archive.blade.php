<!-- resources/views/events/archive.blade.php -->
@extends('layout.adminheader')

@section('title', 'Archived Events')

@section('main_content')
    <div class="container mt-5" style="padding-left: 100px; padding-top: 50px">
        <h1>Archived Events</h1>
        <div class="row">
            @foreach($archivedEvents as $event)
                <div class="col-md-4 mb-4" >
                    <div class="card">
                        <img src="{{ asset('path/to/your/image/folder/' . $event->image) }}" class="card-img-top" alt="{{ $event->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->name }}</h5>
                            <p class="card-text">
                                Start Date: {{ $event->startdate }}<br>
                                End Date: {{ $event->enddate }}
                            </p>
                            <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary">View Event</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
