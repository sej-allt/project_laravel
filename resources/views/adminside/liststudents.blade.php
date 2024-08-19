{{-- 
@extends('layout.adminheader')

@section('main-content')

<div class="container mt-4">
    <div class="d-flex justify-content-between flex-wrap">
        <!-- Courses Dropdown -->
        <div class="dropdown mb-2" style="flex: 1;">
            <button class="btn btn-primary dropdown-toggle text-white w-100" type="button" id="coursesDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Courses
            </button>
           <ul class="dropdown-menu" aria-labelledby="coursesDropdown">
        @foreach($programs as $program)
            <li><a class="dropdown-item" href="#">{{ $program->program_id }}</a></li>
        @endforeach
    </ul>
        </div>

        <!-- Semester Dropdown -->
        <div class="dropdown mb-2" style="flex: 1;">
            <button class="btn btn-primary dropdown-toggle text-white w-100" type="button" id="semesterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Semester
            </button>
            <ul class="dropdown-menu" aria-labelledby="semesterDropdown">
                @for ($i = 1; $i <= 10; $i++)
                    <li><a class="dropdown-item" href="#">{{ $i }}</a></li>
                @endfor
            </ul>
        </div>

        <!-- Button and Slider for 10 Marks -->
        <div class="text-center mb-4" style="flex: 1;">
            <button class="btn btn-primary mb-2 text-white w-100" type="button" onclick="toggleSlider('marks10Slider')">10 Marks</button>
            <div id="marks10Slider" class="slider-container d-none">
                <input type="range" id="marks10-slider" min="0" max="100" step="1" value="0" class="w-full bg-blue-600" oninput="updateMarks10Value(this.value)">
                <span id="marks10-slider-value" class="text-blue">0</span>
            </div>
        </div>

        <!-- Button and Slider for 12 Marks -->
        <div class="text-center mb-4" style="flex: 1;">
            <button class="btn btn-primary mb-2 text-white w-100" type="button" onclick="toggleSlider('marks12Slider')">12 Marks</button>
            <div id="marks12Slider" class="slider-container d-none">
                <input type="range" id="marks12-slider" min="0" max="100" step="1" value="0" class="w-full bg-blue-600" oninput="updateMarks12Value(this.value)">
                <span id="marks12-slider-value" class="text-blue">0</span>
            </div>
        </div>

        <!-- Button and Slider for CGPA -->
        <div class="text-center mb-4" style="flex: 1;">
            <button class="btn btn-primary mb-2 text-white w-100" type="button" onclick="toggleSlider('cgpaSlider')">CGPA</button>
            <div id="cgpaSlider" class="slider-container d-none">
                <input type="range" id="cgpa-slider" min="0" max="10" step="0.1" value="0" class="w-full bg-blue-600" oninput="updatecgpaValue(this.value)">
                <span id="cgpa-slider-value" class="text-blue">0</span>
            </div>
        </div>
    </div>
</div>




<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">

<!-- DataTables JS -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>



   
   
        <!-- Basic Examples -->
       
                           <table id="students-table" class="table table-bordered table-striped table-hover js-basic-example dataTable">
    <!-- Table headers and body as before -->


                              <thead class="text-xs text-white-700 uppercase bg-white-50 dark:bg-white-700 dark:text-white-400">
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                    </tr>
                                    <tr>
                                        <td>Garrett Winters</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>63</td>
                                        <td>2011/07/25</td>
                                        <td>$170,750</td>
                                    </tr>
                                    <tr>
                                        <td>Ashton Cox</td>
                                        <td>Junior Technical Author</td>
                                        <td>San Francisco</td>
                                        <td>66</td>
                                        <td>2009/01/12</td>
                                        <td>$86,000</td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>


<script>
$(document).ready(function() {
    $('#students-table').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'excel'
        ]
        
});


function toggleSlider(sliderId) {
    var slider = document.getElementById(sliderId);
    if (slider.classList.contains('d-none')) {
        slider.classList.remove('d-none'); 
    } else {
        slider.classList.add('d-none');
    }
}

function updateMarks10Value(value) {
    document.getElementById('marks10-slider-value').textContent = value;
}

function updateMarks12Value(value) {
    document.getElementById('marks12-slider-value').textContent = value;
}

function updatecgpaValue(value) {
    document.getElementById('cgpa-slider-value').textContent = value;
}
});
</script>

@endsection
 








  --}}



@extends('layout.adminheader')

@section('main-content')

<div class="container mt-4">
    <div class="d-flex justify-content-between flex-wrap">
        <!-- Courses Dropdown -->
        <div class="dropdown mb-2" style="flex: 1;">
            <select name="program_id" id="program_id" class="form-select w-100">
                <option value="">Select Course</option>
                @foreach($programs as $program)
                    <option value="{{ $program->program_id }}"></option>
                @endforeach
            </select>
        </div>

        <!-- Semester Dropdown -->
        <div class="dropdown mb-2" style="flex: 1;">
            <select name="semester" id="semester" class="form-select w-100">
                <option value="">Select Semester</option>
                @for ($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>

        <!-- 10 Marks Slider -->
        <div class="text-center mb-4" style="flex: 1;">
            <label for="marks10-slider" class="form-label">10 Marks</label>
            <input type="range" name="marks_10" id="marks10-slider" min="0" max="100" step="1" value="0" class="form-range" oninput="updateMarks10Value(this.value)">
            <span id="marks10-slider-value">0</span>
        </div>

        <!-- 12 Marks Slider -->
        <div class="text-center mb-4" style="flex: 1;">
            <label for="marks12-slider" class="form-label">12 Marks</label>
            <input type="range" name="marks_12" id="marks12-slider" min="0" max="100" step="1" value="0" class="form-range" oninput="updateMarks12Value(this.value)">
            <span id="marks12-slider-value">0</span>
        </div>

        <!-- CGPA Slider -->
        <div class="text-center mb-4" style="flex: 1;">
            <label for="cgpa-slider" class="form-label">CGPA</label>
            <input type="range" name="cgpa" id="cgpa-slider" min="0" max="10" step="0.1" value="0" class="form-range" oninput="updatecgpaValue(this.value)">
            <span id="cgpa-slider-value">0</span>
        </div>
    </div>

    <div class="mt-4">
        <table id="students-table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Course</th>
                    <th>Semester</th>
                    <th>Marks 10</th>
                    <th>Marks 12</th>
                    <th>CGPA</th>
                </tr>
            </thead>
            
               <tbody>
                    @foreach($data as $index => $student)
                    <tr class="odd:bg-white even:bg-white-50 dark:odd:bg-white-900 dark:even:bg-white-800 border-b dark:border-white-700">
                        <td class="px-6 py-4 text-black">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 text-black">{{ $student->student_id }}</td>
                        <td class="px-6 py-4 text-black">{{ $student->student_name }}</td>
                        <td class="px-6 py-4 text-black">{{ $student->program_id }}</td>
                        <td class="px-6 py-4 text-black">{{ $student->semester }}</td>
                        <td class="px-6 py-4 text-black">{{ $student->T1 }}</td>
                        <td class="px-6 py-4 text-black">{{ $student->T2 }}</td>
                        <td class="px-6 py-4 text-black">{{ $student->cgpa }}</td>
                    </tr>
                    @endforeach
                
            </tbody>
        </table>
    </div>
</div>



<script>
$(document).ready(function() {
    // Initialize DataTables
    var table = $('#students-table').DataTable({
        dom: 'Bfrtip',
        buttons: ['excel'],
        // processing: true,
        serverSide: true,
        ajax: {
           url: "{{ route('filter.students.ajax') }}",
            data: function (d) {
                d.program_id = $('#program_id').val();
                d.semester = $('#semester').val();
                d.marks_10 = $('#marks10-slider').val();
                d.marks_12 = $('#marks12-slider').val();
                d.cgpa = $('#cgpa-slider').val();
            }
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'student_id', name: 'student_id' },
            { data: 'student_name', name: 'student_name' },
            { data: 'program_id', name: 'program_id' },
            { data: 'semester', name: 'semester' },
            { data: 'T1', name: 'T1' },
            { data: 'T2', name: 'T2' },
            { data: 'cgpa', name: 'cgpa' }
        ]
    });

    // Trigger filtering when inputs change
    $('#program_id, #semester').on('change', function() {
        table.draw();
    });
    $('#marks10-slider, #marks12-slider, #cgpa-slider').on('input', function() {
        table.draw();
    });
});

function updateMarks10Value(value) {
    document.getElementById('marks10-slider-value').textContent = value;
}

function updateMarks12Value(value) {
    document.getElementById('marks12-slider-value').textContent = value;
}

function updatecgpaValue(value) {
    document.getElementById('cgpa-slider-value').textContent = value;
}
</script>

@endsection
