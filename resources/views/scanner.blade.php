<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>QR Code Scanner</title>
    <!-- Include instascan CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/instascan/1.0.0/instascan.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jsqr/dist/jsQR.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
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
        <form id="upload-form">
            <input type="file" accept="image/png" id="upload-input" name="image">
            <button type="button" id="upload-button">Upload</button>
        </form>
        <div id="scanned-result"></div>
    </div>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/schmich/instascan-builds@master/instascan.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let scanner = new Instascan.Scanner({
                video: document.getElementById('preview')
            });

            scanner.addListener('scan', function(content) {
                console.log("qwerty");
                console.log(content);
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
            document.getElementById('upload-button').addEventListener('click', function(event) {
                // event.preventDefault();
                // const formData = new FormData();
                // formData.append('image', document.getElementById('upload-input').files[0]);

                // axios.post("{{ route('scan-image') }}", formData, {
                //         headers: {
                //             'Content-Type': 'multipart/form-data',
                //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                //         }
                //     })
                //     .then(response => {
                //         // Handle response from backend
                //         console.log(response.data);
                //         document.getElementById('scanned-result').innerHTML = response.data.message;
                //         if (response.data.qr_content) {
                //             console.log('QR Code Content:', response.data.qr_content);
                //         } else {
                //             console.log('No QR Code detected in the image.');
                //         }
                //     })
                //     .catch(error => console.error('Error:', error));
                const file = document.getElementById('upload-input').files[0];
                if (!file) {
                    alert('Please select a file first');
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(event) {
                    const imageData = event.target.result;
                    decodeQRFromImage(imageData);
                };
                reader.readAsDataURL(file);
            });

            function decodeQRFromImage(imageData) {
                // Use jsQR library to decode QR code from image data
                // Add your code here to handle QR code decoding
                // Once decoded, call handleScannedData function
                const img = new Image();
                img.src = imageData;
                img.onload = function() {
                    const canvas = document.createElement('canvas');
                    const context = canvas.getContext('2d');
                    canvas.width = img.width;
                    canvas.height = img.height;
                    context.drawImage(img, 0, 0, canvas.width, canvas.height);
                    const imageData = context.getImageData(0, 0, canvas.width, canvas.height);

                    const code = jsQR(imageData.data, imageData.width, imageData.height);
                    if (code) {
                        console.log('QR code data:', code.data);
                        handleScannedData(code.data);
                    } else {
                        console.error('No QR code detected.');
                        alert('No QR code detected in the image.');
                    }
                };

            }

            function handleScannedData(content) {
                // Send the data to your Laravel backend for processing
                // displayScanningSuccess();
                console.log('Scanned QR code data:', content);
                axios.post("{{ route('scan') }}", {
                        qr_data: content
                    }, {
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => {
                        console.log(response);
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
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
