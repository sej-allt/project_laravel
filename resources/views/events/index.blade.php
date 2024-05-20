@extends('layout.app')

@section('content')
    <div class="container mt-5">
        <div class="mt-4 mb-5" style="padding-left: 100px; padding-top: 50px">
            <h1>Upcoming Events</h1>
            <div class="row">
                @if($upcomingEvents->isEmpty())
                    <p>No upcoming events.</p>
                @else
                    @foreach($upcomingEvents as $event)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset("C:\Users\lenovo\Downloads\You can do it.png" . $event->image) }}" class="card-img-top" alt="{{ $event->name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $event->name }}</h5>
                                    <p class="card-text">
                                        Start Date: {{ $event->startdate }}<br>
                                        Start Time: {{ $event->starttime }}
                                    </p>
                                    <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary">View Event</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="mt-4 mb-5" style="padding-left: 100px; padding-top: 50px">
            <h1>Live Events</h1>
            <div class="row">
                @if($liveEvents->isEmpty())
                    <p>No live events.</p>
                @else
                    @foreach($liveEvents as $event)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset("C:\Users\lenovo\Downloads\You can do it.png" . $event->image) }}" class="card-img-top" alt="{{ $event->name }}">
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
                @endif
            </div>
        </div>
    </div>
@endsection
