

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
                <button type="button" data-filter="marks10" class="w-full py-2 px-4 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 mb-4">
                    10 Marks
                </button>
                <div id="marks10-dropdown" class="hidden space-y-2">
                    <input type="range" id="marks10-slider" min="0" max="100" step="1" value="0" class="w-full">
                    <span id="marks10-slider-value" class="text-white">0</span>
                </div>
            </div>
            <div>
                <button type="button" data-filter="marks12" class="w-full py-2 px-4 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 mb-4">
                    12 Marks
                </button>
                <div id="marks12-dropdown" class="hidden space-y-2">
                    <input type="range" id="marks12-slider" min="0" max="100" step="1" value="0" class="w-full">
                    <span id="marks12-slider-value" class="text-white">0</span>
                </div>
            </div>
            <div>
                <button type="button" data-filter="cgpa" class="w-full py-2 px-4 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 mb-4">
                    CGPA
                </button>
                <div id="cgpa-dropdown" class="hidden space-y-2">
                    <input type="range" id="cgpa-slider" min="0" max="10" step="0.1" value="0" class="w-full">
                    <span id="cgpa-slider-value" class="text-white">0</span>
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

    function applyFilters() {
        var marks10SliderValue = parseInt($('#marks10-slider').val());
        var marks12SliderValue = parseInt($('#marks12-slider').val());
        var cgpaSliderValue = parseFloat($('#cgpa-slider').val());
        var selectedPrograms = getSelectedCheckboxValues('programs');
        var selectedSemesters = getSelectedCheckboxValues('semesters');

        $('#marks10-slider-value').text(marks10SliderValue);
        $('#marks12-slider-value').text(marks12SliderValue);
        $('#cgpa-slider-value').text(cgpaSliderValue);

        $.fn.dataTable.ext.search = [];

        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var marks10Value = parseInt(data[getColumnIndex('marks10')]) || 0;
                var marks12Value = parseInt(data[getColumnIndex('marks12')]) || 0;
                var cgpaValue = parseFloat(data[getColumnIndex('cgpa')]) || 0;
                var courseValue = data[getColumnIndex('programs')];
                var semesterValue = data[getColumnIndex('semesters')];

                var isCourseSelected = selectedPrograms.length === 0 || selectedPrograms.includes(courseValue);
                var isSemesterSelected = selectedSemesters.length === 0 || selectedSemesters.includes(semesterValue);

                return marks10Value >= marks10SliderValue && marks12Value >= marks12SliderValue && cgpaValue >= cgpaSliderValue && isCourseSelected && isSemesterSelected;
            }
        );

        table.draw();
    }

    function getSelectedCheckboxValues(filterType) {
        var values = [];
        $('#' + filterType + '-dropdown input[type="checkbox"]:checked').each(function() {
            if (!$(this).hasClass('clear-all')) {
                values.push($(this).val());
            }
        });
        return values;
    }

    $('#marks10-slider').on('input', applyFilters);
    $('#marks12-slider').on('input', applyFilters);
    $('#cgpa-slider').on('input', applyFilters);

    $('[data-filter]').on('click', function() {
        var filterType = $(this).data('filter');
        var filterOptions = getFilterOptions(filterType);

        $('#' + filterType + '-dropdown').html(filterOptions).toggleClass('hidden');

        $('#' + filterType + '-dropdown input[type="checkbox"]').on('change', applyFilters);
        $('#' + filterType + '-dropdown input[type="checkbox"].clear-all').on('change', clearAll);

        if (filterType === 'marks10' || filterType === 'marks12' || filterType === 'cgpa') {
            $('#' + filterType + '-slider').on('input', applyFilters);
        }
    });

    function clearAll() {
        var filterType = $(this).closest('div').attr('id').replace('-dropdown', '');
        $('#' + filterType + '-dropdown input[type="checkbox"]').prop('checked', false);
        applyFilters();
    }

    function getColumnIndex(filterType) {
        switch (filterType) {
            case 'programs':
                return 3;
            case 'semesters':
                return 4;
            case 'marks10':
                return 5;
            case 'marks12':
                return 6;
            case 'cgpa':
                return 7;
            default:
                return -1;
        }
    }

    function getFilterOptions(filterType) {
        var options = '';

        if (filterType === 'programs') {
            options += `<label for="${filterType}-clear-all" class="block">
                            <input type="checkbox" id="${filterType}-clear-all" class="clear-all mr-2 leading-tight text-blue-600">
                            <span class="text-white">Clear All</span>
                        </label>`;
            var courses = ['Btech', 'BBA', 'Biotech', 'BCA'];
            courses.forEach(function(course) {
                options += `<label for="${filterType}-${course}" class="block">
                                <input type="checkbox" id="${filterType}-${course}" name="${filterType}[]" value="${course}" class="mr-2 leading-tight text-blue-600">
                                <span class="text-white">${course}</span>
                            </label>`;
            });
        } else if (filterType === 'semesters') {
            options += `<label for="${filterType}-clear-all" class="block">
                            <input type="checkbox" id="${filterType}-clear-all" class="clear-all mr-2 leading-tight text-blue-600">
                            <span class="text-white">Clear All</span>
                        </label>`;
            for (var i = 1; i <= 10; i++) {
                options += `<label for="${filterType}-${i}" class="block">
                                <input type="checkbox" id="${filterType}-${i}" name="${filterType}[]" value="${i}" class="mr-2 leading-tight text-blue-600">
                                <span class="text-white">${i}</span>
                            </label>`;
            }
        } else if (filterType === 'marks10') {
            options += `<input type="range" id="marks10-slider" min="0" max="100" step="1" value="0" class="w-full">
                        <span id="marks10-slider-value" class="text-white">0</span>`;
        } else if (filterType === 'marks12') {
            options += `<input type="range" id="marks12-slider" min="0" max="100" step="1" value="0" class="w-full">
                        <span id="marks12-slider-value" class="text-white">0</span>`;
        } else if (filterType === 'cgpa') {
            options += `<input type="range" id="cgpa-slider" min="0" max="10" step="0.1" value="0" class="w-full">
                        <span id="cgpa-slider-value" class="text-white">0</span>`;
        }

        return options;
    }
});
</script>
@endsection
