@extends('layout.adminheader')
@section('header')
Email Formatter
@endsection
@section('main_content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Email Content</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 0;
            color: #333;
            font-weight: 700;
            margin-bottom: 4px;

        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }

        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 12px;
            box-sizing: border-box;
            font-size: 16px;
            outline: none;
            /* Remove default outline */
            background-color: #fff;
            /* Background color */
            color: #333;
            /* Text color */
            cursor: pointer;
            /* Cursor style */
        }

        /* Style for selected option */
        select option[selected] {
            background-color: #007bff;
            /* Background color of selected option */
            color: #fff;
            /* Text color of selected option */

        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 12px;
            box-sizing: border-box;
        }

        textarea {
            height: 70px;
        }

        #emailbutton {
            /* background-color: #28a745; */
            color: #fff;
            border: none;
            padding: 10px 50px;
            border-radius: 20px;
            cursor: pointer;
        }

        #emailbutton:hover {
            /* background-color:#218838; */
        }

        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }
    </style>
</head>

<body>
    <div class="container mt-0 rounded-[20px] shadow">
        <h2>Create Email Content</h2>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="">
            <form method="POST" action="{{ route('email.store') }}">
                @csrf
                <label for="type">Type:</label>
                <select name="type" id="type">
                    <option value="" disabled selected>Please select an option</option>
                    <option value="welcome">Registration Confirmation</option>
                    <option value="password reset">Forgot Password</option>
                    <option value="custom">Custom</option>
                </select>
                <div class="form-group" id="customTypeGroup" style="display: none;">
                    <label for="customType">Custom Type</label>
                    <input type="text" name="custom_type" class="form-control" id="customType">
                </div>
                <label for="subject">Subject<span style="color: red">*</span>:</label>
                <input type="text" name="subject" id="subject">

                <label for="body">Body<span style="color: red">*</span>:</label>
                <textarea name="body" id="body"></textarea>

                <label for="link">Link:</label>
                <input type="text" id="link" name="link">


                <label for="conclusion">Conclusion:</label>
                <textarea name="conclusion" id="conclusion"></textarea>

                <div class="flex justify-center"><button class=" bg-gray-700 hover:bg-gray-800 px-5 py-2.5 tracking-wide " id="emailbutton" type="submit">Submit</button></div>
            </form>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var typeSelect = document.getElementById('type');
                    var customTypeGroup = document.getElementById('customTypeGroup');
                    var customTypeInput = document.getElementById('customType');

                    typeSelect.addEventListener('change', function() {
                        if (typeSelect.value === 'custom') {
                            customTypeGroup.style.display = 'block';
                            customTypeInput.required = true;
                        } else {
                            customTypeGroup.style.display = 'none';
                            customTypeInput.required = false;
                        }
                    });
                });



                // Fetch email content based on selected type

                document.getElementById('type').addEventListener('change', function(e) {
                    // e.preventDefault();
                    var selectedType = this.value;
                    fetch("{{ route('email.get-content') }}?type=" + selectedType)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            console.log(data);
                            document.getElementById('subject').value = data.subject;
                            document.getElementById('body').value = data.body;
                            document.getElementById('link').value = data.link;
                            document.getElementById('conclusion').value = data.conclusion;
                        })
                        .catch(error => console.error('Error:', error));
                });
            </script>
        </div>
    </div>
</body>

</html>
@endsection
