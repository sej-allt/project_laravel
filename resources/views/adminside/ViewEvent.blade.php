



@extends('layout.adminheader')

@section('header')
   {{$criteria->event_id}}
@endsection

@section('main_content')
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
