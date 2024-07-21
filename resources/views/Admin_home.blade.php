@extends('layout.adminheader')

@section('header')
    Admin   
@endsection

<style>
    .btn-blue {
        background-color: #007bff;
        color: white;
        padding: 8px 16px;
        border-radius: 4px;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-blue:hover {
        background-color: #0056b3;
    }

    .section-heading {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .section-heading h2 {
        margin-right: 10px;
    }

    .heading-line {
        flex: 1;
        height: 2px;
        background-color: #ddd;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.3); /* Adjust shadow as needed */
    }

    .date-box {
        display: inline-block;
        background-color: #f5f5f5;
        padding: 4px 9px;
        border-radius: 3px;
        margin-right: 5px;
    }

    .time-left {
        font-size: 14px;
        color: #888;
    }
</style>

@section('main_content')
<div class="container mt-2">
    <div class="section-heading">
        <h2 class="text-2xl font-bold">
            Upcoming Events
        </h2>
        <span class="heading-line"></span>
    </div>
    <br>
    <div class="grid grid-cols-3 gap-2 gap-y-2 mx-auto pb-3">
        @foreach ($upcomingEvents as $event)
        <a href="{{ route('viewEvent', ['id' => $event->event_id]) }}" class="group block mx-auto rounded-lg overflow-hidden hover:shadow-xl transform hover:scale-105 bg-white ring-1 ring-slate-900/5 shadow-lg hover:bg-sky-500 hover:ring-sky-500 transition-all duration-300 ease-in-out" style="width: 300px; height: 180px; border-radius: 15px;">
            <div class="flex flex-col h-full">
                <div class="flex items-center justify-center p-6">
                    <svg class="h-6 w-6 stroke-sky-500 group-hover:stroke-white" fill="none" viewBox="0 0 24 24"><!-- ... --></svg>
                    <h3 class="text-slate-900 text-lg font-semibold ml-2">
                        <span class="font-bold">{{ $event->name }}</span>
                    </h3>
                </div>
                <div class="flex items-center justify-center">
                <p class="time-left" style="font-size: 12px; color: #888;">Starts on</p><br>

                    <div class="date-box">
                        <span>{{ substr($event->startdate, 0, 4) }}</span>
                    </div>:
                    <div class="date-box">
                        <span>{{ substr($event->startdate, 5, 2) }}</span>
                    </div>:
                    <div class="date-box">
                        <span>{{ substr($event->startdate, 8,2) }}</span>
                    </div>
                </div>
                <div class="flex items-center justify-center mt-2">
                    <button class="btn-blue">Tap to view</button>
                </div>
            </div>
        </a>
        @endforeach
    </div>

    <div class="section-heading">
        <h2 class="text-2xl font-bold">
            Live Events
        </h2>
        <span class="heading-line"></span>
    </div>
    <br>
    <div class="grid grid-cols-3 gap-2 gap-y-2 mx-auto pb-3">
        @foreach ($liveEvents as $event)
        <a href="{{ route('viewEvent', ['id' => $event->event_id]) }}" class="group block mx-auto rounded-lg overflow-hidden hover:shadow-xl transform hover:scale-105 bg-white ring-1 ring-slate-900/5 shadow-lg hover:bg-sky-500 hover:ring-sky-500 transition-all duration-300 ease-in-out" style="width: 300px; height: 220px; border-radius: 15px;">
            <div class="flex flex-col h-full">
                <div class="flex items-center justify-center p-6">
                    <svg class="h-6 w-6 stroke-sky-500 group-hover:stroke-white" fill="none" viewBox="0 0 24 24"><!-- ... --></svg>
                    <h3 class="text-slate-900 text-lg font-semibold ml-2">
                        <span class="font-bold">{{ $event->name }}</span>
                    </h3>
                </div>
                <div class="flex items-center justify-center">
                <p class="time-left" style="font-size: 12px; color: #888;">Starts on</p>

                    <div class="date-box">
                        <span>{{ substr($event->startdate, 0, 4) }}</span>
                    </div>:
                    <div class="date-box">
                        <span>{{ substr($event->startdate,5,2) }}</span>
                    </div>:
                    <div class="date-box">
                        <span>{{ substr($event->startdate, 8,2) }}</span>
                    </div>
                </div>
                <div class="flex items-center justify-center mt-2">
                <p class="time-left">
    Ends in: {{ \Carbon\Carbon::parse($event->endtime)->diffForHumans(\Carbon\Carbon::now()) }}
</p>

                </div>
                <div class="flex items-center justify-center mt-auto mb-4">
                    <button class="btn-blue">Tap to view</button>
                </div>
            </div>
        </a>
        @endforeach
    </div>

    <div class="section-heading">
        <h2 class="text-2xl font-bold">
            Archive Events
        </h2>
        <span class="heading-line"></span>
    </div>
    <br>
    <div class="grid grid-cols-3 gap-2 gap-y-2 mx-auto pb-3">
        @foreach ($archivedEvents as $event)
        <a href="{{ route('viewEvent', ['id' => $event->event_id]) }}" class="group block mx-auto rounded-lg overflow-hidden hover:shadow-xl transform hover:scale-105 bg-white ring-1 ring-slate-900/5 shadow-lg hover:bg-sky-500 hover:ring-sky-500 transition-all duration-300 ease-in-out" style="width: 300px; height: 180px; border-radius: 15px;">
            <div class="flex flex-col h-full">
                <div class="flex items-center justify-center p-6">
                    <svg class="h-6 w-6 stroke-sky-500 group-hover:stroke-white" fill="none" viewBox="0 24 24"><!-- ... --></svg>
                    <h3 class="text-slate-900 text-lg font-semibold ml-2">
                        <span class="font-bold">{{ $event->name }}</span>
                    </h3>
                </div>
                <div class="flex items-center justify-center">
                <p class="time-left" style="font-size: 12px; color: #888;">Starts on</p>

                    <div class="date-box">
                        <span>{{ substr($event->startdate, 0, 4) }}</span>
                    </div>:
                    <div class="date-box">
                        <span>{{ substr($event->startdate, 5,2) }}</span>
                    </div>:
                    <div class="date-box">
                        <span>{{ substr($event->startdate, 8,2) }}</span>
                    </div>
                </div>
                <div class="flex items-center justify-center mt-2">
                    <button class="btn-blue">Tap to view</button>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection
