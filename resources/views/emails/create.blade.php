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
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
            outline: none; /* Remove default outline */
            background-color: #fff; /* Background color */
            color: #333; /* Text color */
            cursor: pointer; /* Cursor style */
        }

        /* Style for selected option */
        select option[selected] {
            background-color: #007bff; /* Background color of selected option */
            color: #fff; /* Text color of selected option */
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            height: 150px;
        }

        #emailbutton {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color:#218838;
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
    <div class="container">
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

        <form method="POST" action="{{ route('email.store') }}">
            @csrf
            <label for="type">Type:</label>
                <select name="type" id="type">
                    <option value="welcome">Registration Confirmation</option>
                    <option value="password reset">Forgot Password</option>
                    <!-- Add more options as needed -->
            </select>

            <label for="subject">Subject<span style="color: red">*</span>:</label>
            <input type="text" name="subject" id="subject">

            <label for="body">Body<span style="color: red">*</span>:</label>
            <textarea name="body" id="body"></textarea>

            <label for="link">Link:</label>
            <input type="text" id="link" name="link">


            <label for="conclusion">Conclusion:</label>
            <textarea name="conclusion" id="conclusion"></textarea>

            <button id = "emailbutton" type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
@endsection