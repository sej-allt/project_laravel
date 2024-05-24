<!-- resources/views/filters/index.blade.php -->

@extends('layouts.app')

@section('sidebar')
    <form action="{{ route('filter.filter') }}" method="post">
        @csrf
        <label for="10th_marks">10th Marks:</label>
        <select name="10th_marks" id="10th_marks">
            <option value="">Select 10th Marks</option>
            <option value="90">Above 90%</option>
            <option value="80">Above 80%</option>
            <option value="70">Above 70%</option>
            <!-- Add more options as needed -->
        </select>
        <br>
        <label for="12th_marks">12th Marks:</label>
        <select name="12th_marks" id="12th_marks">
            <option value="">Select 12th Marks</option>
            <option value="90">Above 90%</option>
            <option value="80">Above 80%</option>
            <option value="70">Above 70%</option>
            <!-- Add more options as needed -->
        </select>
        <br>
        <label for="cgpa">CGPA:</label>
        <select name="cgpa" id="cgpa">
            <option value="">Select CGPA</option>
            <option value="9">Above 9</option>
            <option value="8">Above 8</option>
            <option value="7">Above 7</option>
            <!-- Add more options as needed -->
        </select>
        <br>
        <label for="course">Course:</label>
        <select name="course" id="course">
            <option value="">Select Course</option>
            <option value="Science">Science</option>
            <option value="Commerce">Commerce</option>
            <option value="Arts">Arts</option>
        </select>
        <br>
        <button type="submit">Apply Filters</button>
    </form>
@endsection

@section('content')
    <!-- Main content -->
    <p>Main content goes here...</p>
@endsection
