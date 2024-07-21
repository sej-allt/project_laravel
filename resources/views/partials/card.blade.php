{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('header')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              clifford: '#da373d',
            }
          }
        }
      }
    </script>
    <style type="text/tailwindcss">
        @layer utilities {
          .content-auto {
            content-visibility: auto;
          }
        }
      </style>
</head>
<body> --}}
    
{{-- 
<div class="grid grid-cols-3 gap-2 gap-y-2 m-auto pb-3 ">
    @for ($i = 0; $i < 3; $i++)
    
   
    <a href="{{ route('viewEvent') }}" class="group block max-w-sm mx-auto rounded-lg p-6 bg-white ring-1 ring-slate-900/5 shadow-lg space-y-3 hover:bg-sky-500 hover:ring-sky-500">
        <div class="flex items-center space-x-3">
          <svg class="h-6 w-6 stroke-sky-500 group-hover:stroke-white" fill="none" viewBox="0 0 24 24"><!-- ... --></svg>
          <h3 class="text-slate-900 group-hover:text-white text-sm font-semibold">New project</h3>
        </div>
        <p class="text-slate-500 group-hover:text-white text-sm">Create a new project from a variety of starting templates.</p>
      </a>
      @endfor
    
   
</div> --}}
{{-- </body>
</html> --}}


{{-- <div class="grid grid-cols-3 gap-2 gap-y-2 m-auto pb-3">
    @foreach ($criterias as $criteria)
        <a href="{{ route('viewEvent', ['id' => $criteria->event_id]) }}" class="group block max-w-sm mx-auto rounded-lg p-6 bg-white ring-1 ring-slate-900/5 shadow-lg space-y-3 hover:bg-sky-500 hover:ring-sky-500">
            <div class="flex items-center space-x-3">
                <svg class="h-6 w-6 stroke-sky-500 group-hover:stroke-white" fill="none" viewBox="0 0 24 24"><!-- ... --></svg>
                <h3 class="text-slate-900 group-hover:text-white text-sm font-semibold">{{ $criteria->event_id }}</h3>
            </div>
            <p class="text-slate-500 group-hover:text-white text-sm">Create a new project from a variety of starting templates.</p>
        </a>
    @endforeach
</div>   --}}
{{-- 
<div class="grid grid-cols-3 gap-2 gap-y-2 m-auto pb-3">
    @foreach ($criterias as $criteria)
        <a href="{{ route('viewEvent', ['id' => $criteria->event_id]) }}" class="group block max-w-sm mx-auto rounded-lg p-6 bg-white ring-1 ring-slate-900/5 shadow-lg space-y-3 hover:bg-sky-500 hover:ring-sky-500">
            <div class="flex items-center space-x-3">
                <svg class="h-6 w-6 stroke-sky-500 group-hover:stroke-white" fill="none" viewBox="0 0 24 24"><!-- ... --></svg>
                <h3 class="text-slate-900 group-hover:text-white text-sm font-semibold">
                    <span class="font-bold text-lg">{{ $criteria->event_id }}</span>
                </h3>
            </div>
            <p class="text-slate-500 group-hover:text-white text-sm">Create a new project from a variety of starting templates.</p>
        </a>
    @endforeach
</div> --}}
<div class="grid grid-cols-3 gap-2 gap-y-2 mx-auto pb-3">
    @foreach ($criterias as $criteria)
    <a href="{{ route('viewEvent', ['id' => $criteria->event_id]) }}" class="group block mx-auto rounded-lg overflow-hidden hover:shadow-xl transform hover:scale-105 bg-white ring-1 ring-slate-900/5 shadow-lg hover:bg-sky-500 hover:ring-sky-500 transition-all duration-300 ease-in-out" style="width: 350px; height: 100px; border-radius: 15px;">
        <div class="flex flex-col h-full">
            <div class="flex items-center justify-center p-6">
                <svg class="h-6 w-6 stroke-sky-500 group-hover:stroke-white" fill="none" viewBox="0 0 24 24"><!-- ... --></svg>
                <h3 class="text-slate-900 text-lg font-semibold ml-2">
                    <span class="font-bold">{{ $criteria->event_id }}</span>
                </h3>
            </div>
            <p class="text-slate-500 text-sm px-6 flex items-center justify-center -mt-1">Tap to view.</p>
        </div>
    </a>
    @endforeach
</div>





