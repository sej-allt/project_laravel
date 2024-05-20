<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Other head content -->

    <!-- CSS Styles -->
    <style>
        .archive-sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            right: -300px;
            width: 300px;
            padding: 20px;
            background-color: #f8f9fa;
            overflow-y: auto;
            border-left: 1px solid #dee2e6;
            transition: right 0.3s ease;
            z-index: 1000;
        }

        .sidebar-toggle {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1100;
        }

        .show-sidebar {
            right: 0;
        }

        .card {
            width: 250px;
            border-radius: 10px;
            margin-bottom: 15px;
            margin-left: 15px;
            border: 2px solid orange; /* Default border color */
            transition: box-shadow 0.3s ease;
            overflow: hidden;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
            outline: 2px solid #0000FF;
        }
        .archive-link {
        display: block;
        padding: 10px;
        border: 2px solid orange;
        border-radius: 5px;
        color: orange;
        transition: color 0.3s, border-color 0.3s;
        text-decoration: none;
    }

.archive-link:hover {
    color: blue;
    border-color: blue;
}

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Navbar content -->
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3" >
                <!-- Sidebar Toggle Button -->
                <button class="btn btn-primary sidebar-toggle">&#8942;</button>
                <!-- Archive Sidebar -->
                <div class="archive-sidebar">
                    <a href="{{ route('archive') }}" class="archive-link">Archive</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.querySelector('.sidebar-toggle');
            const archiveSidebar = document.querySelector('.archive-sidebar');

            sidebarToggle.addEventListener('click', function() {
                archiveSidebar.classList.toggle('show-sidebar');
            });
        });
    </script>
</body>
</html>
