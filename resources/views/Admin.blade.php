@extends('layout.adminheader')

@section('dashhead')
    Bulk Upload
@endsection

@section('main-content')
 {{-- {{ dd(session()->has('errors'))}} --}}
 @if(session()->has('errors'))

 <?php
   $errors = session('errors');
   $size = count($errors);
 //  dd($errors);
 ?>
   @extends((session()->has('errors'))?'partials.erroralert':'partials.sample')
 
   @section('head')
     There are {{$size}} errors in the uploaded file :
   @endsection
   @section('content')
       <ul class="list-disc list-outside font-normal">
       @foreach ($errors as $error )
         <li>{{$error}}</li>
       @endforeach
       </ul>
   @endsection
   @section('footmessage')
     Kindly correct the errors and refresh the page.
   @endsection

 @endif
 @if (session()->has('status'))
     @if (session('status')=='success')
         @extends((session('status')=='success')?'partials.successalert':'partials.sample')
         @section('head')
           Data successfully added to the records.
         @endsection
     @endif
 @endif
<div class="container mt-5">
  <div class="position-absolute top-50 start-50 translate-middle">
    <div class="flex justify-center items-center">
      <button type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800" data-bs-toggle="modal" data-bs-target="#exampleModal">BULK DATA UPLOAD </button>
    </div>
  </div>
{{-- <div><a href="{{route('logout')}}"><button type="button" class="btn btn-outline-success my-2 mx-4 btn-sm px-4">log-out</button></a></div> --}}
</div>

<div class="modal fade" id="exampleModal"data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <h1 class="modal-title fs-5" id="ModalLabel">Upload Data</h1>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
  <div class="modal-body">
        <a href="http://localhost:8000/data-template.csv" class="btn bg-gray-600" download="template.csv">
                    Download CSV Template
        </a>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn bg-gray-800 text-white  hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-3 text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800" data-bs-toggle="modal" data-bs-target="#uploadModal">Upload file</button>
  </div>
</div>
</div>
</div>

<!-- Upload file -->

<!-- Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Upload CSV File</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form to upload CSV file -->
                <form action="/upload-csv" method="POST" enctype="multipart/form-data">
                    <!-- CSRF token -->
                    <!-- Add the @csrf directive in your Laravel Blade file -->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <!-- File input for uploading CSV -->
                    <div class="mb-3">
                        <label for="csvFile" class="form-label">Choose CSV File</label>
                        <input type="file" name="csvFile" id="csvFile" class="form-control" accept=".csv" required>
                    </div>

                    <!-- Upload button -->
                    <button type="submit" class="btn btn-success">Upload</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div>


@endsection























 

