<!DOCTYPE html>
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
<body class="min-h-screen bg-gray-300">
    <div class="w-full bg-gray-700 rounded-b-[40px]">
        <nav class="bg-gray-800 m-auto rounded-lg w-4/5 h-12 underline">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-12 items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <a class="text-white font-medium text-medium" href="{{ route('admin') }}">Admin</a>
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <a href="{{ route('admin') }}" class="{{ Request::is('Admin_home') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} hover:no-underline rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Dashboard</a>

                                <div class="relative inline-block">
                                    <button id="dropdown" class="{{ Request::is('admin') || Request::is('individualReg') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 h-13 text-sm font-medium" type="button">User Registration</button>
                                    <div id="dropdownHover" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 absolute top-full left-0 mt-0">
                                        <ul class="py-2 text-sm text-black dark:text-white" aria-labelledby="dropdown">
                                            <li>
                                                <a href="{{ route('bulk') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">Bulk Upload</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('individualReg') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">Individual Registration</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <a href="{{ route('create_event') }}" class="{{ Request::is('create_event') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} hover:no-underline rounded-md px-3 py-2 text-sm font-medium">Add Event</a>

                                <a href="{{ route('list') }}" class="{{ Request::is('list') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} hover:no-underline rounded-md px-3 py-2 text-sm font-medium">Student List</a>
                                <a href="{{ route('email.create') }}" class="{{ Request::is('email.create') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} hover:no-underline rounded-md px-3 py-2 text-sm font-medium">Update-Email-content</a>

                                @yield('navbar')
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            <a href="{{ route('viewRequests') }}">
                                <button type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                                    <span class="sr-only">View notifications</span>
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                                    </svg>
                                </button>
                            </a>

                            <!-- Profile dropdown -->
                            <div class="relative inline-block">
                                <button id="profileDropdown" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" type="button">
                                    <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                </button>
                                <div id="profileDropdownHover" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-40 dark:bg-gray-700 absolute top-full left-0 mt-0">
                                    <ul class="py-2 text-sm text-black dark:text-white" aria-labelledby="profileDropdown">
                                        <li>
                                            <a href="{{ route('logout') }}" class="block px-2 py-1 font-medium text-center text-sm hover:underline dark:hover:underline">Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <header>
            <div class="mx-auto w-full px-4 pt-1 pb-3 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-slate-50">@yield('header')</h1>
            </div>
        </header>
        @yield('cards')
    </div>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            @yield('main_content')
        </div>
    </main>

    <style>
        /* Show dropdown menu on hover */
        #dropdown:hover + #dropdownHover,
        #dropdownHover:hover,
        #profileDropdown:hover + #profileDropdownHover,
        #profileDropdownHover:hover {
            display: block;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>