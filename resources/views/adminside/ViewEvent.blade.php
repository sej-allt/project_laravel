@extends('layout.adminheader')

@section('header')
    {{ $event->name }}
@endsection
<style>
    /* Custom styles for card content */
    .card-text {
        margin-bottom: 10px; /* Adjust spacing between each card text item */
    }

    .card {
        border: 1px solid gray; /* Dark blue border for the card */
        border-radius: 5px; /* Rounded corners for the card */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Box shadow for a subtle lift effect */
        padding: 20px; /* Padding inside the card */
        margin-bottom: 20px; /* Spacing below the card */
    }

    .card-text strong {
        display: inline-block; /* Make strong tags behave like block elements */
        width: 220px; /* Adjust the width to create a tab-like effect */
        font-weight: bold; /* Ensure the text is bold */
        padding: 8px; /* Padding inside the circular edged rectangular */
        border-radius: 20px; /* Rounded corners for the circular edged rectangular */
        background-color: gray; /* Dark blue background color */
        color: white; /* White text color */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5); /* Slight shadow */
        margin-bottom: 10px; /* Space below each heading */
    }

    .card-text span {
        border: 1.5px solid black;
        display: inline-block; /* Ensure span behaves like block element */
        padding: 8px; /* Padding inside the value container */
        background-color: white; /* White background color */
        border-radius: 5px; /* Rounded corners for the value container */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5); /* Slight shadow */
        margin-left: 100px; /* Space between heading and value */
        margin-bottom: 10px; /* Space below each value */
        width: 120px;
    }
</style>
@section('main_content')
<div class="container mt-5">
    <div class="card">
    <p class="card-text"><strong>Start Date:</strong><span>{{ $event->startdate }}</span></p>
            <p class="card-text"><strong>End Date:</strong><span>{{ $event->enddate }}</span></p>
            <p class="card-text"><strong>Start Time:</strong><span>{{ $event->starttime }}</span></p>
            <p class="card-text"><strong>End Time:</strong><span>{{ $event->endtime }}</span></p>
            <p class="card-text"><strong>Company:</strong><span>{{ $event->company }}</span></p>
            <p class="card-text"><strong>Marks10:</strong><span>{{ $event->marks10 }}</span></p>
            <p class="card-text"><strong>Marks12:</strong><span>{{ $event->marks12 }}</span></p>
            <p class="card-text"><strong>Cgpa:</strong><span>{{ $event->cgpa }}</span></p>
            <p class="card-text"><strong>Role:</strong><span>{{ $event->role }}</span></p>
            <p class="card-text"><strong>Responsibility:</strong><span>{{ $event->responsibility }}</span></p>
            <p class="card-text"><strong>Registration Date:</strong><span>{{ $event->registration_date }}</span></p>
            <p class="card-text"><strong>Last Date Of Registration:</strong><span>{{ $event->last_date_of_registration }}</span></p>
        
    </div>
</div>

<div class="container mt-4">
    <div class="mt-10 text-center">
        <button class="btn btn-primary" id="viewButton">
            View Eligible Students
        </button>
    </div>

    <div class="mt-4" id="tableContainer" style="display: none;">
        <main class="bg-white rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4">
                <table id="students-table" class="w-full text-sm text-left rtl:text-right text-gray-700 dark:text-gray-400">
                    <thead class="text-xs text-white-700 uppercase bg-white-50 dark:bg-white-700 dark:text-white-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-black">S.No</th>
                            <th scope="col" class="px-6 py-3 text-black">Student ID</th>
                            <th scope="col" class="px-6 py-3 text-black">Name</th>
                            <th scope="col" class="px-6 py-3 text-black">Course</th>
                            <th scope="col" class="px-6 py-3 text-black">Semester</th>
                            <th scope="col" class="px-6 py-3 text-black">10th Marks</th>
                            <th scope="col" class="px-6 py-3 text-black">12th Marks</th>
                            <th scope="col" class="px-6 py-3 text-black">CGPA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $index => $student)
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
        </main>
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
        var table = $('#students-table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ]
        });

        $('#viewButton').click(function() {
            $('#tableContainer').toggle(); // Toggle visibility of the table container
            table.columns.adjust().draw(); // Adjust columns when the table is shown
        });
    });
</script>
@endsection
