{{-- @extends('layout.adminheader')




  
  
  


@section('header')
    Bulk Upload
@endsection


@section('main_content')
 {{-- {{ dd(session()->has('errors'))}} --}}
 {{-- @if(session()->has('errors'))

 <?php
  //  $errors = session('errors');
  //  $size = count($errors); --}}
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
{{-- </div>

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

@endsection --}} 





@extends('layout.header')

@section('header_content')
    <a href="Admin_home" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Home</a>
@endsection

@section('content')

<section class="section-6 pt-5">
  <div class="container">
    <div class="row">            
      <div class="col-md-3 sidebar">
        <div class="sub-title">
          <h2>Courses</h2>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="accordion accordion-flush" id="accordionExample">                          
              @if($courses->isNotEmpty())                        
                @foreach ($courses as $key => $course)
                  <div class="accordion-item">                                                   
                    @if($course->sub_course->isNotEmpty())
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-{{$key}}" aria-expanded="false" aria-controls="collapseOne-{{$key}}">
                          {{$course->name}}
                        </button>
                      </h2>
                    @else
                      <a href="#" class="nav-item nav-link">{{$course->name}}</a>                                       
                    @endif
                  </div>                            
                @endforeach
              @endif
            </div>
          </div>
        </div>
        <div class="sub-title mt-5">
          <h2>Marks</h2>
        </div>
        <div class="card">
          <div class="card-body">
            @if($marks->isNotEmpty())
              @foreach ($marks as $mark)
                <div class="form-check mb-2">
                  <input class="form-check-input" type="checkbox" name="marks[]" value="{{$mark->id}}" id="marks-{{$mark->id}}">
                  <label class="form-check-label" for="marks-{{$mark->id}}">
                    {{$mark->name}}
                  </label>
                </div>  
              @endforeach
            @endif                                  
          </div>
        </div>
        <div class="sub-title mt-5">
          <h2>cgpa</h2>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="form-check mb-2">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                {{$cgpa->name}}
              </label>
            </div>                 
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection


 <!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              clifford: '#da373d',
            }
          }
        }
      }
    </script>
    <style type="text/tailwindcss">
      @layer utilities {
        .content-auto {
          content-visibility: auto;
        }
      }
    </style>
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

    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    
  </head>
  <body>
  
  
  


@section('main_head')
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
{{-- <div><a href="{{route('logout')}}"><button type="button" class="btn btn-outline-success my-2 mx-4 btn-sm px-4">log-out</button></a></div> --}}
</div>

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
</head>
<body>
<div class="container mt-5">
    <div class="position-absolute top-50 start-50 translate-middle">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Bulk Data Upload
        </button>
        <div><a href="{{route('logout')}}"><button type="button" class="btn btn-outline-success my-2 mx-4 btn-sm px-4">log-out</button></a></div>
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

    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Upload CSV File</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                    <!-- Form to upload CSV file -->
                    <form action="/upload-csv" method="POST" enctype="multipart/form-data" id="uploadForm">
                        <!-- CSRF token -->
                        <!-- Add the @csrf directive in your Laravel Blade file -->
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                        <div class="progress">
                            <div class="bar"></div>
                            <div class="percent">0%</div>
                        </div>
                        <!-- File input for uploading CSV -->
                        <div class="mb-3">
                            <label for="csvFile" class="form-label"></label>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>


@endsection
</body>
</html>























 

