<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Marks</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Update Marks</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form action="{{route('reqAdmin') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="student_id" class="block text-sm font-medium leading-6 text-gray-900">Student ID</label>
                    <input id="student_id" name="student_id" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>

                <div class="mb-4">
                    <label for="class" class="block text-sm font-medium leading-6 text-gray-900">Class/Semester</label>
                    <select id="class" name="class" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                      <option value="Class 10">Class 10</option>
    <option value="Class 12">Class 12</option>
    <option value="1st Semester">1st Semester</option>
    <option value="2nd Semester">2nd Semester</option>
    <option value="3rd Semester">3rd Semester</option>
    <option value="4th Semester">4th Semester</option>
    <option value="5th Semester">5th Semester</option>
    <option value="6th Semester">6th Semester</option>
    <option value="7th Semester">7th Semester</option>
    <option value="8th Semester">8th Semester</option>
    <option value="9th Semester">9th Semester</option>
    <option value="10th Semester">10th Semester</option>
                      
                     
                    </select>
                </div>

                <div class="mb-4">
                    <label for="new_marks" class="block text-sm font-medium leading-6 text-gray-900">New Marks</label>
                    <input id="new_marks" name="new_marks" type="number" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                    <input id="password" name="password" type="password" autocomplete="new-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>

                  <div class="mt-4 text-sm text-gray-600 text-center">
            <span class="text-red-600">*</span> Note: Admin Permission is required to update marks
        </div>
        <br>

                <div>
                    <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                      Send Request to Admin
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
</html>
