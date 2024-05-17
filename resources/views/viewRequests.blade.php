

 @extends('layout.adminheader')

@section('main_content')
<!-- On tables -->
<div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white dark:bg-gray-800">
    <table id="data-table" class="w-full text-sm text-left rtl:text-right text-gray-700 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">S.No</th>
                <th scope="col" class="px-6 py-3">Student ID</th>
                <th scope="col" class="px-6 py-3">Update Information</th>
                {{-- <th scope="col" class="px-6 py-3">Current Marks</th> --}}
                <th scope="col" class="px-6 py-3">New Marks</th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $index => $row)
            <tr class="approval-row odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <td class="px-6 py-4 ">{{ $index + 1 }}</td>
                <td class="px-6 py-4">{{ $row->stu_id }}</td>
                <td class="px-6 py-4">{{ $row->update_type }}</td>
                {{-- <td class="px-6 py-4">{{ $row->current_marks }}</td> --}}
                {{-- <td class="px-6 py-4">{{ $row->new_marks }}</td> --}}
                <td class="px-6 py-4">{{ $row->{$row->update_type} }}</td>

                <td class="px-6 py-4">
                    <form id="approve-form-{{ $index }}" method="POST" action="{{ route('updateMarks') }}">
                        @csrf
                        <input type="hidden" name="approval_id" value="{{ $row->id }}">
                        <input type="hidden" name="status" value="approve">
                        <button type="submit" id="approve-button-{{ $index }}" class="approve-button bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline float-left">
                            Approve
                        </button>
                    </form>
                    <form id="disapprove-form-{{ $index }}" method="POST" action="{{ route('updateMarks') }}">
                        @csrf
                        <input type="hidden" name="approval_id" value="{{ $row->id }}">
                        <input type="hidden" name="status" value="disapprove">
                        <button type="submit" id="disapprove-button-{{ $index }}" class="disapprove-button bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline float-left ml-2">
                            Disapprove
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('logout')
    <div class="relative"> <!-- Added margin-right for spacing -->
                <a href="{{ route('logout') }}" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" type="button">
                  <span class="sr-only">Logout</span>
                  <img class="w-8 h-8 rounded-full" src="https://toppng.com/uploads/preview/free-login-logout-black-icon-116420824011bgykrtibc.png" alt="user photo">
                </a>
              </div>
@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.approval-row button').forEach(button => {
            button.addEventListener('click', function(event) {
                if (!this.hasAttribute('disabled')) {
                    const row = this.closest('.approval-row');
                    row.style.opacity = '0.5'; // Dim the row
                    this.setAttribute('disabled', true); // Disable the button
                    const formId = this.getAttribute('id').split('-')[0];
                    document.getElementById(formId).submit(); // Submit the form
                }
                event.preventDefault(); // Prevent default form submission
            });
        });
    });
</script>
@endsection

