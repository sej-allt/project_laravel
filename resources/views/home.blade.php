{{-- @extends('layout.header')
@section('main_head')
    Welcome,{{$student_name}}   
@endsection
@section('main_content')
{!!"<h1>Content</h1>"!!}

@endsection --}}


@extends('layout.userheader')
{{-- @section('header_content')
    <a href="home" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Dashboard</a>
@endsection --}}

{{-- @section('dropdown')


    <!-- Profile dropdown -->
    
    <div class="flex">
      
      <div class="ml-4 flex items-center md:ml-6">
        <a href="{{route('viewRequests')}}" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
            <span class="absolute -inset-1.5"></span>
            <span class="sr-only">View notifications</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
            </svg>
        </a>
    </div>
    
      <div class="relative mr-4"> <!-- Added margin-right for spacing -->
        <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" type="button">
          <span class="sr-only">Open user menu</span>
          <img class="w-8 h-8 rounded-full" src="https://i.pinimg.com/originals/23/57/24/235724d60503e6429c4a621f35a42fbe.jpg" alt="user photo">
        </button>
    
        <!-- Dropdown menu -->
        <div id="dropdownAvatar" class="absolute top-full z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
          <div class="px-4 py-3 text-sm font-semibold text-black dark:text-white"> <!-- Changed text color to black and made it bold -->
            <div>{{$student_name}} </div>
            {{-- <div class="font-medium truncate">{{email}} </div> --}}
          {{-- </div>
          <ul class="py-2 text-sm text-black dark:text-white" aria-labelledby="dropdownUserAvatarButton"> <!-- Changed text color to black -->
            <li>
              <a href="profile" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
            </li>
            <li>
              <a href="{{ route('updateName') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Update Name</a>
            </li>
            <li>
              <a href="{{ route('updateEmail') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Update Email</a>
            </li>
            <li>
              <a href="{{ route('updatePhone') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Update Phone Number</a>
            </li>
            <li>
              <a href="{{ route('updateFatherName') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Update Father's Name</a>
            </li>
            <li>
              <a href="{{ route('updateAddress') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Update Address</a>
            </li>
            <li>
              <a href="{{ route('updateMarks') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Update Marks</a>
            </li>
          </ul>
          <div class="py-2">
            <a href="{{route('logout')}}" class="block px-4 py-2 text-sm text-black hover:text-white hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white dark:hover:text-white">Sign out</a> <!-- Changed default text color to black and hover text color to white -->
          </div>
        </div>
      </div> --}}
    
      <!-- Logout button -->
      {{-- <div class="relative"> <!-- Added margin-right for spacing -->
        <a href="{{ route('logout') }}" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" type="button">
          <span class="sr-only">Logout</span>
          <img class="w-8 h-8 rounded-full" src="https://toppng.com/uploads/preview/free-login-logout-black-icon-116420824011bgykrtibc.png" alt="user photo">
        </a>
      </div>
    </div> --}}


    
    {{-- <script>
    document.getElementById('dropdownUserAvatarButton').addEventListener('click', function() {
      var dropdownMenu = document.getElementById('dropdownAvatar');
      dropdownMenu.classList.toggle('hidden');
    });
  </script> --}}
    
    {{-- <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown button
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="profile">Profile</a></li>

                  
                     <li><a class="dropdown-item" href="{{ route('updateName') }}">Update Name</a></li>  
                     <li><a class="dropdown-item" href="{{ route('updateEmail') }}">Update Email</a></li>   
                    <li><a class="dropdown-item" href="{{ route('updatePhone') }}">Update Phone Number</a></li>  
                      <li><a class="dropdown-item" href="{{ route('updateFatherName') }}">Update Father's Name</a></li>  
                       
                    <li><a class="dropdown-item" href="{{ route('updateAddress') }}">Update Address</a></li>   
                       <li><a class="dropdown-item" href="{{ route('updateMarks') }}">Update Marks</a></li>  
                      <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li> 

                  {{-- <li><a class="dropdown-item" href="#">Something else here in future</a></li> 
                </ul>
              </div> --}}
  {{-- @endsection
  
@section('main_head')
    Welcome {{$student_name}}   
@endsection
@section('main_content')
{!!"<h1>Content</h1>"!!}

@endsection --}}