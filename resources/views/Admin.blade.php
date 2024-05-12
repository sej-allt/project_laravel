<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>

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
</head>
<body>
<div class="container mt-5">
    <div class="position-absolute top-50 start-50 translate-middle">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Bulk Data Upload
        </button>
        <div><a href="{{route('logout')}}"><button type="button" class="btn btn-outline-success my-2 mx-4 btn-sm px-4">log-out</button></a></div>
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
</body>
</html>
