@extends('layout.userheader')

@section('cards')
<div class="flex flex-row justify-center mx-auto pb-3 ">
    @foreach ( $events as $event)
        
    <a href="{{route('generate',['event_id'=> $event->id])}}" class="group block max-w-sm mx-auto  rounded-lg p-6 bg-white ring-1 ring-slate-900/5 shadow-lg space-y-3 hover:bg-sky-500 hover:ring-sky-500">
        <div class="flex items-center min-h-24 space-x-3">
          <svg class="h-6 w-6 stroke-sky-500 group-hover:stroke-white" fill="none" viewBox="0 0 24 24"><!-- ... --></svg>
          <h3 class="text-slate-900 group-hover:text-white text-sm font-semibold">{{$event->name}}</h3>
        </div>
        <p class="text-slate-500 group-hover:text-white text-sm">Create a new project from a variety of starting templates.</p>
      </a>
      @endforeach
    
   
</div>
@endsection