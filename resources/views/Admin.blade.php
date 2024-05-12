<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    
  </head>
  <body>
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
      <div class = "position-absolute top-50 start-50 translate-middle">
    <button type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#exampleModal">
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
    
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>



