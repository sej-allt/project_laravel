@extends('layout.header')


@section('header_content')


<!-- Button with hover dropdown -->
<div class="relative inline-block">
    <button id="dropdownHoverButton" class="text-white bg-gray-900 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-blue-800" type="button">
    Registration
    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
    </svg>
  </button>

  <!-- Dropdown menu -->
  <div id="dropdownHover" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 absolute top-full left-0 mt-1">
    <ul class="py-2 text-sm text-black dark:text-white" aria-labelledby="dropdownHoverButton"> <!-- Changed text color to dark -->
      <li>
        <a href="admin" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">Bulk Upload</a> <!-- Removed text color for hover state -->
      </li>
      <li>
        <a href="individualReg" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">Individual Registration</a> <!-- Removed text color for hover state -->
      </li>
      <li>
        <a href="{{route('email.create')}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">Update email</a> <!-- Removed text color for hover state -->
      </li>
    </ul>
  </div>
</div>

<style>
  /* Show dropdown menu on hover */
  #dropdownHoverButton:hover + #dropdownHover,
  #dropdownHover:hover {
    display: block;
  }
</style>
    


{{-- <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Registration
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="admin">Bulk Upload</a></li>
    <li><a class="dropdown-item" href="individualReg">Individual Registration</a></li>
    <li><a class="dropdown-item" href="{{route('email.create')}}">Update email</a></li>
  </ul>
</div> --}}
@endsection

@section('main_head')
    Admin   
@endsection


@section('notification')
{{-- <div class="ml-4 flex items-center md:ml-6">
              <button type="button" href="#" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                <span class="absolute -inset-1.5"></span>
                <span class="sr-only">View notifications</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                </svg>
              </button> --}}


              <div class="ml-4 flex items-center md:ml-6">
    <a href="{{route('viewRequests')}}" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
        <span class="absolute -inset-1.5"></span>
        <span class="sr-only">View notifications</span>
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
        </svg>
    </a>
</div>
@endsection








@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Check the status in the response
    const statusM = `{{ session('status') }}`;

    if (statusM === 'success') {
        // Display a pop-up alert for successful file upload
        alert('File uploaded and seeded successfully!');
    } else if (statusM === 'error') {
        // Display a pop-up alert for errors
        alert('An error occurred during file upload or seeding.');
    }
});
</script>