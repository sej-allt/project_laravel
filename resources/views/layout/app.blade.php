<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Filter Example</title>
</head>
<body>
    <div id="sidebar">
        <!-- Sidebar filters -->
        @yield('sidebar')
    </div>

    <div id="content">
        <!-- Main content -->
        @yield('content')
    </div>
</body>
</html>