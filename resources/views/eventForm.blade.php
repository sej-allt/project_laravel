@extends('layout.adminheader')

@section('header')
    Create Event
@endsection

@section('main_content')

<div class="bg-white w-4/5 mx-auto border-2 shadow rounded-[20px] p-3">
    <form action="{{url('/create_event')}}" class="mx-auto px-3" method="POST">
        @csrf
        <div class="mb-5">
            <h2 class="text-lg font-medium mb-2">Event Name</h2>
            <div class="relative">
                <span class="absolute top-0 left-0 mt-1 mr-2 text-red-500">*</span>
                <input type="text" class="form-control rounded-[20px] bg-gray-50 text-sm w-full" name="name" id="event_name" placeholder="Enter Event Name" value="{{old('event_name')}}" required>
            </div>
            <span class="text-danger" style="color: red;">@error('event_name') {{$message}} @enderror</span>
        </div>

        {{-- <div class="mb-5">
            <h2 class="text-lg font-medium mb-2">Event Date</h2>
            <div class="grid grid-cols-2 gap-6">
                <div class="relative">
                    <div class="flex items-center">
                        <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">From Date:</label>
                        <input type="date" id="start_date" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="startdate" required>
                    </div>
                </div>
                <div class="relative">
                    <div class="flex items-center">
                        <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">To Date:</label>
                        <input type="date" id="end_date" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="enddate" required>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mb-5">
            <h2 class="text-lg font-medium mb-2">Event Time</h2>
            <div class="grid grid-cols-2 gap-6">
                <div class="relative">
                    <label for="start_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">From Time:</label>
                    <input type="time" id="start_time" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="starttime" min="09:00" max="18:00" value="09:00" required>
                </div>
                <div class="relative">
                    <label for="end_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">To Time:</label>
                    <input type="time" id="end_time" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="endtime" min="09:00" max="18:00" value="18:00" required>
                </div>
            </div>
        </div> --}}
        

        <div class="mb-5">
            <h2 class="text-lg font-medium mb-2">10th Grade</h2>
            <div class="relative">
                <label for="marks10" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Marks in 10th:</label>
                <input type="text" class="form-control rounded-[20px] bg-gray-50 text-sm w-full" placeholder="Enter marks in 10th" name="marks10" id="marks10" value="{{old('marks10')}}" required>
                <span class="absolute top-0 left-0 mt-1 mr-2 text-red-500">*</span>
            </div>
            <span class="text-danger" style="color: red;">@error('marks10') {{$message}} @enderror</span>
        </div>

        <div class="mb-5">
            <h2 class="text-lg font-medium mb-2">12th Grade</h2>
            <div class="relative">
                <label for="marks12" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Marks in 12th:</label>
                <input type="text" class="form-control rounded-[20px] bg-gray-50 text-sm w-full" placeholder="Enter marks in 12th" name="marks12" id="marks12" value="{{old('marks12')}}" required>
                <span class="absolute top-0 left-0 mt-1 mr-2 text-red-500">*</span>
            </div>
            <span class="text-danger" style="color: red;">@error('marks12') {{$message}} @enderror</span>
        </div>
        
        
        <div class="mb-5">
            <h2 class="text-lg font-medium mb-2">Cgpa</h2>
            <div class="relative">
                <label for="marks12" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cgpa:</label>
                <input type="text" class="form-control rounded-[20px] bg-gray-50 text-sm w-full" placeholder="Enter marks in 12th" name="cgpa" id="cgpa" value="{{old('marks12')}}" required>
                <span class="absolute top-0 left-0 mt-1 mr-2 text-red-500">*</span>
            </div>
            <span class="text-danger" style="color: red;">@error('marks12') {{$message}} @enderror</span>
        </div>

        <div class="mb-5">
            <h2 class="text-lg font-medium mb-2">Campus</h2>
            <div class="relative">
                <label for="campus" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Campus:</label>
                <input type="text" class="form-control rounded-[20px] bg-gray-50 text-sm w-full" placeholder="Enter Campus" name="campus" id="campus" value="{{old('campus')}}" required>
                <span class="absolute top-0 left-0 mt-1 mr-2 text-red-500">*</span>
            </div>
            <span class="text-danger" style="color: red;">@error('campus') {{$message}} @enderror</span>
        </div>
        <div class="flex justify-center items-center my-0">
            <button type="submit" class=" tracking-wide text-white bg-gray-700 hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 text-center  mb-1 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Submit</button>
          </div>
       
    </form>
</div>

@endsection
