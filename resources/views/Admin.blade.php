@extends('layout.adminheader')




  
  
  


@section('header')
    Bulk Upload
@endsection


@section('main_content')
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
      <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" data-bs-toggle="modal" data-bs-target="#exampleModal">Submit</button>

    </div>
  </div>
  {{-- riya ka style --}}


  <style>
    .progress {
        position: relative;
        width: 100%;
        background-color: #c9cfc9;
    }

    .bar {
        background-color: #2dcf2d;
        width: 0%;
        height: 100px;
    }

    .percent {
        position: absolute;
        display: inline-block;
        left: 50%;
        color: #040608;
    }
</style>



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
        <a href="http://localhost:8000/data-template.csv" class="btn btn-success" download="template.csv">
                    Download CSV Template
        </a>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#uploadModal">Upload file</button>
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

                    <div class="progress">
                        <div class="bar"></div>
                        <div class="percent">0%</div>
                    </div>

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



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        var bar = $(".bar");
        var percent = $(".percent");

        $('#uploadForm').ajaxForm({
            beforeSend: function() {
                var percentVal = '0%';
                bar.width(percentVal);
                percent.html(percentVal);
            },
            uploadProgress: function(event, position, total, percentComplete) {
                var percentVal = percentComplete + '%';
                bar.width(percentVal);
                percent.html(percentVal);
            },
            complete: function(res) {
                console.log(res);
                alert("File has been uploaded");
            }
        });
    });
</script>



















 

