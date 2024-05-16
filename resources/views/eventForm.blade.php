@extends('layout.adminheader')

@section('header')
    Create Event
@endsection

@section('main_content')

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




<div class="bg-white w-4/5 mx-auto border-2 shadow rounded-[20px] p-3">
    <form action="{{ route('create_event') }}" class="mx-auto px-3" method="POST">
        @csrf
        <div class="mb-3">
            <h2 class="text-lg font-medium mb-1">Event Name<span class="text-red-500">*</span></h2>
            <div class="relative">
                <input type="text" class="form-control rounded-[20px] bg-gray-50 text-sm w-full" name="name" id="event_name" placeholder="Enter Event Name" value="{{ old('name') }}" required>
            </div>
            <span class="text-danger" style="color: red;">@error('name') {{ $message }} @enderror</span>
        </div>

        <div class="mb-3">
            <h2 class="text-lg font-medium mb-1">Event Date<span class="text-red-500">*</span></h2>
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label for="start_date" class="block mb-1 text-sm font-medium text-gray-900 dark:text-black">From:</label>
                    <div class="relative">
                        <input type="date" id="start_date" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="startdate" required>
                    </div>
                </div>
                <div>
                    <label for="end_date" class="block mb-1 text-sm font-medium text-gray-900 dark:text-black">To:</label>
                    <div class="relative">
                        <input type="date" id="end_date" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="enddate" required>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mb-3">
            <h2 class="text-lg font-medium mb-1">Event Time<span class="text-red-500">*</span></h2>
            <div class="grid grid-cols-2 gap-6">
                <div class="relative">
                    <label for="start_time" class="block mb-1 text-sm font-medium text-gray-900 dark:text-black">From:</label>
                    <input type="time" id="start_time" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="starttime"  value="00:00" required>
                </div>
                <div class="relative">
                    <label for="end_time" class="block mb-1 text-sm font-medium text-gray-900 dark:text-black">To:</label>
                    <input type="time" id="end_time" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="endtime"  value="00:00" required>
                </div>
            </div>
        </div>
        
        
        <div class="mb-3">
            <div class="flex items-center mb-1">
                <h2 class="text-lg font-medium mr-2">10th Grade<span class="text-red-500">*</span></h2>
                <label for="marks10" class="block text-sm font-medium text-gray-900 dark:text-white">Marks in 10th:</label>
            </div>
            <div class="relative">
                <input type="text" class="form-control rounded-[20px] bg-gray-50 text-sm w-full" placeholder="Enter marks in 10th" name="marks10" id="marks10" value="{{ old('marks10') }}" required>
            </div>
            <span class="text-danger" style="color: red;">@error('marks10') {{ $message }} @enderror</span>
        </div>
        
        <div class="mb-3">
            <div class="flex items-center mb-1">
                <h2 class="text-lg font-medium mr-2">12th Grade<span class="text-red-500">*</span></h2>
                <label for="marks12" class="block text-sm font-medium text-gray-900 dark:text-white">Marks in 12th:</label>
            </div>
            <div class="relative">
                <input type="text" class="form-control rounded-[20px] bg-gray-50 text-sm w-full" placeholder="Enter marks in 12th" name="marks12" id="marks12" value="{{ old('marks12') }}" required>
            </div>
            <span class="text-danger" style="color: red;">@error('marks12') {{ $message }} @enderror</span>
        </div>
        
        <div class="mb-3">
            <div class="flex items-center mb-1">
                <h2 class="text-lg font-medium mr-2">Cgpa<span class="text-red-500">*</span></h2>
                <label for="cgpa" class="block text-sm font-medium text-gray-900 dark:text-white">Cgpa:</label>
            </div>
            <div class="relative">
                <input type="text" class="form-control rounded-[20px] bg-gray-50 text-sm w-full" placeholder="Enter CGPA" name="cgpa" id="cgpa" value="{{ old('cgpa') }}" required>
            </div>
            <span class="text-danger" style="color: red;">@error('cgpa') {{ $message }} @enderror</span>
        </div>
        
        <div class="mb-3">
            <div class="flex items-center mb-1">
                <h2 class="text-lg font-medium mr-2">Campus<span class="text-red-500">*</span></h2>
                <label for="campus" class="block text-sm font-medium text-gray-900 dark:text-white">Campus:</label>
            </div>
            <div class="relative">
                <input type="text" class="form-control rounded-[20px] bg-gray-50 text-sm w-full" placeholder="Enter Campus" name="campus" id="campus" value="{{ old('campus') }}" required>
            </div>
            <span class="text-danger" style="color: red;">@error('campus') {{ $message }} @enderror</span>
        </div>
        
        
        <div class="flex justify-center items-center my-0">
            <button type="submit" class="tracking-wide text-white bg-gray-700 hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 text-center  mb-1 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Submit</button>
        </div>
    </form>
</div>


@endsection
