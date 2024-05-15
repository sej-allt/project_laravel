@extends('layout.adminheader')


{{-- 
<style>
  /* Show dropdown menu on hover */
  #dropdownHoverButton:hover + #dropdownHover,
  #dropdownHover:hover {
    display: block;
  }
</style>
     --}}


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
@section('cards')
  @include('partials.card')
@endsection

@section('header')
    Admin   
@endsection

{{-- 
@section('notification')
{{-- <div class="ml-4 flex items-center md:ml-6">
              <button type="button" href="#" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                <span class="absolute -inset-1.5"></span>
                <span class="sr-only">View notifications</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                </svg>
              </button> --}}

{{-- 
              <div class="ml-4 flex items-center md:ml-6">
    <a href="{{route('viewRequests')}}" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
        <span class="absolute -inset-1.5"></span>
        <span class="sr-only">View notifications</span>
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
        </svg>
    </a>
</div>
@endsection --}} 



{{-- 




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
</script> --}}