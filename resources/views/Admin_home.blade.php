@extends('layout.header')


@section('header_content')
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Registration
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="admin">Bulk Upload</a></li>
    <li><a class="dropdown-item" href="individualReg">Individual Registration</a></li>
    <li><a class="dropdown-item" href="#">Something else here in future</a></li>
  </ul>
</div>
@endsection

@section('main_head')
    Admin   
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
