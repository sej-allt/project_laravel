@extends('layout.userheader')

@section('main_content')
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    {{-- <script src="https://cdn.jsdelivr.net/npm/qrcode"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Document</title>
</head>
<body>
    {{-- placholder for qr --}}
   {{-- @extends('layout.content')--}}
   <div class = " relative bg-white min-h-96 rounded-[20px]">
        <div class="  ">
    <div class = " inset-y-10 mr-5 pr-5 md:absolute end-0" id="qrcode"></div>
</div>

    </div>
    <script type="text/javascript">
        // Get the element where you want to render the QR code
        var qrCodeDiv = document.getElementById('qrcode');
        var event_id = {{session('event_id')}};
        var student_id = {{session('student_id')}};
        var data = student_id.toString() + ' ' + event_id.toString(); 
        // var data = "2345";
        // Create a QR code instance
        var qr = new QRCode(qrCodeDiv, {
            text: data, // Your QR code data
            width: 260,
            height: 260,
            colorDark : "#000000",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H // Error correction level
        });
    </script>
</body>
</html>
@endsection