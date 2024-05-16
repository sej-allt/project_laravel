<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>QR Code Scanner</title>
    <!-- Include instascan CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/instascan/1.0.0/instascan.min.css">
    <style>
        .scanning-indicator {
            width: 100%;
            text-align: center;
            margin-top: 10px;
        }

        .scanning-indicator .scanning-text {
            display: none;
            font-weight: bold;
        }

        .scanning-indicator .scanning-success {
            color: green;
            display: none;
        }

        .scanning-indicator .scanning-failure {
            color: red;
            display: none;
        }
    </style>
</head>

<body>
    <div class="container col-lg-6 py-5">
        <!-- Scanner -->
        <div class="card bg-white shadow rounded-3 p-3 border-0">
            <video id="preview"></video>
            <div id="scanned-result"></div>
            <div class="scanning-indicator">
                <span class="scanning-text">Scanning...</span>
                <span class="scanning-success">QR code scanned successfully!</span>
                <span class="scanning-failure">Failed to scan QR code. Please try again.</span>
            </div>
        </div>

        <!-- Upload Button -->
        <div>
            <input type="file" accept="image/*" id="upload-input">
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>QRCode</th>
                </tr>
            </table>
        </div>
    </div>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/schmich/instascan-builds@master/instascan.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
                    let scanner = new Instascan.Scanner({
                        video: document.getElementById('preview')
                    });

                    scanner.addListener('scan', function(content) {
                        handleScannedData(content);
                    });

                    Instascan.Camera.getCameras().then(function(cameras) {
                        if (cameras.length > 0) {
                            scanner.start(cameras[0]);
                        } else {
                            console.error('No cameras found.');
                        }
                    }).catch(function(e) {
                        console.error(e);
                    });

                    // Upload button event listener
                    document.getElementById('upload-input').addEventListener('change', function(event) {
                        const file = event.target.files[0];
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const imageData = e.target.result;
                            decodeQRFromImage(imageData);
                        };
                        reader.readAsDataURL(file);
                    });

                    function decodeQRFromImage(imageData) {
                        // Use jsQR library to decode QR code from image data
                        // Add your code here to handle QR code decoding
                        // Once decoded, call handleScannedData function
                        const decodedQR = jsQR(imageData);
                        if (decodedQR) {
                            handleScannedData(decodedQR.data); // Call handleScannedData with the decoded QR data
                        } else {
                            console.error('Failed to decode QR code from image');
                            displayScanningFailure();

                        }}

                        function handleScannedData(content) {
                            // Send the data to your Laravel backend for processing
                            displayScanningSuccess();
                            fetch("{{ route('scan') }}?qr_data"+encodeURIComponent(content), {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                    },
                                    body: JSON.stringify({
                                        qr_data: content
                                    })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    // Handle response from backend
                                    console.log(data);
                                    // Display result to the user if necessary
                                    window.location.href = "{{ route('scan') }}?qr_data=" + encodeURIComponent(content);
                                    document.getElementById('scanned-result').innerHTML = data.message;
                                })
                                .catch(error => console.error('Error:', error));
                        }

                        function displayScanningFailure() {
                            const scanningIndicator = document.querySelector('.scanning-indicator');
                            scanningIndicator.querySelector('.scanning-text').style.display = 'none';
                            scanningIndicator.querySelector('.scanning-success').style.display = 'none';
                            scanningIndicator.querySelector('.scanning-failure').style.display = 'block';
                        }
                    });
    </script>
</body>

</html>
