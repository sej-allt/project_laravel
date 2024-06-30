@extends('layout.adminheader')

@section('header')
    Admin   
@endsection

@section('main_content')
<div class="container mt-5">
<h2 class="text-2xl font-bold">Upcoming Events</h2><br>
    <div class="grid grid-cols-3 gap-2 gap-y-2 mx-auto pb-3">
        @foreach ($upcomingEvents as $event)
        <a href="{{ route('viewEvent', ['id' => $event->event_id]) }}" class="group block mx-auto rounded-lg overflow-hidden hover:shadow-xl transform hover:scale-105 bg-white ring-1 ring-slate-900/5 shadow-lg hover:bg-sky-500 hover:ring-sky-500 transition-all duration-300 ease-in-out" style="width: 350px; height: 160px; border-radius: 15px;">
            <div class="flex flex-col h-full">
                <div class="flex items-center justify-center p-6">
                    <svg class="h-6 w-6 stroke-sky-500 group-hover:stroke-white" fill="none" viewBox="0 0 24 24"><!-- ... --></svg>
                    <h3 class="text-slate-900 text-lg font-semibold ml-2">
                        <span class="font-bold">{{ $event->name }}</span>
                    </h3>
                </div>
                <p class="text-slate-500 text-sm px-6 flex items-center justify-center -mt-1">Tap to view.</p>
            </div>
        </a>
        @endforeach
    </div>

    <h2 class="text-2xl font-bold">Live Events</h2><br>
    <div class="grid grid-cols-3 gap-2 gap-y-2 mx-auto pb-3">
        @foreach ($liveEvents as $event)
        <a href="{{ route('viewEvent', ['id' => $event->event_id]) }}" class="group block mx-auto rounded-lg overflow-hidden hover:shadow-xl transform hover:scale-105 bg-white ring-1 ring-slate-900/5 shadow-lg hover:bg-sky-500 hover:ring-sky-500 transition-all duration-300 ease-in-out" style="width: 350px; height: 160px; border-radius: 15px;">
            <div class="flex flex-col h-full">
                <div class="flex items-center justify-center p-6">
                    <svg class="h-6 w-6 stroke-sky-500 group-hover:stroke-white" fill="none" viewBox="0 0 24 24"><!-- ... --></svg>
                    <h3 class="text-slate-900 text-lg font-semibold ml-2">
                        <span class="font-bold">{{ $event->name }}</span>
                    </h3>
                </div>
                <p class="text-slate-500 text-sm px-6 flex items-center justify-center -mt-1">Tap to view.</p>
            </div>
        </a>
        @endforeach
    </div>

    <h2 class="text-2xl font-bold">Archive Events</h2><br>
    <div class="grid grid-cols-3 gap-2 gap-y-2 mx-auto pb-3">
        @foreach ($archivedEvents as $event)
        <a href="{{ route('viewEvent', ['id' => $event->event_id]) }}" class="group block mx-auto rounded-lg overflow-hidden hover:shadow-xl transform hover:scale-105 bg-white ring-1 ring-slate-900/5 shadow-lg hover:bg-sky-500 hover:ring-sky-500 transition-all duration-300 ease-in-out" style="width: 350px; height: 160px; border-radius: 15px;">
            <div class="flex flex-col h-full">
                <div class="flex items-center justify-center p-6">
                    <svg class="h-6 w-6 stroke-sky-500 group-hover:stroke-white" fill="none" viewBox="0 0 24 24"><!-- ... --></svg>
                    <h3 class="text-slate-900 text-lg font-semibold ml-2">
                        <span class="font-bold">{{ $event->name }}</span>
                    </h3>
                </div>
                <p class="text-slate-500 text-sm px-6 flex items-center justify-center -mt-1">Tap to view.</p>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection
