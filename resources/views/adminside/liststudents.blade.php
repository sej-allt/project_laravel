



@extends('layout.adminheader')

@section('main_content')
<div class="flex flex-col md:flex-row">
    <aside class="w-full md:w-64 h-screen bg-gray-100 p-4 dark:bg-gray-800 md:fixed md:left-0 md:top-16 overflow-y-auto">
        <h2 class="text-xl font-bold mb-4 dark:text-white">Filters</h2>
        <div class="space-y-4">
            <div>
                <button type="button" data-filter="programs" class="w-full py-2 px-4 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Course
                </button>
                
                <div id="programs-dropdown" class="hidden space-y-2"></div>
                 
            </div>
            <div>
                <button type="button" data-filter="semesters" class="w-full py-2 px-4 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Semester
                </button>
                <div id="semesters-dropdown" class="hidden space-y-2"></div>
            </div>
            <div>
                <button type="button" data-filter="marks10" class="w-full py-2 px-4 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    10 Marks
                </button>
                <div id="marks10-dropdown" class="hidden space-y-2">
                    <label for="marks10-clear-all" class="block">
                        <input type="checkbox" id="marks10-clear-all" class="clear-all mr-2 leading-tight text-blue-600">
                        <span class="text-white">Clear All</span>
                    </label>
                    <label for="marks10-90" class="block">
                        <input type="checkbox" id="marks10-90" name="marks10[]" value="90" class="mr-2 leading-tight text-blue-600">
                        <span class="text-white">90 and Above</span>
                    </label>
                    <label for="marks10-80" class="block">
                        <input type="checkbox" id="marks10-80" name="marks10[]" value="80" class="mr-2 leading-tight text-blue-600">
                        <span class="text-white">80 and Above</span>
                    </label>
                    <label for="marks10-70" class="block">
                        <input type="checkbox" id="marks10-70" name="marks10[]" value="70" class="mr-2 leading-tight text-blue-600">
                        <span class="text-white">70 and Above</span>
                    </label>
                    <label for="marks10-60" class="block">
                        <input type="checkbox" id="marks10-60" name="marks10[]" value="60" class="mr-2 leading-tight text-blue-600">
                        <span class="text-white">60 and Above</span>
                    </label>
                    <label for="marks10-50" class="block">
                        <input type="checkbox" id="marks10-50" name="marks10[]" value="50" class="mr-2 leading-tight text-blue-600">
                        <span class="text-white">50 and Above</span>
                    </label>
                    
                </div>
            </div>
            <div>
                <button type="button" data-filter="marks12" class="w-full py-2 px-4 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    12 Marks
                </button>
                <div id="marks12-dropdown" class="hidden space-y-2">
                    <label for="marks12-clear-all" class="block">
                        <input type="checkbox" id="marks12-clear-all" class="clear-all mr-2 leading-tight text-blue-600">
                        <span class="text-white">Clear All</span>
                    </label>
                    <label for="marks12-90" class="block">
                        <input type="checkbox" id="marks12-90" name="marks12[]" value="90" class="mr-2 leading-tight text-blue-600">
                        <span class="text-white">90 and Above</span>
                    </label>
                    <label for="marks12-80" class="block">
                        <input type="checkbox" id="marks12-80" name="marks12[]" value="80" class="mr-2 leading-tight text-blue-600">
                        <span class="text-white">80 and Above</span>
                    </label>
                     <label for="marks12-70" class="block">
                        <input type="checkbox" id="marks12-70" name="marks12[]" value="70" class="mr-2 leading-tight text-blue-600">
                        <span class="text-white">70 and Above</span>
                    </label>
                     <label for="marks12-60" class="block">
                        <input type="checkbox" id="marks12-60" name="marks12[]" value="60" class="mr-2 leading-tight text-blue-600">
                        <span class="text-white">60 and Above</span>
                    </label>
                     <label for="marks12-50" class="block">
                        <input type="checkbox" id="marks12-50" name="marks12[]" value="50" class="mr-2 leading-tight text-blue-600">
                        <span class="text-white">50 and Above</span>
                    </label>
                    
                    
                </div>
            </div>
          <div>
    <button type="button" data-filter="cgpa" class="w-full py-2 px-4 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
        CGPA
    </button>
    <div id="cgpa-dropdown" class="hidden space-y-2">
        <label for="cgpa-clear-all" class="block">
            <input type="checkbox" id="cgpa-clear-all" class="clear-all mr-2 leading-tight text-blue-600">
            <span class="text-white">Clear All</span>
        </label>
        <label for="cgpa-9" class="block">
            <input type="checkbox" id="cgpa-9" name="cgpa[]" value="9" class="mr-2 leading-tight text-blue-600">
            <span class="text-white">9 and Above</span>
        </label>
        <label for="cgpa-8" class="block">
            <input type="checkbox" id="cgpa-8" name="cgpa[]" value="8" class="mr-2 leading-tight text-blue-600">
            <span class="text-white">8 and Above</span>
        </label>
        <label for="cgpa-7" class="block">
            <input type="checkbox" id="cgpa-7" name="cgpa[]" value="7" class="mr-2 leading-tight text-blue-600">
            <span class="text-white">7 and Above</span>
        </label>
        <label for="cgpa-6" class="block">
            <input type="checkbox" id="cgpa-6" name="cgpa[]" value="6" class="mr-2 leading-tight text-blue-600">
            <span class="text-white">6 and Above</span>
        </label>
        <label for="cgpa-5" class="block">
            <input type="checkbox" id="cgpa-5" name="cgpa[]" value="5" class="mr-2 leading-tight text-blue-600">
            <span class="text-white">5 and Above</span>
        </label>
    </div>
</div>


        </div>
    </aside>

    <main class="ml-64 mt-16 p-4 flex-grow w-full bg-white dark:bg-gray-800">
        <h1 class="text-2xl font-bold mb-4 dark:text-white">Course Data</h1>

        <div id="dynamic-filter" class="mb-4 hidden">
            <form id="dynamic-filter-form" class="space-y-4">
                <div id="dynamic-filter-options" class="space-y-2"></div>
                <button type="button" id="apply-dynamic-filters" class="w-full py-2 px-4 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Apply Filters
                </button>
            </form>
        </div>

        <div>
            <table id="students-table" class="w-full text-sm text-left rtl:text-right text-gray-700 dark:text-gray-400">
                <thead class="text-xs text-white-700 uppercase bg-white-50 dark:bg-white-700 dark:text-white-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-black">S.No</th>
                        <th scope="col" class="px-6 py-3 text-black">Student ID</th>
                        <th scope="col" class="px-6 py-3 text-black">Name</th>
                        <th scope="col" class="px-6 py-3 text-black">Course</th>
                        <th scope="col" class="px-6 py-3 text-black">Semester</th>
                        <th scope="col" class="px-6 py-3 text-black">10 Marks</th>
                        <th scope="col" class="px-6 py-3 text-black">12 Marks</th>
                        <th scope="col" class="px-6 py-3 text-black">CGPA</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $index => $student)
                    <tr class="odd:bg-white even:bg-white-50 dark:odd:bg-white-900 dark:even:bg-white-800 border-b dark:border-white-700">
                        <td class="px-6 py-4 text-black">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 text-black">{{ $student->student_id }}</td>
                        <td class="px-6 py-4 text-black">{{ $student->student_name }}</td>
                        <td class="px-6 py-4 text-black">{{ $student->course }}</td>
                        <td class="px-6 py-4 text-black">{{ $student->semester }}</td>
                        <td class="px-6 py-4 text-black">{{ $student->marks10 }}</td>
                        <td class="px-6 py-4 text-black">{{ $student->marks12 }}</td>
                        <td class="px-6 py-4 text-black">{{ $student->cgpa }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</div>

{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script> --}}

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

    var table = $('#students-table').DataTable();

    $('[data-filter]').on('click', function(event) {
        var filterType = $(this).data('filter');
        var filterOptions = getFilterOptions(filterType);
        
        $('#' + filterType + '-dropdown').html(filterOptions);
        
        // Toggle visibility of the dropdown associated with the clicked button
        $('#' + filterType + '-dropdown').toggleClass('hidden');

        // Add event listener for checkboxes
        $('#' + filterType + '-dropdown input[type="checkbox"]').on('change', applyFilters);
        $('#' + filterType + '-dropdown input[type="checkbox"].clear-all').on('change', clearAll);
        
        // Prevent default behavior
        //event.preventDefault();
    });
// 





function applyFilters() {
    var filterType = $(this).closest('div').attr('id').replace('-dropdown', '');
    var selectedValues = $('input[name="' + filterType + '[]"]:checked').map(function() {
        return this.value;
    }).get();

    var columnIndex = getColumnIndex(filterType);

    if (filterType === 'marks10' || filterType === 'marks12') {
        var ranges = [];
        selectedValues.forEach(function(value) {
            var startValue = parseInt(value);
            for (var i = startValue; i <= 100; i++) {
                ranges.push(i + '|' + (i + 9)); // Push range from current value to 100
            }
        });

        var searchRegex = ranges.length > 0 ? ranges.join('|') : '';
        table.column(columnIndex).search(searchRegex, true, false);
    }
    else if (filterType === 'cgpa') {
        var ranges = [];
        selectedValues.forEach(function(value) {
            var startValue = parseFloat(value);
            for (var i = startValue; i <= 10; i ++) {
                ranges.push(i + '|' + (i + 1)); // Push range from current value to 10 with step 0.5
            }
        });

        var searchRegex = ranges.length > 0 ? ranges.join('|') : '';
        table.column(columnIndex).search(searchRegex, true, false);
    } else {
        var selectedValuesStr = selectedValues.join('|');
        table.column(columnIndex).search(selectedValuesStr, true, false);
    } 

    table.draw();
}






        function clearAll() {
            var filterType = $(this).closest('div').attr('id').replace('-dropdown', '');
            $('input[name="' + filterType + '[]"]').prop('checked', false);
            table.column(getColumnIndex(filterType)).search('').draw();
        }

        function getFilterOptions(filterType) {
            var options = '';
            var uniqueValues = [];

            if (filterType === 'programs') {
                var courses = ['BTech', 'BBA', 'Biotech', 'BCA'];
                courses.forEach(function(course) {
                    options += `
                        <label for="${filterType}-${course}" class="block">
                            <input type="checkbox" id="${filterType}-${course}" name="${filterType}[]" value="${course}" class="mr-2 leading-tight text-blue-600">
                            <span class="text-white">${course}</span>
                        </label>
                    `;
                });
            } else if (filterType === 'semesters') {
                options += `
                    <label for="${filterType}-clear-all" class="block">
                        <input type="checkbox" id="${filterType}-clear-all" class="clear-all mr-2 leading-tight text-blue-600">
                        <span class="text-white">Clear All</span>
                    </label>
                `;
                for (var i = 1; i <= 10; i++) {
                    options += `
                        <label for="${filterType}-${i}" class="block">
                            <input type="checkbox" id="${filterType}-${i}" name="${filterType}[]" value="${i}" class="mr-2 leading-tight text-blue-600">
                            <span class="text-white">${i}</span>
                        </label>
                    `;
                }
            } else if (filterType === 'marks10') {
                // Add checkboxes for 10 Marks
                options += `
                    <label for="${filterType}-clear-all" class="block">
                        <input type="checkbox" id="${filterType}-clear-all" class="clear-all mr-2 leading-tight text-blue-600">
                        <span class="text-white">Clear All</span>
                    </label>
                    <label for="${filterType}-90" class="block">
                        <input type="checkbox" id="${filterType}-90" name="${filterType}[]" value="90" class="mr-2 leading-tight text-blue-600">
                        <span class="text-white">90 and Above</span>
                    </label>
                    <label for="${filterType}-80" class="block">
                        <input type="checkbox" id="${filterType}-80" name="${filterType}[]" value="80" class="mr-2 leading-tight text-blue-600">
                        <span class="text-white">80 and Above</span>
                    </label>
                     <label for="${filterType}-70" class="block">
                        <input type="checkbox" id="${filterType}-70" name="${filterType}[]" value="70" class="mr-2 leading-tight text-blue-600">
                        <span class="text-white">70 and Above</span>
                    </label>
                     <label for="${filterType}-60" class="block">
                        <input type="checkbox" id="${filterType}-60" name="${filterType}[]" value="60" class="mr-2 leading-tight text-blue-600">
                        <span class="text-white">60 and Above</span>
                    </label>
                     <label for="${filterType}-50" class="block">
                        <input type="checkbox" id="${filterType}-50" name="${filterType}[]" value="50" class="mr-2 leading-tight text-blue-600">
                        <span class="text-white">50 and Above</span>
                    </label>
                    
                `;
            } else if (filterType === 'marks12') {
                // Add checkboxes for 12 Marks
                options += `
                    <label for="${filterType}-clear-all" class="block">
                        <input type="checkbox" id="${filterType}-clear-all" class="clear-all mr-2 leading-tight text-blue-600">
                        <span class="text-white">Clear All</span>
                    </label>
                    <label for="${filterType}-90" class="block">
                        <input type="checkbox" id="${filterType}-90" name="${filterType}[]" value="90" class="mr-2 leading-tight text-blue-600">
                        <span class="text-white">90 and Above</span>
                    </label>
                    <label for="${filterType}-80" class="block">
                        <input type="checkbox" id="${filterType}-80" name="${filterType}[]" value="80" class="mr-2 leading-tight text-blue-600">
                        <span class="text-white">80 and Above</span>
                    </label>
                    <label for="${filterType}-70" class="block">
                        <input type="checkbox" id="${filterType}-70" name="${filterType}[]" value="70" class="mr-2 leading-tight text-blue-600">
                        <span class="text-white">70 and Above</span>
                    </label>
                    <label for="${filterType}-60" class="block">
                        <input type="checkbox" id="${filterType}-60" name="${filterType}[]" value="60" class="mr-2 leading-tight text-blue-600">
                        <span class="text-white">60 and Above</span>
                    </label>
                    <label for="${filterType}-50" class="block">
                        <input type="checkbox" id="${filterType}-50" name="${filterType}[]" value="50" class="mr-2 leading-tight text-blue-600">
                        <span class="text-white">50 and Above</span>
                    </label>
                    <!-- Add similar checkboxes for other ranges -->
                `;
            }
            else if (filterType === 'cgpa') {
        options += `
            <label for="${filterType}-clear-all" class="block">
                <input type="checkbox" id="${filterType}-clear-all" class="clear-all mr-2 leading-tight text-blue-600">
                <span class="text-white">Clear All</span>
            </label>
            <label for="${filterType}-9" class="block">
                <input type="checkbox" id="${filterType}-9" name="${filterType}[]" value="9" class="mr-2 leading-tight text-blue-600">
                <span class="text-white">9 and Above</span>
            </label>
            <label for="${filterType}-8" class="block">
                <input type="checkbox" id="${filterType}-8" name="${filterType}[]" value="8" class="mr-2 leading-tight text-blue-600">
                <span class="text-white">8 and Above</span>
            </label>
            <label for="${filterType}-7" class="block">
                <input type="checkbox" id="${filterType}-7" name="${filterType}[]" value="7" class="mr-2 leading-tight text-blue-600">
                <span class="text-white">7 and Above</span>
            </label>
            <label for="${filterType}-6" class="block">
                <input type="checkbox" id="${filterType}-6" name="${filterType}[]" value="6" class="mr-2 leading-tight text-blue-600">
                <span class="text-white">6 and Above</span>
            </label>
            <label for="${filterType}-5" class="block">
                <input type="checkbox" id="${filterType}-5" name="${filterType}[]" value="5" class="mr-2 leading-tight text-blue-600">
                <span class="text-white">5 and Above</span>
            </label>
            <!-- Add similar checkboxes for other ranges -->
        `;
    }
    
            $('#dynamic-filter-options').data('filter-type', filterType);
            return options;
        }

        function getColumnIndex(filterType) {
            switch (filterType) {
                case 'programs': return 3;
                case 'semesters': return 4;
                case 'marks10': return 5;
                case 'marks12': return 6;
                case 'cgpa': return 7;
                default: return -1;
            }
        }
       
   
});

    
</script>
@endsection

@section('logout')
<div class="relative">
    <a href="{{ route('logout') }}" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" type="button">
        <span class="sr-only">Logout</span>
        <img class="w-8 h-8 rounded-full" src="https://toppng.com/uploads/preview/free-login-logout-black-icon-116420824011bgykrtibc.png" alt="user photo">
    </a>
</div>
@endsection

