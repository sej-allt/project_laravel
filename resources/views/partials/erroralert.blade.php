<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Document</title>
</head>
<body>
    <div class="flex justify-center my-2 min-w-80">
        <div class="bg-red-50 text-red-800 px-4 py-2 rounded relative min-h-2 text-sm w-4/5" role="alert">
            <div class="text-red-800 flex space-x-2 sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill = "#fee2e2" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <div>
                    <div class="font-medium">
                        @yield('head')
                    </div>
                    <div class=" px-5">
                        @yield('content')
                        {{-- <ul class="list-disc list-outside font-normal">
                            <li>bjhhbj</li>
                            <li>ouhytfgjkhn</li>
                        </ul> --}}
                    </div>
                    <div class="font-medium">
                        @yield('footmessage')
                    </div>
                </div>
            </div>
        </div>
    </div>
        
</body>
</html>