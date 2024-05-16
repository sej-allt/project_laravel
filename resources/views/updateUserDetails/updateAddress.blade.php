@extends('layout.userheader')



@section("header")
    Update Address
@endsection

@section("main_content")

<body>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        {{-- <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Update Address</h2>
        </div> --}}

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
         <form action="{{ route('updateUserDataAddress') }}" method="POST">
            

                @csrf

{{--                
                <div class="mb-4">
                    <label for="student_id" class="block text-sm font-medium leading-6 text-gray-900">Student ID</label>
                    <input id="student_id" name="student_id" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div> --}}

                <div class="mb-4">
                    <label for="address" class="block text-sm font-medium leading-6 text-gray-900">New Address</label>
                    <input id="address" name="address" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>

                {{-- <div class="mb-4">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                    <input id="password" name="password" type="password" autocomplete="new-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div> --}}

               

                <div>
                    <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                       Submit
                    </button>
                </div>
            </form>
             @if (session('success'))
            <div class="mt-4 text-green-600 text-center">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="mt-4 text-red-600 text-center">{{ session('error') }}</div>
        @endif

        @if ($errors->any())
            <div class="mt-4 text-red-600 text-center">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
@endsection

@section('logout')
    <div class="relative"> <!-- Added margin-right for spacing -->
                <a href="{{ route('logout') }}" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" type="button">
                  <span class="sr-only">Logout</span>
                  <img class="w-8 h-8 rounded-full" src="https://toppng.com/uploads/preview/free-login-logout-black-icon-116420824011bgykrtibc.png" alt="user photo">
                </a>
              </div>
@endsection



{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Address</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Update Address</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
         <form action="{{ route('updateUserDataAddress') }}" method="POST">
            

                @csrf

               
                <div class="mb-4">
                    <label for="student_id" class="block text-sm font-medium leading-6 text-gray-900">Student ID</label>
                    <input id="student_id" name="student_id" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>

                <div class="mb-4">
                    <label for="address" class="block text-sm font-medium leading-6 text-gray-900">New Address</label>
                    <input id="address" name="address" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                    <input id="password" name="password" type="password" autocomplete="new-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>

               

                <div>
                    <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                       Submit
                    </button>
                </div>
            </form>

            @if (session('success'))
                <div class="mt-4 text-green-600 text-center">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="mt-4 text-red-600 text-center">{{ session('error') }}</div>
            @endif

            @if ($errors->any())
                <div class="mt-4 text-red-600 text-center">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</body>
</html> --}}




