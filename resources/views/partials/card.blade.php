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

{{-- <div class="grid grid-cols-3 gap-2 gap-y-2 m-auto pb-3">
    @foreach ($criterias as $criteria)
        <a href="{{ route('viewEvent', ['id' => $criteria->event_id]) }}" class="group block max-w-sm mx-auto rounded-lg overflow-hidden hover:shadow-xl transform hover:scale-105 bg-white ring-1 ring-slate-900/5 shadow-lg hover:bg-sky-500 hover:ring-sky-500 transition-all duration-300 ease-in-out">
            <div class="flex items-center space-x-3 p-6">
                <svg class="h-6 w-6 stroke-sky-500 group-hover:stroke-white" fill="none" viewBox="0 0 24 24"><!-- ... --></svg>
                <h3 class="text-slate-900 text-lg font-semibold">
                    <span class="font-bold">{{ $criteria->event_id }}</span>
                </h3>
            </div>
            <p class="text-slate-500 text-sm px-6 pb-6">Create a new project from a variety of starting templates.</p>
        </a>
    @endforeach
</div> --}}

<div class="row clearfix">
  <div class="col-lg-5 col-md-12 col-sm-12">
    <div class="row clearfix top-report">

      @foreach ($criterias as $criteria)
        <a href="{{ route('viewEvent', ['id' => $criteria->event_id]) }}" class="group block my-2 max-w-xs mx-auto rounded-lg overflow-hidden hover:shadow-xl transform hover:scale-105 bg-white ring-1 ring-slate-900/5 shadow-lg hover:bg-sky-500 hover:ring-sky-500 transition-all duration-300 ease-in-out">
            {{-- <div class="flex items-center space-x-3 p-6">
                <svg class="h-6 w-6 stroke-sky-500 group-hover:stroke-white" fill="none" viewBox="0 0 24 24"><!-- ... --></svg>
                <h3 class="text-slate-900 text-lg font-semibold">
                    <span class="font-bold"></span>
                </h3>
            </div>
            <p class="text-slate-500 text-sm px-6 pb-6">Create a new project from a variety of starting templates.</p> --}}
            <div class="col-lg-6 col-md-6 col-sm-12">
              <div class="card w-[15rem]">
                <div class="body">
                  <h3 class="m-t-0">{{ $criteria->event_id }}</h3>
                  <p class="text-muted">sjdasj</p>
                  <div class="progress">
                    <div class="progress-bar l-green" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                  </div>
                  <small>4% higher than last month</small>							
                </div>							
              </div>
            </div>
        </a>
    @endforeach
      


    </div>
  </div>
</div>


