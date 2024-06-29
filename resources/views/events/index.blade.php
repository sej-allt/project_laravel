@extends('layout.adminheader')

@section('header')
    Create Event
@endsection

@section('main_content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Navbar content -->
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3" >
                <!-- Sidebar Toggle Button -->
                <button class="btn btn-primary sidebar-toggle">&#8942;</button>
                <!-- Sidebar -->
                <div class="sidebar">
                    <div class="archive-sidebar">
                        <a href="{{ route('archive') }}" class="archive-link">Archive</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.querySelector('.sidebar-toggle');
            const sidebar = document.querySelector('.sidebar');

            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('show-sidebar');
            });
        });
    </script>
</div>
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
