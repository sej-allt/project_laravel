@extends('layout.header')

@section('header_content')
    <a href="home" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Dashboard</a>
@endsection

@section('dropdown')


    <!-- Profile dropdown -->
              <<div class="relative">
                <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" type="button">
                  <span class="sr-only">Open user menu</span>
                  <img class="w-8 h-8 rounded-full" src="https://i.pinimg.com/originals/23/57/24/235724d60503e6429c4a621f35a42fbe.jpg" alt="user photo">
                </button>
                
                <!-- Dropdown menu -->
                <div id="dropdownAvatar" class="absolute top-full z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                  <div class="px-4 py-3 text-sm text-black dark:text-white"> <!-- Changed text color to black -->
                    <div>Bonnie Green</div>
                    <div class="font-medium truncate">name@flowbite.com</div>
                  </div>
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
              </div>
              
            
            <script>
            document.getElementById('dropdownUserAvatarButton').addEventListener('click', function() {
              var dropdownMenu = document.getElementById('dropdownAvatar');
              dropdownMenu.classList.toggle('hidden');
            });
          </script>


  @endsection


@section("main_head")
    Profile
@endsection

@section("main_content")
    
<div>
    <div class="px-4 sm:px-0">
      <h3 class="text-base font-semibold leading-7 text-gray-900">Student Information</h3>
      <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Personal details and application.</p>
    </div>
    <div class="mt-6 border-t border-gray-100">
      <dl class="divide-y divide-gray-100">
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
          <dt class="text-sm font-medium leading-6 text-gray-900">Full name</dt>
          <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$user->student_name}}</dd>
        </div>
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
          <dt class="text-sm font-medium leading-6 text-gray-900">Student ID</dt>
          <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$user->student_id}}</dd>
        </div>
        {{-- <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
          <dt class="text-sm font-medium leading-6 text-gray-900">Father Name</dt>
          <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$user->father_name}}</dd>
          <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        </div> --}}
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
          <dt class="text-sm font-medium leading-6 text-gray-900">Email</dt>
          <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$user->email}}</dd>
        </div>
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
          <dt class="text-sm font-medium leading-6 text-gray-900">Father Name</dt>
          <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$user->father_name}}</dd>
        </div>
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
          <dt class="text-sm font-medium leading-6 text-gray-900">Phone Number</dt>
          <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$user->phone_number}}</dd>
        </div>
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
          <dt class="text-sm font-medium leading-6 text-gray-900">Campus</dt>
          <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{$user->campus}}</dd>
        </div>
        
              </li>
            </ul>
          </dd>
        </div>
      </dl>
    </div>
  </div>
  
@endsection