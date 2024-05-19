<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>File Upload</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
  <style>
    .progress{
      position: relative;
      width:50%;
      background-color: #c9cfc9;
    }
    .bar{
      background-color: #2dcf2d;
      width:0%;
      height:20px;
    }
    .percent{
      position: absolute;
      display: inline-block;
      left: 50%;
      color: #040608;
    }
  </style>
</head>
<body>
  <h1> File Upload</h1>
  <form action="{{url('/store')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <input type="file" name="file" required>
  <div class="progress">
    <div class="bar"></div>
    <div class="percent">0%</div>
  </div>
  <br><br>
  <input type="submit" value="Upload">
</form>
<script type="text/javascript">
  $(document).ready(function()){
    var bar=$(".bar");
    var percent= $(".percent");

    $('form').ajaxForm({

      beforeSend:function(){
        var percentVal= '0%';
        bar.width(percentVal);
        percent.html(percentVal);
      },
      uploadProgress:function(event, position, total, percentComplete){
        var percentVal= percentComplete+'%';
        bar.width(percentVal);
        percent.html(percentVal);
      },
      complete:function(res){
        console:log(res);
        alert("File has been uploaded");
      }

    });
  }
</script>
  
</body>
</html>