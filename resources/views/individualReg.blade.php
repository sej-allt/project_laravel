@extends('layout.header')
@section('main_head')
    Registration
@endsection
@section('main_content')
<form action="{{url('/individualReg')}}/" method="POST">
  @csrf
  <div class="mb-3">
    <div class="relative">
      <label for="studentId" class="form-label">Student ID</label>
      <input type="text" class="form-control" name="student_id" id="studentId" value="{{old('student_id')}}">
      <span class="absolute top-0 right-0 mt-1 mr-2 text-red-500">*</span>
    </div>
    <span class='text-danger' style='color: red;'>
      @error('student_id')
        {{$message}}
      @enderror
    </span>
  </div>
  <div class="mb-3">
    <div class="relative">
      <label for="exampleInputEmail" class="form-label">Email address</label>
      <input type="email" class="form-control" name="email" id="exampleInputEmail" aria-describedby="emailHelp" value="{{old('email')}}">
      <span class="absolute top-0 right-0 mt-1 mr-2 text-red-500">*</span>
    </div>
    <span class='text-danger' style='color: red;'>
      @error('email')
        {{$message}}
      @enderror
    </span>
  </div>
  <div class="mb-3">
    <div class="relative">
      <label for="studentName" class="form-label">Student Name</label>
      <input type="text" class="form-control" name="name" id="studentName" value="{{old('name')}}">
      <span class="absolute top-0 right-0 mt-1 mr-2 text-red-500">*</span>
    </div>
    <span class='text-danger' style='color: red;'>
      @error('name')
        {{$message}}
      @enderror
    </span>
  </div>
  <div class="mb-3">
      <label for="fatherName" class="form-label">Father's Name</label>
      <input type="text" class="form-control" id="fatherName">
  </div>
  <div class="mb-3">
    <div class="relative">
      <label for="phoneNumber" class="form-label">Phone Number</label>
      <input type="tel" class="form-control" name="phn_no" id="phoneNumber" value="{{old('phn_no')}}">
      <span class="absolute top-0 right-0 mt-1 mr-2 text-red-500">*</span>
    </div>
    <span class='text-danger' style='color: red;'>
      @error('phn_no')
        {{$message}}
      @enderror
    </span>
  </div>
  <div class="mb-3">
    <div class="relative">
      <label for="campus" class="form-label">Campus</label>
      <input type="text" class="form-control" name="campus" id="campus" value="{{old('campus')}}">
      <span class="absolute top-0 right-0 mt-1 mr-2 text-red-500">*</span>
    </div>
    <span class='text-danger' style='color: red;'>
      @error('campus')
        {{$message}}
      @enderror
    </span>
  </div>
  <div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <input type="text" class="form-control" id="address">
  </div>
  <div class="mb-3">
    <div class="relative">
      <label for="10thGrade" class="form-label">10th Grade</label>
      <input type="text" class="form-control" name="marks10" id="10thGrade" value="{{old('marks10')}}">
      <span class="absolute top-0 right-0 mt-1 mr-2 text-red-500">*</span>
    </div>
    <span class='text-danger' style='color: red;'>
      @error('marks10')
        {{$message}}
      @enderror
    </span>
  </div>
  <div class="mb-3">
    <div class="relative">
      <label for="12thGrade" class="form-label">12th Grade</label>
      <input type="text" class="form-control" name="marks12" id="12thGrade" value="{{old('marks12')}}">
      <span class="absolute top-0 right-0 mt-1 mr-2 text-red-500">*</span>
    </div>
    <span class='text-danger' style='color: red;'>
      @error('marks12')
        {{$message}}
      @enderror
    </span>
  </div>
    <!-- Semester Fields -->
    {{-- <div id="semesterFields">
      <!-- JavaScript will dynamically add semester fields here -->
    </div>
    <label for="semester" class="form-label">Select Semester</label>
    <select id="semester" class="form-select mb-3" onchange="addSemesterFields()">
      <option value="1">Semester 1</option>
      <option value="2">Semester 2</option>
      <option value="1">Semester 3</option>
      <option value="2">Semester 4</option>
      <option value="1">Semester 5</option>
      <option value="2">Semester 6</option>
      <option value="1">Semester 7</option>
      <option value="2">Semester 8</option>
      <option value="1">Semester 9</option>
      <option value="2">Semester 10</option>
      <!-- Add more options for additional semesters -->
    </select> --}}
    
    {{-- <div class="mb-3">
      <label for="semester_grade" class="form-label">Select Semester and Enter Grade</label>
      <select class="form-select" id="semester_grade" name="semester_grade">
          <option value="">Select Semester and Enter Grade</option>
          @for ($i = 1; $i <= 10; $i++)
              <option value="{{ $i }}">Semester {{ $i }}</option>
          @endfor
      </select>
  </div> --}}

  <label for="semester-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Choose semester:</label>
    <div class="relative flex items-center max-w-[11rem]">
        <button type="button" id="decrement-button" data-input-counter-decrement="semester-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
            <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
            </svg>
        </button>
        <input type="text" id="semester-input" data-input-counter data-input-counter-min="1" data-input-counter-max="10" aria-describedby="helper-text-explanation" class="bg-gray-50 border-x-0 border-gray-300 h-11 font-medium text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pb-6 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" value="1" required />
        <div class="absolute bottom-1 start-1/2 -translate-x-1/2 rtl:translate-x-1/2 flex items-center text-xs text-gray-400 space-x-1 rtl:space-x-reverse">
            <svg class="w-2.5 h-2.5 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8v10a1 1 0 0 0 1 1h4v-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v5h4a1 1 0 0 0 1-1V8M1 10l9-9 9 9"/>
            </svg>
            <span>Sem</span>
        </div>
        <button type="button" id="increment-button" data-input-counter-increment="semester-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
            <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
            </svg>
        </button>
    </div>
    <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">Please select the semester.</p>

    <div id="grades-container" class="mt-4"></div>
    
    <div class="flex justify-center items-center">
      <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </div>
  

  </form>
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- <script>
    $(document).ready(function() {
        $('#semester_grade').change(function() {
            var semester = $(this).val();
            var grade = prompt('Enter Grade for Semester ' + semester);
            if (grade !== null) {
                // Append the grade to the selected option text
                $(this).find('option:selected').text('Semester ' + semester + ': ' + grade);
                // Set the value of the hidden input field for the grade
                $('#grade').val(grade);
            }
        });
    });
</script> --}}

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#increment-button').click(function() {
            var semester = parseInt($('#semester-input').val());
            var grade = prompt('Enter Grade for Semester ' + semester);
            if (grade !== null) {
                $('#semester-input').val(semester + 1);

                // Create input field for the entered grade
                var inputField = '<div class="mb-3">';
                inputField += '<div class="relative">';
                inputField += '<label for="semester' + semester + 'Grade" class="form-label">Semester ' + semester + ' Grade</label>';
                inputField += '<input type="text" class="form-control" name="semester' + semester + 'Grade" id="semester' + semester + 'Grade" value="' + grade + '">';
                inputField += '<span class="absolute top-0 right-0 mt-1 mr-2 text-red-500">*</span>';
                inputField += '</div>';
                inputField += '</div>';

                $('#grades-container').append(inputField);
            }
        });
    });
</script>

@endsection
