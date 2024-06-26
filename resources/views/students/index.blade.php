<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students CSV Export/Import</title>
</head>
<body>
    <h1>Students CSV Export/Import</h1>

    <!-- Display success message -->
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <!-- Export Button -->
    <a href="{{ route('students.export') }}">Download CSV</a>

    <!-- Import Form -->
    <form action="{{ route('students.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="csv_file">Upload CSV:</label>
        <input type="file" name="csv_file" id="csv_file" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
